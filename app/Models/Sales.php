<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Products;

class Sales extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'cart_id',
        'quantity',
        'subtotal',
        'total',
        'paid',
    ];

   //de la venta usando el campo quantity reduce la cantidad de productos en la tabla productos

    public function reduceQuantity($quantity, $product_id)
    {
        $product = Products::find($product_id);
        // dd($product);
        $product->stock = $product->stock - $quantity;
        // dd($product->stock);
        $product->save();
    }

}
