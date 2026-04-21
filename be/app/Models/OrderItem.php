<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price', 'subtotal'];

    public function order()
    {
        return $this->belongsTo(Order::class); //mỗi dòng trong chi tiết đơn hàng chỉ nằm trong 1 đơn hàng
    }

    public function product()
    {
        return $this->belongsTo(Product::class);  //mỗi dòng trong chi tiết đơn hàng chỉ đại diện cho 1 sản phẩm
    }
}

