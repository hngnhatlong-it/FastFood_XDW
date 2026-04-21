<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'description', 'price', 'image', 'stock', 'is_active'];

    public function category()
    {
        return $this->belongsTo(Category::class); //1 hay nhiều product thuộc về 1 category
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class); //1 sản phẩm sẽ có trong nhiều đơn hàng chi tiết
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
