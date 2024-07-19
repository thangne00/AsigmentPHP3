<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content', 'image'];

    public function getExcerpt($length = 150)
    {
        return substr(strip_tags($this->content), 0, $length) . '...';
    }

    public function category()
{
    return $this->belongsTo(Category::class);
}
}
