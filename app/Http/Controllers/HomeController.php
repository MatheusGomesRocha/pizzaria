<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;


class HomeController extends Controller
{
    public function index(Request $request)     // PRODUTOS VIEW (HOME) OU ADMIN VIEW
    {
        $user = User::get_user();
        $pizza_limit = Product::pizza_limit();
        $burger_limit = Product::burger_limit();
        $drink_limit = Product::drink_limit();
        $count = Order::get_count();
        $countAdmin = Order::get_count_admin();
        $order = Order::all();


        if (Auth::check()) {
            if (Auth::user()->nivel == 2) {

                $now = Carbon::now();

                session()->put('diff', $now->diffInSeconds(session('data_login')))  ;

                return view('home.home')->with('count', $count)->with('user', $user)
                    ->with('pizza_limit', $pizza_limit)->with('burger_limit', $burger_limit)
                    ->with('drink_limit', $drink_limit);
            } else {
                return view('home.admin_index')->with('count', $countAdmin)->with('order', $order);
            }
        } else {
            return view('home.home')->with('user', $user)
                ->with('pizza_limit', $pizza_limit)->with('burger_limit', $burger_limit)
                ->with('drink_limit', $drink_limit);
        }
    }

    public function cardapio() {
        $pizza = Product::get_pizza();
        $burguer = Product::get_burguer();
        $drink = Product::get_drink();


        return view('home.cardapio')->with('pizza', $pizza)->with('burguer', $burguer)->with('drink', $drink);
    }
}
