<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function article_image()
    {
    	return $this->hasMany(ArticleImage::class,'article_id');
    }
}
