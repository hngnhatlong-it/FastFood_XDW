<?php

namespace App\Models; //giúp biết class này nằm trong app\models

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'image']; //những field này sẽ được lưu vào db

    public function products() //quan hệ, tức là category sẽ có quan hệ với product
    {
        return $this->hasMany(Product::class); //một danh mục có nhiều sản phẩm
    }
}
