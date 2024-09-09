<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kategori', 'slug'];

    // Ini artinya satu kategori bisa memiliki banyak post
    public function posts() : HasMany
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    public function scopeNamakategoridanSlug(Builder $query):void
    {
        $query->select('nama_kategori', 'slug');
    }
}
