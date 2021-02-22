<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Websitebloc extends Model
{
    use HasFactory;
    protected $table = 'siteblocs';

    protected $fillable = [
        'sitepages_id', 'sitesliders_id', 'title', 'content', 'conten_two', 'image', 'title_img', 'alt_img', 'url_image', 'format', 'sort', 'created_at', 'updated_at'
    ];

}
