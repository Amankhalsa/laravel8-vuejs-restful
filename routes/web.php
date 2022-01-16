<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;



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
Route::get('about', function(){
	return view('about');	
});
// ->middleware('check')
Route::get('demo', function(){
	echo "<script> alert('hi alert'); </script>";

});

Route::get('home', function(){
	echo "this is home page ";	
});
Route::get('/contact',[ContactController::class,'index'])->name('contact');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

	// $data['get_data']= User::all();
	$data['get_data']=DB::table('users')->get();
    return view('dashboard',$data);
})->name('dashboard');
// 019 Eloquent ORM Read Users Data


// view category cont
Route::get('/view/category',[CategoryController::class,'view_category'])->name('all.category');
//store category 
Route::post('/store/category',[CategoryController::class,'store_category'])->name('store.category');

// 022 Form Validation & Show Custom Error Message

//edit category
Route::get('category/edit/{id}',[CategoryController::class,'edit_category'])->name('edit.category');


// updatedata
Route::post('category/update/{id}',[CategoryController::class,'update_category'])->name('update.category');


//soft delete 
Route::get('shoftdelete/category/{id}',[CategoryController::class,'soft_delcategory'])->name('softdel.category');


// restore 
Route::get('category/restore/{id}',[CategoryController::class,'restore_category'])->name('restore.category');

// parmanent delete 
Route::get('category/permananet/{id}',[CategoryController::class,'pdelete_category'])->name('parm.delete');

// ================= brands =======================
Route::get('brand/view',[BrandController::class,'view_brand'])->name('all.brand');

//brand edit 
Route::get('brand/edit/{id}',[BrandController::class,'edit_brand'])->name('edit.brand');

//update brand 
Route::get('brand/update/{id}',[BrandController::class,'update_brand'])->name('update_brand');

//delete brand 
Route::get('brand/delete/{id}',[BrandController::class,'delete_brand'])->name('delete.brand');



//store brand 

Route::post('store/brand',[BrandController::class,'store_brand'])->name('store.brand');

