<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     *  các cột được phép lưu dữ liệu hàng loạt (Mass Assignment)
     */
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'role', 
        'phone', 
        'address'
    ];

    /**
     *  các cột sẽ bị ẩn khi convert model sang Array hoặc JSON
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    //các hàm orders(), cartItems(), isAdmin()... giữ nguyên như cũ 
    public function orders()
    {
        return $this->hasMany(Order::class); //1 user sẽ có thể có nhiều đơn hàng
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class); 
    }

    public function isAdmin()
    {
        return $this->role === 'admin'; //kiểm tra phải là admin không
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', //mã hóa
        ];
    }
}