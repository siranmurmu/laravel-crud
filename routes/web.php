<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleImageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Category
Route::get('/category',[CategoryController::class,'index']);
Route::get('/category-insert',[CategoryController::class,'insert'])->name('insert.category');
Route::post('/category-store',[CategoryController::class,'store'])->name('store.category');
Route::get('category/status/{status}/{id}',[CategoryController::class,'status']);
Route::get('category/delete/{id}',[CategoryController::class,'delete']);
Route::get('category/edit/{id}',[CategoryController::class,'edit']);
Route::post('category-update/{id}',[CategoryController::class,'update'])->name('update.category');

//Subcategory
Route::get('/subcategory',[SubcategoryController::class,'index']);
Route::get('/subcategory-insert',[SubcategoryController::class,'insert'])->name('insert.subcategory');
Route::post('/subcategory-store',[SubcategoryController::class,'store'])->name('store.subcategory');
Route::get('subcategory/status/{status}/{id}',[SubcategoryController::class,'status']);
Route::get('subcategory/delete/{id}',[SubcategoryController::class,'delete']);
Route::get('subcategory/edit/{id}',[SubcategoryController::class,'edit']);
Route::post('subcategory-update/{id}',[SubcategoryController::class,'update'])->name('update.subcategory');

//Products
Route::get('/product',[ProductController::class,'index']);
Route::get('/product-insert',[ProductController::class,'insert'])->name('insert.product');
Route::post('/product-store',[ProductController::class,'store'])->name('store.product');
Route::get('product/status/{status}/{id}',[ProductController::class,'status']);
Route::get('product/delete/{id}',[ProductController::class,'delete']);
Route::get('product/edit/{id}',[ProductController::class,'edit']);
Route::post('product-update/{id}',[ProductController::class,'update'])->name('update.product');

//Article
Route::get('/article',[ArticleController::class,'index']);
Route::get('/article-insert',[ArticleController::class,'insert'])->name('insert.article');
Route::post('/article-store',[ArticleController::class,'store'])->name('store.article');
Route::get('/article-show/{id}',[ArticleController::class,'show'])->name('show.article');
Route::get('/article-edit/{id}',[ArticleController::class,'edit']);
Route::post('/article-update/{id}',[ArticleController::class,'update'])->name('update.article');
Route::get('/article-delete/{id}',[ArticleController::class,'delete']);

//Article Image
Route::post('/articleImage/{id}',[ArticleImageController::class,'imageDelete'])->name('articleImage.destroy');



//get Subcategory
Route::get('/getsubcategory',[ProductController::class,'categoryvalue']);
//Route::get('/getsubcategory', 'ProductController@categoryvalue');
