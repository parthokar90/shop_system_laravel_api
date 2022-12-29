<?php

namespace App\Models\front;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

use App\Models\admin\Product;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];  

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
