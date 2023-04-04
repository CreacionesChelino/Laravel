<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'stock',
        'active',
        'category_id',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // funcion para que el producto se inactiva cuando se agota el stock o sea igual a 0

    public function inactiveWhenStockZero()
    {
        if ($this->stock == 0) {
            $this->active = false;
            $this->save();
        }
    }

    // funcion para que el producto se active cuando se agrega stock o sea mayor a 0

    public function activeWhenStockMoreThanZero()
    {
        if ($this->stock > 0) {
            $this->active = true;
            $this->save();
        }
    }
}
