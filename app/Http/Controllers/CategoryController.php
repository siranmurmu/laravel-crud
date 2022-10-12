<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Support\Facades\File; //For Delete an Image

class CategoryController extends Controller
{
    public function index(Request $request)
    {
    	$categories=Category::latest()->get();
    	return view('category.index', compact('categories'));
    }

    public function insert()
    {
    	return view('category.insert');
    }

    public function store(Request $request)
    {
    	//dd($request->all());
    	$request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' =>'required',
            'image' => 'mimes:png,jpeg,jpg,gif'
        ]);

    	 //image
         $image = $request->file('image');
         if($image!='')
          {
                $new_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/category'), $new_name);
          }

        // Category::insert([
        // 	'name'=>$request->name,
        // 	'description'=>$request->description,
        // 	'status'=>$request->status,
        // 	'image'=>$new_name,
        // 	'created_at' => Carbon::now()
        // ]);
        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->image = $new_name;
        $category->save();

        return redirect('category');
    }

    public function status(Request $request,$status,$id)
    {
        $model=Category::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Category status updated');
        return redirect('category');
    }

    public function delete(Request $request,$id){
        $model=Category::find($id);
        File::delete(public_path('images/category/'.$model->image));
        $model->delete();
        $request->session()->flash('message','Category deleted');
        return redirect('category');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('category.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $image_name = $request->hidden_image;
        $request->validate([
                'name'    =>  'required|unique:categories,name,'.$id,
                'description'     =>  'required',
                'status'        => 'required',
                'image'         =>  'mimes:png,jpeg,jpg,gif'// do not use image, and add jpg extension
        ]);

        $image = $request->file('image');
        if($image!='')
        {
                $new_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/category'), $new_name);
        }

        else
        {
            $new_name = $request->hidden_image;
        }

        $category = Category::find($id);
        //File::delete(public_path('images/category/'.$category->image));
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->image = $new_name;
        $category->save();

        return redirect('category');
      
    }
}
