<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{
    use HasFactory;


    public function article()
    {
    	return $this->belongsTo(Article::class, 'id','article_id');
    }
}
