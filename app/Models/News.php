<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'author',
        'content',
        'description',
        'published_at',
        'source_name',
        'title',
        'url',
        'url_to_image',
    ];
}
