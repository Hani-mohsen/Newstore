<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class ProductCoupon extends Model
{
    use HasFactory , SearchableTrait;
    protected $guarded=[];
    protected $casts = [ 'expire_date'=>'datetime','start_date'=>'datetime'];
    protected $searchable = [
        'columns' => [
            'product_coupons.code' => 10,
            'product_coupons.description' => 10,
        ]
    ];
    public function status()
    {
        return $this->status ? 'Active' : 'Inactive';
    }
}
