<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'merchant_id',
        'price',
        'status',
        'created_at'
    ];



    public function merchants() {
        return $this->belongsTo(Merchant::class,'merchant_id','id');
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class,'product_id','id');
    }

}
