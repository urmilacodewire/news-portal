<?php

namespace App\Models\Epaper;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epaper extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = ['title','e_file','type','slug','bannerfile','category','order','meta_title','meta_desc','meta_keyword','popular'];
}
