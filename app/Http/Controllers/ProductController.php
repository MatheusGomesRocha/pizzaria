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
use App\Product_img;

class ProductController extends Controller
{

    public function index()     // PRODUTOS VIEW (HOME) OU ADMIN VIEW
    {
        $user = User::get_user();
        $query = Product::all();
        $pizza_limit = Product::pizza_limit();
        $burger_limit = Product::burger_limit();
        $count = Order::get_count();
        $countAdmin = Order::get_count_admin();
        $order = Order::all();

        if (Auth::check()) {
            if (Auth::user()->nivel == 2) {
                return view('home.home')->with('products', $query)->with('count', $count)->with('user', $user)
                    ->with('pizza_limit', $pizza_limit)->with('burger_limit', $burger_limit);
            } else {
                return view('home.admin_index')->with('count', $countAdmin)->with('order', $order);
            }
        } else {
            return view('home.home')->with('products', $query)->with('user', $user)
                ->with('pizza_limit', $pizza_limit)->with('burger_limit', $burger_limit);
        }
    }

    public function ingredient_register()       // INGREDIENTES VIEW
    {
        if (Auth::user()->nivel == 1) {
            $user = User::get_user();
            $count = Order::get_count();

            return view('products.ingredients_register')->with('count', $count)->with('user', $user);
        } else {
            return redirect('/login');
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
            return redirect('/');
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
                }

                else {
                    session::flash('error', 'A imagem do produto é obrigatório');
                    return redirect()->back();
                }


            } else {
                session::flash('error', 'Já existe um produto com esse nome');
                return redirect()->back();
            }
        } else {
            return redirect('/login');
        }

    }

    public function validation_ingredient_register(Request $request)        // VALIDAÇÃO DE CADASTRO DE INGREDIENTE
    {
        if (Auth::user()->nivel == 1) {
            $select = DB::table('ingredients')->where('ingredients', '=', $request->input('ingredient'))->count();
            if ($select == 0) {
                $ing = $request->input('ingredient');
                Ingredient::create([
                    'ingredients' => $ing
                ]);

                session::flash('success', 'Ingrediente cadastrado com sucesso');
                return redirect()->back();
            } else {
                session::flash('error', 'Já existe um ingrediente com esse nome');
                return redirect()->back();
            }
        } else {
            return redirect('/login');
        }
    }

    /* A PARTIR DAQUI É ÁREA DO ADMIN */

    public function products_all()      // TABELA DE PEDIDOS
    {
        if (Auth::user()->nivel == 1) {
            $ing = Ingredient::all();
            $count = User::count_orders();
            $query = Order::get_products();

            return view('products.view')->with('ing', $ing)->with('count', $count)->with('query', $query);
        } else {
            return redirect('/login');
        }

    }

    public function delete_product($id)     // DELETAR PRODUTOS
    {
        if(Auth::user()->nivel == 1) {
            $delete = Product::delete_product($id);

            return redirect()->back();
        } else {
            return redirect('/login');
        }
    }

    public function delete_ing($id)     // DELETEAR INGREDIENTES
    {
        if (Auth::user()->nivel == 1) {
            $delete = Product::delete_ing($id);

            return redirect()->back();
        } else {
            return redirect('/login');
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
