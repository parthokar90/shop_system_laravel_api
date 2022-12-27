<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\OrderItem;
use App\Models\admin\SystemStatus;
use App\Models\User;
use App\Models\admin\Coupon;
use App\Models\admin\Product;


class Order extends Model
{
    use HasFactory;

    protected $hidden = ['pivot'];

    public function orderItem(){
        return $this->hasMany(OrderItem::class);
    }

    public function orderStatus(){
        return $this->belongsTo(SystemStatus::class,'status_id');
    }

    public function customer(){
        return $this->belongsTo(User::class);
    }

    public function coupon(){
        return $this->belongsTo(Coupon::class);
    }

    public function product(){
        return $this->belongsToMany(Product::class,OrderItem::class);
    }


}
