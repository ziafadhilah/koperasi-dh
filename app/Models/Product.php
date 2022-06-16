<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_code', 'product_category_id', 'name', 'size', 'stock', 'purchase_price', 'selling_price'];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
