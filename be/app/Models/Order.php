<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'order_number', 'total_amount', 'status', 'payment_status', 'shipping_address', 'shipping_phone', 'notes'];

    public function user()
    {
        return $this->belongsTo(User::class); //1 đơn hàng thuộc về 1 user
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class); //1 đơn hàng sẽ có nhiều chi tiết đơn hàng (như mua nhiều sản phẩm khác nhau)
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($order) {
            $order->order_number = 'ORD-' . time() . '-' . rand(1000, 9999);
        });
    }
}
