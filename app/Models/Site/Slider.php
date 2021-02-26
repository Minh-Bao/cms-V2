<?php

namespace App\Models\Site;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'sitesliders';
    protected $fillable = ['title', 'width', 'height', 'type', 'ratio'];

}
