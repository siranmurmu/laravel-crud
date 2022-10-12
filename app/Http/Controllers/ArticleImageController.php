<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleImage;

class ArticleImageController extends Controller
{
    public function imageDelete($id)
    {
    	$data = ArticleImage::find($id);
    	\File::delete(public_path('images/article/'.$data->image));
    	$data->delete();
    	return back()->with('success','Image successfully deleted');
    }
}
