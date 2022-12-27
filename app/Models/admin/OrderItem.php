<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\Product;

class OrderItem extends Model
{
    use HasFactory;

    protected $hidden = ['pivot'];

}
