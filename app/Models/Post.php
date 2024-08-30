<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content', 'category_id', 'description', 'posted', 'image'];

    public function category(){
        //Se hace la relacion uno a muchos inversa, para acceder desde muchos al uno
        return $this->belongsTo(Category::class);
    }
}
