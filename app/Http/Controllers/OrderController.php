<?php

namespace App\Http\Controllers;

use App\Card;
use App\Order;
use App\Adress;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)                 // CART VIEW
    {
        if (Auth::user()->nivel == 2) {
            $user = User::get_user();
            $query = Order::get_orders();
            $count = Order::get_count();

            $subtotal = 0;
            foreach ($query as $sub) {
                $subtotal += (intval($sub->product_price) * $sub->quantidade);
            }

            return view('orders.cart')->with('subtotal', $subtotal)->with('orders', $query)->with('count', $count)->with('user', $user);
        } else {
            return view('error.404');
        }
    }

    public function cart_submit(Request $request)
    {
        if (Auth::user()->nivel == 2) {

            $confirm_pedido = date('H:i:s');
            session()->put('confirm_pedido', $confirm_pedido);
            return redirect('/custom_adress');
        } else {
            return view('error.404');
        }
    }

    public function insert_cart(Request $request)  // FUNÇÃO PARA FAZER O PEDIDO E SE JÁ TIVER O PEDIDO IGUAL, AUMENTA A QUANTIDADE
    {
        if (Auth::user()->nivel == 2) {
            $select = DB::table('orders')
                ->where('product_id', '=', $request->input('product_id'))
                ->where('user_id', '=', $request->input('user_id'))
                ->where('size', '=', $request->input('size'))
                ->where('status', '=', 'pendente')
                ->count();

            if ($select == 0) {
                $data = [
                    'user_id' => $request->input('user_id'),
                    'product_id' => $request->input('product_id'),
                    'size' => $request->input('size'),
                    'quantidade' => $request->input('qtd_hidden'),
                    'product_price' => $request->input('price'),
                    'status' => 'pendente',
                ];

                Order::create($data);

                return redirect()->route('cart');
            } else {

                $select1 = DB::table('orders')
                    ->where('product_id', '=', $request->input('product_id'))
                    ->where('user_id', '=', $request->input('user_id'))
                    ->where('size', '=', $request->input('size'))
                    ->where('status', '=', 'pendente')
                    ->get();
                foreach ($select1 as $row) {
                    $qnt = $row->quantidade + $request->qtd_hidden;
                    $update = DB::update('update orders set quantidade = ? where user_id = ? and product_id = ? and size = ?', [
                        $qnt, $request->user_id, $request->product_id, $request->size
                    ]);
                }

                return redirect()->route('cart');
            }
        } else {
            return view('error.404');
        }
    }

    public function delete_order($id)   // DELETANDO PEDIDO USUÁRIO
    {
        if (Auth::user()->nivel == 2) {
            Order::delete_order($id);

            return redirect()->back();
        } else {
            return view('error.404');
        }
    }

    public function adress()    // ENDEREÇO VIEW
    {
        if (Auth::user()->nivel == 2) {
            if (session()->has('confirm_pedido')) {
                $now = Carbon::now();

                session()->put('diff', $now->diffInSeconds(session('confirm_pedido')));

                if (session('diff') > '1200') {
                    session()->forget('confirm_pedido');
                    session()->forget('diff');
                    DB::table('orders')
                        ->where('status', '=', 'Pendente')
                        ->update([
                            'id_adress' => '0',
                            'forma_entrega' => ''
                        ]);
                    return redirect()->route('cart');
                } else {
                    $user = User::get_user();
                    $count = Order::get_count();
                    $query = Adress::get_adress();

                    return view('orders.adress')->with('query', $query)->with('count', $count)->with('user', $user);
                }

            } else {
                return redirect()->route('cart');
            }
        } else {
            return view('error.404');
        }
    }

    public function add_adress(Request $request1)   // ADICIONANDO QUANTOS ENDEREÇOS O USUÁRIO QUISER
    {
        if (Auth::user()->nivel == 2) {
            if (session()->has('confirm_pedido')) {
                $now = Carbon::now();

                session()->put('diff', $now->diffInSeconds(session('confirm_pedido')));

                if (session('diff') > '1200') {
                    session()->forget('confirm_pedido');
                    session()->forget('diff');

                    DB::table('orders')
                        ->where('status', '=', 'Pendente')
                        ->update([
                            'id_adress' => '0',
                            'forma_entrega' => ''
                        ]);
                    return redirect()->route('cart');
                } else {
                    $validation1 = $this->validation1($request1->all());

                    if ($validation1->fails()) {
                        return redirect()->back()->withErrors($validation1->errors())->withInput($request1->all());
                    }

                    $id = Auth::user()->id;
                    $data = [
                        'adress_user_id' => $id,
                        'cep' => $request1->input('cep'),
                        'bairro' => $request1->input('bairroHidden'),
                        'bairro' => $request1->input('bairro'),
                        'rua' => $request1->input('ruaHidden'),
                        'rua' => $request1->input('rua'),
                        'numero' => $request1->input('number'),
                        'complemento' => $request1->input('complemento'),
                        'referencia' => $request1->input('referencia'),
                    ];

                    Adress::create($data);

                    return redirect()->back();
                }
            } else {
                return redirect()->route('cart');
            }
        } else {
            return view('error.404');
        }
    }

    public function delete_adress($id)
    {
        if (Auth::user()->nivel == 2) {
            if (session()->has('confirm_pedido')) {
                $now = Carbon::now();

                session()->put('diff', $now->diffInSeconds(session('confirm_pedido')));

                if (session('diff') > '1200') {
                    session()->forget('confirm_pedido');
                    session()->forget('diff');

                    DB::table('orders')
                        ->where('status', '=', 'Pendente')
                        ->update([
                            'id_adress' => '0',
                            'forma_entrega' => ''
                        ]);
                    return redirect()->route('cart');
                } else {
                    $query = Adress::delete_adress($id);

                    return redirect()->back();
                }
            } else {
                return redirect()->route('cart');
            }
        } else {
            return view('error.404');
        }
    }

    public function delivery(request $request)  // FAZENDO EDIT CASO O USUÁRIO ESCOLHA A FORMA DE ENTREGA "DELIVERY"
    {
        if (Auth::user()->nivel == 2) {
            if (session()->has('confirm_pedido')) {
                $now = Carbon::now();

                session()->put('diff', $now->diffInSeconds(session('confirm_pedido')));

                if (session('diff') > '1200') {
                    session()->forget('confirm_pedido');
                    session()->forget('diff');

                    DB::table('orders')
                        ->where('status', '=', 'Pendente')
                        ->update([
                            'id_adress' => '0',
                            'forma_entrega' => ''
                        ]);
                    return redirect()->route('cart');
                } else {
                    $id = Auth::user()->id;

                    DB::table('orders')
                        ->where('user_id', '=', $id)
                        ->update([
                            'id_adress' => $request->input('id_adress'),
                            'forma_entrega' => 'delivery'
                        ]);

                    return redirect('/payment');
                }

            } else {
                return redirect()->route('cart');
            }
        } else {
            return view('error.404');
        }
    }

    public function restaurant(request $request)  // FAZENDO UPDATE CASO O USUÁRIO ESCOLHA A FORMA DE ENTREGA "RETIRAR NO RESTAURANTE"
    {
        if (Auth::user()->nivel == 2) {
            if (session()->has('confirm_pedido')) {
                $now = Carbon::now();

                session()->put('diff', $now->diffInSeconds(session('confirm_pedido')));

                if (session('diff') > '1200') {
                    session()->forget('confirm_pedido');
                    session()->forget('diff');

                    DB::table('orders')
                        ->where('status', '=', 'Pendente')
                        ->update([
                            'id_adress' => '0',
                            'forma_entrega' => ''
                        ]);
                    return redirect()->route('cart');
                } else {
                    $id = Auth::user()->id;

                    DB::table('orders')
                        ->where('user_id', '=', $id)
                        ->update([
                            'id_adress' => '',
                            'cep' => '',
                            'bairro' => '',
                            'rua' => '',
                            'numero' => '',
                            'complemento' => '',
                            'referencia' => '',
                            'forma_entrega' => 'restaurant'
                        ]);

                    return redirect('/payment');
                }

            } else {
                return redirect()->route('cart');
            }
        } else {
            return view('error.404');
        }
    }

    public function payment()   // PAGAMENTO VIEW
    {
        if (Auth::user()->nivel == 2) {
            if (session()->has('confirm_pedido')) {
                $now = Carbon::now();
                session()->put('diff', $now->diffInSeconds(session('confirm_pedido')));

                if (session('diff') > '1200') {
                    session()->forget('confirm_pedido');
                    session()->forget('diff');

                    DB::table('orders')
                        ->where('status', '=', 'Pendente')
                        ->update([
                            'id_adress' => '0',
                            'forma_entrega' => ''
                        ]);
                    return redirect()->route('cart');

                } else {
                    $user = User::get_user();
                    $count = Order::get_count();
                    $cards = Card::cards();

                    return view('orders.payment')->with('count', $count)->with('cards', $cards)->with('user', $user);
                }
            } else {
                return redirect()->route('cart');
            }
        } else {
            return view('error.404');
        }
    }

    public function payment_post(Request $request)
    {
        if (Auth::user()->nivel == 2) {
            if (session()->has('confirm_pedido')) {
                $now = Carbon::now();
                session()->put('diff', $now->diffInSeconds(session('confirm_pedido')));

                if (session('diff') > '1200') {
                    session()->forget('confirm_pedido');
                    session()->forget('diff');

                    DB::table('orders')
                        ->where('status', '=', 'Pendente')
                        ->update([
                            'id_adress' => '',
                            'forma_entrega' => ''
                        ]);
                    return redirect()->route('cart');

                } else {
                    $id = Auth::user()->id;

                    $update = DB::table('orders')
                        ->where('user_id', '=', Auth::user()->id)
                        ->update(['forma_pagamento' => $request->input('forma_pagamento')]);

                    return redirect()->route('finish_order');
                }
            } else {
                return redirect()->route('cart');
            }
        } else {
            return view('error.404');
        }
    }

    public function finish_order()  // FINALIZAR O PEDIDO VIEW
    {
        if (Auth::user()->nivel == 2) {
            if (session()->has('confirm_pedido')) {
                $now = Carbon::now();

                session()->put('diff', $now->diffInSeconds(session('confirm_pedido')));

                if (session('diff') > '1200') {
                    session()->forget('confirm_pedido');
                    session()->forget('diff');

                    DB::table('orders')
                        ->where('status', '=', 'Pendente')
                        ->update([
                            'id_adress' => '0',
                            'forma_entrega' => ''
                        ]);
                    return redirect()->route('cart');
                } else {
                    $count = Order::get_count();
                    $order = Order::get_first_order();
                    $query = Order::get_orders();

                    $subtotal = 0;
                    foreach ($query as $sub) {
                        $subtotal += (intval($sub->product_price) * $sub->quantidade);
                    }

                    return view('orders.finish_order')->with('subtotal', $subtotal)->with('count', $count)->with('query', $query)
                        ->with('order', $order);
                }
            } else {
                return redirect()->route('cart');
            }
        } else {
            return view('error.404');
        }
    }

    public function order_submit(Request $request)
    {
        if (Auth::user()->nivel == 2) {
            if (session()->has('confirm_pedido')) {
                $now = Carbon::now();

                session()->put('diff', $now->diffInSeconds(session('confirm_pedido')));

                if (session('diff') > '1200') {
                    session()->forget('confirm_pedido');
                    session()->forget('diff');

                    DB::table('orders')
                        ->where('status', '=', 'Pendente')
                        ->update([
                            'id_adress' => '0',
                            'forma_entrega' => ''
                        ]);
                    return redirect()->route('cart');
                } else {
                    $order_name = implode(" - ", $request->input('order_name'));
                    $user_id = Auth::user()->id;
                    $order_price = $request->input('order_price');
                    $id_adress = $request->input('id_adress');
                    $forma_entrega = $request->input('forma_entrega');

                    $insert = DB::table('orders_admin')->insert([
                        'order_user_id' => $user_id,
                        'order_name' => $order_name,
                        'order_price' => $order_price,
                        'adress' => $id_adress,
                        'forma_entrega' => $forma_entrega,
                        'status' => 'confirmado'
                    ]);

                    DB::table('orders')
                        ->update([
                            'status' => 'confirmado',
                        ]);

                    return redirect()->route('home');
                }
            } else {
                return redirect()->route('cart');
            }
        } else {
            return view('error.404');
        }
    }

        public
        function quantidade($id) // VIEW PARA ALTERAR QUANTIDADE DO PRODUTO (MUDAR ISSO) PARA ALTERAR NA VIEW DE CART
        {
            if (Auth::user()->nivel == 2) {
                if (session()->has('confirm_pedido')) {
                    $now = Carbon::now();

                    session()->put('diff', $now->diffInSeconds(session('confirm_pedido')));

                    if (session('diff') > '1200') {
                        session()->forget('confirm_pedido');
                        session()->forget('diff');

                        DB::table('orders')
                            ->where('status', '=', 'Pendente')
                            ->update([
                                'id_adress' => '0',
                                'forma_entrega' => ''
                            ]);
                        return redirect()->route('cart');
                    } else {

                        $count = User::count_orders();
                        $query = DB::table('orders')
                            ->where('order_id', '=', $id)
                            ->first();

                        return view('orders.quantidade_produto')->with('count', $count)->with('row', $query);
                    }
                } else {
                    return redirect()->route('cart');
                }
            } else {
                return view('error.404');
            }
        }

        public
        function quantidade_post(Request $request)   // FUNÇÃO QUE ALTERA A QUANTIDADE DO PRODUTO
        {
            if (Auth::user()->nivel == 2) {
                if (session()->has('confirm_pedido')) {
                    $now = Carbon::now();

                    session()->put('diff', $now->diffInSeconds(session('confirm_pedido')));

                    if (session('diff') > '1200') {
                        session()->forget('confirm_pedido');
                        session()->forget('diff');

                        DB::table('orders')
                            ->where('status', '=', 'Pendente')
                            ->update([
                                'id_adress' => '0',
                                'forma_entrega' => ''
                            ]);
                        return redirect()->route('cart');
                    } else {
                        $query = DB::table('orders')
                            ->where('order_id', '=', $request->input('order_id'))
                            ->update(['quantidade' => $request->input('qtdValue')]);

                        if ($query) {
                            return redirect('/finish_order');
                        }
                    }
                } else {
                    return redirect()->route('cart');
                }
            } else {
                return view('error.404');
            }
        }

        public
        function add_card(Request $request)  // ADICIONAR CARTÃO DE CRÉDITO
        {
            if (Auth::user()->nivel == 2) {
                if (session()->has('confirm_pedido')) {
                    $now = Carbon::now();

                    session()->put('diff', $now->diffInSeconds(session('confirm_pedido')));

                    if (session('diff') > '1200') {
                        session()->forget('confirm_pedido');
                        session()->forget('diff');

                        DB::table('orders')
                            ->where('status', '=', 'Pendente')
                            ->update([
                                'id_adress' => '0',
                                'forma_entrega' => ''
                            ]);
                        return redirect()->route('cart');
                    } else {
                        $validation2 = $this->validation2($request->all());

                        if ($validation2->fails()) {
                            return redirect()->back()->withErrors($validation2->errors())->withInput($request->all());
                        }

                        $id = Auth::user()->id;
                        $array = array(
                            $request->input('card_date_month'),
                            $request->input('card_date_year')
                        );
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
                } else {
                    return redirect()->route('cart');
                }
            } else {
                return view('error.404');
            }
        }


        // A PARTIR DAQUI É ÁREA APENAS DO ADM

        public
        function orders_confirmed()    // PEDIDOS PENDENTES VIEW
        {
            if (Auth::user()->nivel == 1) {
                $count = User::count_orders();
                $query = Order::get_orders_admin();


                return view('orders.admin_view')->with('count', $count)->with('query', $query);
            } else {
                return view('error.404');
            }
        }

        public
        function orders_delivery()   // PEDIDOS JÁ ENTREGUES
        {
            if (Auth::user()->nivel == 1) {
                $count = User::count_orders();
                $query = Order::get_orders_delivery();

                return view('orders.delivery')->with('count', $count)->with('query', $query);
            } else {
                return view('error.404');
            }
        }


        private
        function validation1($data1)
        {
            $regras1 = [
                'cep' => 'required',
                'bairro' => 'required',
                'rua' => 'required',
            ];

            $mensagens1 = [
                'cep.required' => 'preencha o CEP',
                'bairro.required' => 'preencha o bairro',
                'rua.required' => 'preencha o bairro',
            ];

            return Validator::make($data1, $regras1, $mensagens1);
        }

        private
        function validation2($data2)
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
