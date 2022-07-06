<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentralSale extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'product_category_id', 'pay_amount', 'qty'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
