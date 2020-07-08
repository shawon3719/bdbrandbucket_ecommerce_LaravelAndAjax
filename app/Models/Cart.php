<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    public $fillable =[
        'user_id',
        'ip_address',
        'product_id',
        'product_quantity',
        'order_id',

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function order(){
        return $this->belongsTo(Order::class);
    }

    /*
     * Total Carts
     * @return Integer total cart model
     */
    public static function totalCarts(){
        if (Auth::check()){
            $carts = Cart::where('user_id', Auth::id())
                ->orWhere('ip_address', request()->ip())
                ->where('order_id', NULL)
                ->get();
        }else{
            $carts = Cart::where('ip_address',request()->ip())
                ->where('order_id', NULL)
                ->get();
        }
        return $carts;
    }
    /*
     * Total Items in the Cart
     * @return Integer
     */
    public static function totalItems(){
        $carts = Cart::totalCarts();
        $total_item =0;
        foreach ($carts as $cart){
            $total_item += $cart->product_quantity;
        }
        return $total_item;
    }
}
