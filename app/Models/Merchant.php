<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchant_name',
        'admin_id'
    ];





    public function users() {
        return $this->belongsTo(User::class,'admin_id','id');
    }

    public function products() {
        return $this->hasMany(Product::class,'merchant_id','id');
    }
}
