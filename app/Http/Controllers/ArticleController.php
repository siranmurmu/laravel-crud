<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleImage;

class ArticleController extends Controller
{
    public function index()
    {
    	$articles = Article::orderBy('id','desc')->get();
    	return view('article.index', compact('articles'));
    }

    public function insert()
    {
    	return view('article.insert');
    }

    public function store(Request $request)
    {
    	//dd($request->all());
    	$request->validate([
    		'title' => 'required',
    		'slug' => 'required',
    		'description' => '',
    		'status' => 'required',
    		'image' => '', //compulsary for multiple image insert
    	]);

        $form_data = array(
            'title'       =>   $request->title,
            'slug'        =>   $request->slug,
            'description' =>   $request->description,
            'status'      =>   $request->status,
            'ip_address'  =>   $request->ip(),
        );

        $article_id = Article::insertGetId($form_data);

        if($request->hasfile('image'))
         {

            foreach($request->file('image') as $img)
            {

                $name= rand().'.'.$img->getClientOriginalExtension();
                $img->move(public_path().'/images/article/', $name);  
                $img_array = array(
                    'article_id'    => $article_id,
                    'image'         => $name,
                );

                ArticleImage::insert($img_array);
            }
         }

        return redirect('article')->with('success', 'Data Added successfully');
    }

    public function show($id)
    {
    	$data = Article::find($id)->article_image;
    	return view('article.show', compact('data'));
    }

    public function edit($id)
    {
    	//dd($id);
    	$article = Article::find($id);
    	$article_image = Article::find($id)->article_image;

    	return view('article.edit', compact('article','article_image'));
    }

    public function update(Request $request, $id)
    {
    	//dd($request->all());
    	$request->validate([
    		'title' => 'required',
    		'slug' => 'required',
    		'description' => '',
    		'status' => 'required',
    		'image' => '', //compulsary for multiple image insert
    	]);

        $form_data = array(
            'title'       =>   $request->title,
            'slug'        =>   $request->slug,
            'description' =>   $request->description,
            'status'      =>   $request->status,
        );

        Article::whereId($id)->update($form_data);

        if($request->hasfile('image'))
         {

            foreach($request->file('image') as $img)
            {

                $name= rand().'.'.$img->getClientOriginalExtension();
                $img->move(public_path().'/images/article/', $name);  
                $img_array = array(
                    'article_id'    => $id,
                    'image'         => $name,
                );

                ArticleImage::insert($img_array);
            }
         }

        return redirect('article')->with('success', 'Data Updated successfully');
    }

    public function delete($id)
    {
    	$data = Article::find($id);
    	$article_image = Article::find($id)->article_image;

    	foreach($article_image as $ai)
    	{
    		\File::delete(public_path('/images/article/'.$ai->image));
    	}

    	$data->delete();
    	return redirect('article')->with('success', 'Data Deleted Successfully');

    }
}
