<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Websitepage extends Model
{
    use HasFactory;
    protected $table = 'sitepages';
    protected $fillable = [
        '_token',
        'last_review',
        'paginate',
        'status',
        'name',
        'title',
        'title_article',
        'thumbnail',
        'image',
        'alt_img',
        'title_img',
        'meta_title',
        'meta_desc',
        'author',
        'content',
        'count',
        'slider_id'
    ];
}
