<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'quantity', 'category_id', 'image'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function favorite()
    {
        return $this->hasOne(Favorite::class, 'product_id', 'id');
    }


    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    

}
