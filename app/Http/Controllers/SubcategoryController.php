<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\File;

class SubcategoryController extends Controller
{
    public function index(Request $request)
    {
    	$subcategories = Subcategory::latest()->get();
    	return view('subcategory.index', compact('subcategories'));
    }

    public function insert()
    {
    	$category_id = Category::all();
    	return view('subcategory.insert', compact('category_id'));
    }

    public function store(Request $request)
    {
    	//dd($request->all());
    	$request->validate([
    		'category_id'    =>  'required',
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
              $image->move(public_path('images/subcategory'), $new_name);
          }

        $subcategory = new Subcategory;
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->description = $request->description;
        $subcategory->status = $request->status;
        $subcategory->image = $new_name;
        $subcategory->save();

        return redirect('subcategory');
    }

    public function status(Request $request,$status,$id)
    {
        $model=Subcategory::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Subcategory status updated');
        return redirect('subcategory');
    }

    public function edit($id)
    {
    	$category_id= Category::all();
    	$subcategory = Subcategory::find($id);
    	return view('subcategory.edit', compact('subcategory','category_id'));
    }

    public function update(Request $request, $id)
    {
    	//dd($request->all());
    	$image_name = $request->hidden_image;
    	$request->validate([
    		'category_id'    =>  'required',
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
              $image->move(public_path('images/subcategory'), $new_name);
          }

        else
        {
            $new_name = $request->hidden_image;
        }

        $subcategory = Subcategory::find($id);
        //File::delete(public_path('images/subcategory/'.$subcategory->image));
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->description = $request->description;
        $subcategory->status = $request->status;
        $subcategory->image = $new_name;
        $subcategory->save();

        return redirect('subcategory');
    }

    public function delete(Request $request,$id)
    {
	    $model=Subcategory::find($id);
	    File::delete(public_path('images/subcategory/'.$model->image));
	    $model->delete();
	    $request->session()->flash('message','Subcategory deleted');
	    return redirect('subcategory');
    }



}
