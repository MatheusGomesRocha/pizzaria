<?php

namespace App\Http\Controllers;

use App\Card;
use App\Order;
use App\Adress;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index()                 // CART VIEW
    {
        $user = User::get_user();
        $query = Order::get_orders();
        $count = Order::get_count();

        $subtotal = 0;
        foreach ($query as $sub) {
            $subtotal += (intval($sub->price) * $sub->quantidade);
        }

        return view('orders.cart')->with('subtotal', $subtotal)->with('orders', $query)->with('count', $count)->with('user', $user);
    }

    public function insert_cart(Request $request)  // FUNÇÃO PARA FAZER O PEDIDO E SE JÁ TIVER O PEDIDO IGUAL, AUMENTA A QUANTIDADE
    {
        $select = DB::table('orders')
            ->where('product_id', '=', $request->input('product_id'))
            ->where('user_id', '=', $request->input('user_id'))
            ->where('size', '=', $request->input('size'))
            ->count();

        if ($select == 0) {
            $data = [
                'user_id' => $request->input('user_id'),
                'product_id' => $request->input('product_id'),
                'product_name' => $request->input('product_name'),
                'type' => $request->input('type'),
                'size' => $request->input('size'),
                'fraction' => $request->input('fraction'),
                'quantidade' => $request->input('qtd_hidden'),
                'price' => $request->input('price'),
                'forma_pagamento' => 1,
                'entregue' => 0,
                'confirmed' => 0,
            ];
            Order::create($data);

            return redirect('/cart');
        } else {
            $select1 = DB::table('orders')
                ->where('product_id', '=', $request->input('product_id'))
                ->where('user_id', '=', $request->input('user_id'))
                ->where('size', '=', $request->input('size'))
                ->get();
            foreach ($select1 as $row) {
                $qnt = $row->quantidade + $request->qtd_hidden;
                $update = DB::update('update orders set quantidade = ? where user_id = ? and product_id = ? and size = ?', [
                    $qnt, $request->user_id, $request->product_id, $request->size
                ]);
            }

            return redirect('/cart');
        }
    }

    public function delete_order($id)   // DELETANDO PEDIDO
    {
        Order::delete_order($id);

        return redirect()->back();
    }

    public function adress()    // ENDEREÇO VIEW
    {
        $user = User::get_user();
        $count = Order::get_count();

        $query = Adress::get_adress();
        return view('orders.adress')->with('query', $query)->with('count', $count)->with('user', $user);
    }

    public function add_adress(Request $request1)   // ADICIONANDO QUANTOS ENDEREÇOS O USUÁRIO QUISER
    {
        $validation1 = $this->validation1($request1->all());

        if ($validation1->fails()) {
            return redirect()->back()->withErrors($validation1->errors())->withInput($request1->all());
        }

        $id = Auth::user()->id;
        $data = [
            'user_id' => $id,
            'cep' => $request1->input('cep'),
            'bairro' => $request1->input('bairroHidden'),
            'rua' => $request1->input('ruaHidden'),
            'numero' => $request1->input('number'),
            'complemento' => $request1->input('complemento'),
            'referencia' => $request1->input('referencia'),
        ];

        Adress::create($data);

        return redirect()->back();
    }

    public function delete_adress($id)
    {
        $query = Adress::delete_adress($id);

        return redirect()->back();
    }

    public function delivery(request $request)  // FAZENDO EDIT CASO O USUÁRIO ESCOLHA A FORMA DE ENTREGA "DELIVERY"
    {
        if (Auth::check()) {
            $id = Auth::user()->id;

            DB::table('orders')
                ->where('user_id', '=', $id)
                ->update([
                    'cep' => $request->input('cep'),
                    'bairro' => $request->input('bairro'),
                    'rua' => $request->input('rua'),
                    'numero' => $request->input('numero'),
                    'complemento' => $request->input('complemento'),
                    'referencia' => $request->input('referencia'),
                    'forma_entrega' => 'delivery'
                ]);
        }

        return redirect('/payment');
    }

    public function restaurant(request $request)  // FAZENDO UPDATE CASO O USUÁRIO ESCOLHA A FORMA DE ENTREGA "RETIRAR NO RESTAURANTE"
    {
        if (Auth::check()) {
            $id = Auth::user()->id;

            DB::table('orders')
                ->where('user_id', '=', $id)
                ->update([
                    'cep' => '',
                    'bairro' => '',
                    'rua' => '',
                    'numero' => '',
                    'complemento' => '',
                    'referencia' => '',
                    'forma_entrega' => 'restaurant'
                ]);
        }

        return redirect('/payment');
    }

    public function payment()   // PAGAMENTO VIEW
    {
        $user = User::get_user();
        $count = Order::get_count();
        $cards = Card::cards();

        return view('orders.payment')->with('count', $count)->with('cards', $cards)->with('user', $user);
    }

    public function finish_order()  // FINALIZAR O PEDIDO VIEW
    {
        $user = User::get_user();
        $count = Order::get_count();
        $query = Order::get_first_order();
        $order = Order::get_orders();
        $adress = Adress::get_adress_first();

        $subtotal = 0;
        foreach ($order as $sub) {
            $subtotal += (intval($sub->price) * $sub->quantidade);
        }

        return view('orders.finish_order')->with('subtotal', $subtotal)->with('count', $count)->with('row', $query)
            ->with('orders', $order)->with('adress', $adress)->with('user', $user);
    }

    public function quantidade($id) // VIEW PARA ALTERAR QUANTIDADE DO PRODUTO (MUDAR ISSO) PARA ALTERAR NA VIEW DE FINALIZAR PEDIDO
    {
        if (Auth::user()->nivel == 2) {
            $count = User::count_orders();
            $query = DB::table('orders')
                ->where('order_id', '=', $id)
                ->first();

            return view('orders.quantidade_produto')->with('count', $count)->with('row', $query);
        } else {
            return redirect('/');
        }
    }

    public function quantidade_post(Request $request)   // FUNÇÃO QUE ALTERA A QUANTIDADE DO PRODUTO
    {
        $query = DB::table('orders')
            ->where('order_id', '=', $request->input('order_id'))
            ->update(['quantidade' => $request->input('qtdValue')]);

        if ($query) {
            return redirect('/finish_order');
        }
    }

    public function add_card(Request $request)  // ADICIONAR CARTÃO DE CRÉDITO
    {
        $validation2 = $this->validation2($request->all());

        if ($validation2->fails()) {
            return redirect()->back()->withErrors($validation2->errors())->withInput($request->all());
        }

        $id = Auth::user()->id;
        $array = array($request->input('card_date_month'), $request->input('card_date_year'));
        $date = implode('/', $array);

        $data = [
            'user_id' => $id,
            'card_name' => $request->input('card_name'),
            'card_number' => $request->input('card_number'),
            'card_ccv' => $request->input('card_ccv'),
            'card_date' => $date,
        ];

        $card = Card::create($data);

        if ($card) {
            return redirect()->back();
        }
    }



    // A PARTIR DAQUI É ÁREA APENAS DO ADM

    public function orders_pendent()    // PEDIDOS PENDENTES VIEW
    {
        if (Auth::user()->nivel == 1) {
            $count = User::count_orders();
            $query = Order::get_orders_pendent();

            return view('orders.pendent')->with('count', $count)->with('query', $query);
        } else {
            return redirect('/');
        }
    }

    public function orders_delivery()   // PEDIDOS JÁ ENTREGUES
    {
        if (Auth::user()->nivel == 1) {
            $count = User::count_orders();
            $query = Order::get_orders_delivery();

            return view('orders.delivery')->with('count', $count)->with('query', $query);
        } else {
            return redirect('/');
        }
    }

    public function ingredients_all()   // INGREDIENTES VIEW
    {
        if (Auth::user()->nivel == 1) {
            $count = User::count_orders();
            $query = Order::get_ingredients();

            return view('products.view_ingredient')->with('count', $count)->with('query', $query);
        } else {
            return redirect('/');
        }
    }


    private function validation1($data1)
    {
        $regras1 = [
            'cep' => 'required',
        ];

        $mensagens1 = [
            'cep.required' => 'preencha o CEP',
        ];

        return Validator::make($data1, $regras1, $mensagens1);
    }

    private function validation2($data2)
    {
        $regras2 = [
            'card_name' => 'required',
            'card_number' => 'required|min:12|max:12',
            'card_ccv' => 'required|min:3|max:3',
            'card_date_month' => 'required',
            'card_date_year' => 'required',
        ];

        $mensagens2 = [
            'card_name.required' => 'Preencha o Nome',
            'card_number.required' => 'Preencha o Número',
            'card_ccv.required' => 'Preencha o CCV',
            'card_date_month.required' => 'Escolha uma mês de vencimento',
            'card_date_year.required' => 'Escolha uma ano de vencimento',
        ];

        return Validator::make($data2, $regras2, $mensagens2);
    }


}
