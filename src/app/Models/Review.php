<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function shop(){
        return $this->belongsTo('App\Models\Shop');
    }

    public function reservation(){
        return $this->belongsTo('App\Models\Reservation');
    }

    protected $fillable=[
        'user_id',
        'shop_id',
        'reservation_id',
        'score',
        'comment',
    ];
}