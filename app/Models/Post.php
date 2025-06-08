<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = ['title', 'poster', 'content', 'category_id', 'habilitated'];

    // Relación con Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
