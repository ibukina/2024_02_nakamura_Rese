<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function shops(){
        return $this->hasMany('App\Models\Shop');
    }

    protected $fillable=[
        'id',
        'image',
    ];
}
