<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug'];

    public function posts(){
        //Aqui se devuelve una relacion uno a muchos
        return $this->hasMany(Post::class);
    }
}
