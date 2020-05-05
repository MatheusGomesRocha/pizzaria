<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Product;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ingredient_register()       // INGREDIENTES VIEW
    {
        if (Auth::user()->nivel == 1) {
            $user = User::get_user();
            $count = Order::get_count();

            return view('products.ingredients_register')->with('count', $count)->with('user', $user);
        } else {
            return view('error.404');
        }
    }

    public function product_info($id)       // INFO DOS PRODUTOS VIEW
    {

        $query = Product::all()->where('id', '=', $id)->first();
        if ($query) {
            $user = User::get_user();
            $count = Order::get_count();
            return view('products.info')->with('products', $query)->with('count', $count)->with('user', $user);
        } else {
            return view('error.404');
        }
    }

    public function validation_product_register(Request $request)   // VALIDAÇÃO DE CADASTRO DE PRODUTO
    {
        if (Auth::user()->nivel == 1) {
            $validation = $this->validation($request->all());

            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation->errors())->withInput($request->all());
            }

            $query = DB::table('products')->where('name', '=', $request->input('name'))
                ->where('type', '=', $request->input('type'))
                ->count();
            if ($query == 0) {
                if ($request->hasFile('img') && $request->file('img')->isValid()) {
                    $img = rand();

                    $extensao = $request->img->extension();
                    $file = "$img.$extensao";
                    $data['img'] = $file;
                    $upload = $request->img->storeAs('public/products', $file);

                    $product = Product::create([
                        'name' => $request->input('name'),
                        'img' => $file,
                        'type' => $request->input('type'),
                        'sm' => $request->input('sm'),
                        'md' => $request->input('md'),
                        'lg' => $request->input('lg'),
                        'price' => $request->input('price'),
                        'price_sm' => $request->input('price_sm'),
                        'price_md' => $request->input('price_md'),
                        'price_lg' => $request->input('price_lg'),
                        'description' => $request->input('description')
                    ]);

                    session::flash('success', 'Produto cadastrado com sucesso');
                    return redirect()->back();
                } else {
                    session::flash('error', 'A imagem do produto é obrigatório');
                    return redirect()->back();
                }


            } else {
                session::flash('error', 'Já existe um produto com esse nome');
                return redirect()->back();
            }
        } else {
            return view('error.404');
        }

    }

    /* A PARTIR DAQUI É ÁREA DO ADMIN */

    public function products_all()      // TABELA DE PEDIDOS
    {
        if (Auth::user()->nivel == 1) {
            $count = User::count_orders();
            $query = Order::get_products();

            return view('products.view')->with('count', $count)->with('query', $query);
        } else {
            return view('error.404');
        }

    }

    public function delete_product($id)     // DELETAR PRODUTOS
    {
        if (Auth::user()->nivel == 1) {
            $delete = Product::delete_product($id);

            return redirect()->back();
        } else {
            return view('error.404');
        }
    }

    private function validation($data)
    {
        $regras = [
            'name' => 'required',
            'type' => 'required',
        ];

        $mensagens = [
            'name.required' => 'Escolha um  nome',
            'type.required' => 'Escolha o tipo do produto',
        ];

        return Validator::make($data, $regras, $mensagens);
    }
}
