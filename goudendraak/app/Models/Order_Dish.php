<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Dish extends Model
{
    use HasFactory;
    public $fillable = ['quantity', 'order_id', 'dish_id', 'remark', 'side_id'];

    protected $table = 'order__dishes';

    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
    public function Dish()
    {
        return $this->belongsTo(Dish::class);
    }
    public function Side()
    {
        return $this->belongsTo(Side::class);
    }
}
