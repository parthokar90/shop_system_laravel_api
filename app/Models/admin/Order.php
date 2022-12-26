<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\OrderItem;
use App\Models\admin\SystemStatus;

class Order extends Model
{
    use HasFactory;

    public function orderItem(){
        return $this->hasMany(OrderItem::class);
    }

    public function orderStatus(){
        return $this->belongsTo(SystemStatus::class,'status_id');
    }
}
