<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
    	return view('product.index', compact('products'));
    }

    public function insert()
    {
    	$category_id = Category::all();
    	return view('product.insert', compact('category_id'));
    }

    public function store(Request $request)
    {
    	// dd($request->all());
        $request->validate([
            'category_id'    =>  'required',
            'subcategory_id' =>   'required',
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
              $image->move(public_path('images/product'), $new_name);
          }

        $product = new Product;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->image = $new_name;
        $product->save();

        return redirect('product');
    }

    public function categoryvalue(Request $request)
    {
        $category_id=$request->get('categoryID');

        //$category_id=$request->get('getsubcategory');
        $subcategories = Category::where('id',$category_id)->with('subcategory')->first();

        //dd($subcategories);
        $html="";
        
        foreach($subcategories->subcategory as $sub) //subcategories relation
        {
             
            $html .="<option value=".$sub->id.">".$sub->name."</option>";
        }

        echo $html;


    }

    public function edit($id)
    {
        $category = Category::all();
        $product= Product::findOrFail($id);
        $subcategory=Category::where('id',$product->category_id)->with('subcategory')->first();
        //dd($subcategory);
        return view('product.edit', compact('product','category','subcategory'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $image_name = $request->hidden_image;
        $request->validate([
            'category_id'    =>  'required',
            'subcategory_id' =>   'required',
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
              $image->move(public_path('images/product'), $new_name);
          }

        else
        {
            $new_name = $request->hidden_image;
        }


        $product = Product::find($id);
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->image = $new_name;
        $product->save();
        //File::delete(public_path('images/product/'.$product->image));

        return redirect('product');
    }

    public function status(Request $request,$status,$id)
    {
        $model=Product::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Product status updated');
        return redirect('product');
    }

    public function delete(Request $request,$id)
    {
        $model=Product::find($id);
        \File::delete(public_path('images/product/'.$model->image));
        $model->delete();
        $request->session()->flash('message','Product deleted');
        return redirect('product');
    }


}
