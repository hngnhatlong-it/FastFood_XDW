<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Các cột được phép lưu dữ liệu hàng loạt (Mass Assignment)
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
     * Các cột sẽ bị ẩn khi convert model sang Array hoặc JSON
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Các hàm orders(), cartItems(), isAdmin()... giữ nguyên như cũ của bạn
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}