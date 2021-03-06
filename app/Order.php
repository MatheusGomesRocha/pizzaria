<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Order as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Authenticatable
{
    use Notifiable;

    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'user_id', 'product_id', 'product_name', 'type', 'size', 'quantidade', 'product_price', 'id_adress', 'borda', 'cep', 'bairro', 'rua',
        'numero', 'complemento', 'referencia', 'status', 'forma_pagamento', 'forma_entrega',
    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function get_orders()
    {
        if (Auth::check()) {
            if (Auth::user()->nivel == 2) {
                return DB::table('orders')
                    ->join('products', 'products.id', '=', 'orders.product_id')
                    ->where('orders.status', '=', 'Pendente')
                    ->where('user_id', '=', Auth::user()->id)
                    ->get();
            }
        }
    }

    public static function get_first_order()
    {
        if (Auth::check()) {
            if (Auth::user()->nivel == 2) {
                return DB::table('orders')
                    ->join('adresses', 'adresses.id', '=', 'orders.id_adress')
                    ->where('orders.user_id', '=', Auth::user()->id)
                    ->first();
            }
        }
    }

    public static function get_count()
    {
        if (Auth::check()) {
            if (Auth::user()->nivel == 2) {
                return DB::table('orders')
                    ->where('user_id', '=', Auth::user()->id)
                    ->where('status', '=', 'Pendente')
                    ->count();
            }
        }
    }

    public static function get_count_admin()
    {
        if (Auth::check()) {
            if (Auth::user()->nivel == 1) {
                return DB::table('orders')
                    ->count();
            }
        }
    }

    public static function get_count_created()
    {
        if (Auth::check()) {
            if (Auth::user()->nivel == 1) {
                return DB::table('orders')
                    ->where('created_at', '=', '1')
                    ->count();
            }
        }
    }

    public static function delete_order($id)
    {
        if (Auth::check()) {
            if (Auth::user()->nivel == 2) {
                return DB::table('orders')
                    ->where('order_id', '=', $id)
                    ->delete();
            }
        }
    }

    public static function get_orders_admin()
    {
        if (Auth::check()) {
            if (Auth::user()->nivel == 1) {
                return DB::table('orders_admin')
                    ->join('users', 'users.id', '=', 'orders_admin.order_user_id')
                    ->join('adresses', 'adresses.id', '=', 'orders_admin.adress')
                    ->orderBy('orders_admin.num_pedido', 'desc')
                    ->where('status', '=', 'confirmado')
                    ->paginate(10);
            }
        }
    }

    public static function get_orders_delivery()
    {
        if (Auth::check()) {
            if (Auth::user()->nivel == 1) {
                return DB::table('orders')
                    ->join('users', 'users.id', '=', 'orders.user_id')
                    ->orderBy('entregue', 'asc')
                    ->where('entregue', '=', '1')
                    ->get();
            }
        }
    }
}
