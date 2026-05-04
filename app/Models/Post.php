<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
    return "slug"; 
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    //relacion con user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
