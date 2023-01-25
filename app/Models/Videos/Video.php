<?php

namespace App\Models\Videos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = ['title','category','description','videofile','type','slug','bannerfile','order','popular'];
}
