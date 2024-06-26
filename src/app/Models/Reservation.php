<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function shop(){
        return $this->belongsTo('App\Models\Shop');
    }

    protected $fillable = [
        'user_id',
        'shop_id',
        'date',
        'time',
        'number'
    ];

    public function scopeDateSearch($query, $date){
        if(!empty($date)){
            $query->where('date', $date);
        }
    }
}
