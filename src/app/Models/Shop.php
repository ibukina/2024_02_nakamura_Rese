<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    public function reservations(){
        return $this->hasMany('App\Models\Reservation');
    }

    public function favorites(){
        return $this->hasMany('App\Models\Favorite');
    }

    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }

    protected $fillable = [
        'id',
        'image',
        'name',
        'summary',
        'area',
        'genre',
    ];

    public function scopeAreaSearch($query, $area){
        if(!empty($area)){
            $query->where('area', $area);
        }
    }

    public function scopeGenreSearch($query, $genre){
        if(!empty($genre)){
            $query->where('genre', $genre);
        }
    }

    public function scopeKeywordSearch($query, $keyword){
        if(!empty($keyword)){
            $query->where('name', 'LIKE', '%' . "$keyword" . '%')
            ->orWhere('summary', 'LIKE', '%' . "$keyword" . '%');
        }
    }
}
