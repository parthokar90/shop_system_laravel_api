<?php

namespace App\Models\front;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

use App\Models\admin\Product;

class Wishlist extends Model
{
    use HasFactory;

    protected $guarded = [];  

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
