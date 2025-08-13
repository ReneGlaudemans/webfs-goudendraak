<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['dish_id', 'new_price', 'start_date', 'end_date'];

    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }
}
