<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_category_id', 'name', 'size', 'stock'];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function centralSale()
    {
        return $this->hasOne(CentralSale::class);
    }
}
