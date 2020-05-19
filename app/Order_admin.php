<?php


namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Order_admin as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Order_admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'orders_admin';
    protected $primaryKey = 'num_pedido';

    protected $fillable = [
        'order_user_id', 'order_name', 'order_price', 'adress', 'forma_entrega', 'status',
    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
