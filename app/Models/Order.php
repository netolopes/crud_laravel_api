<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'status'
    ];


    public function users() {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class,'order_id','id');
    }
}
