<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCategory extends Model
{
    use HasFactory;

    protected $table = 'blog_categories';

    public function blog(): HasMany
    {
        return $this->hasMany(Blog::class, 'blog_category_id', 'id');
    }
}
