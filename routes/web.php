<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Models\Slider;
use App\Http\Controllers\HomeaboutController;





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
	  	$data['get_brand']=DB::table('brands')->get();
    return view('home.index',$data);
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
// ==========================================================================

// ================== Contact us  ========================

Route::get('admin/contact',[ContactController::class,'admin_contact'])->name('admin.contact');


//======================== create contact ========================
Route::get('create/contact',[ContactController::class,'add_contact_data'])->name('add.contact.data');


//======================== store contact ========================
Route::post('store/contact',[ContactController::class,'store_contact_data'])->name('store.admin.contact');


//======================== edit contact ========================

Route::get('edit/contact/{id}',[ContactController::class,'edit_contact_data'])->name('edit.contact.data');



//======================== update ========================
Route::post('update/contact/{id}',[ContactController::class,'update_contact'])->name('update.admin.contact');



// home view contact address
Route::get('view-home/contact/',[ContactController::class,'view_home_contact'])->name('home.contact');

// send contact 

Route::post('send/contact/',[ContactController::class,'send_contact'])->name('send.contact');

//messages
Route::get('view/messages/',[ContactController::class,'contact_messages'])->name('contact.messages');




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

	// $data['get_data']= User::all();
	// $data['get_data']=DB::table('users')->get();
    // return view('dashboard',$data);
    return view('admin.index');
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
Route::post('brand/update/{id}',[BrandController::class,'update_brand'])->name('update.brand');

//delete brand 
Route::get('brand/delete/{id}',[BrandController::class,'delete_brand'])->name('delete.brand');

// restore 
Route::get('brand/restore/{id}',[BrandController::class,'restore_brand'])->name('restore.brand');


// paramdelete_brand
Route::get('brand/paramdel/{id}',[BrandController::class,'paramdelete_brand'])->name('paramdelete.brand');

//store brand 

Route::post('store/brand',[BrandController::class,'store_brand'])->name('store.brand');

//multi image route 
Route::get('view-multi/images',[BrandController::class,'view_multi_images'])->name('view.multi');

//store multi images 
Route::post('/multiimages',[BrandController::class,'store_multipics'])->name('store.multipics');

// update multipics 
Route::get('edit-multi/images/{id}',[BrandController::class,'edit_multi_images'])->name('edit.ortfolio');

// update multipics 
Route::post('update-multi/images/{id}',[BrandController::class,'update_multi_images'])->name('update.multipics');



// logout 
Route::get('user/logout',[BrandController::class,'logout'])->name('user.logout');


//===================== Admin all routes ===================== 
Route::get('view/slider',[HomeController::class,'manage_slider'])->name('home.slider.view');
 

 // add slider 
Route::get('add/slider',[HomeController::class,'add_slider'])->name('add.slider');

// store slider 
Route::post('store/slider',[HomeController::class,'store_slider'])->name('store.slider');


// edit slider 
Route::get('edit/slider/{id}',[HomeController::class,'edit_slider'])->name('edit.slider');

// update slider 

Route::post('update-home/slider/{id}',[HomeController::class,'update_home_slider'])->name('update.slider');


//delete 
Route::get('delete/slider/{id}',[HomeController::class,'delete_slider'])->name('delete.slider');
// restore 
Route::get('restore/slider/{id}',[HomeController::class,'restore_slider'])->name('restore.slider');


//parmanent delete
Route::get('parmanent/delete/slider/{id}',[HomeController::class,'pdelete_slider'])->name('pdelete.slider');


// =============  home about view ==================
Route::get('home/about',[HomeaboutController::class,'view_home_about'])->name('home.about.view');
// add home about 

Route::get('add/home/about',[HomeaboutController::class,'add_home_about'])->name('add.home.about');

//store  home about 
Route::post('store/home/about',[HomeaboutController::class,'store_home_about'])->name('store.home.about');

// edit home about 
Route::get('edit/home/about/{id}',[HomeaboutController::class,'edit_home_about'])->name('edit.home.about');
//update/
Route::post('update/home/about/{id}',[HomeaboutController::class,'update_home_about'])->name('update.home.about');

//delete data 
Route::get('delete/home/about/{id}',[HomeaboutController::class,'delete_home_about'])->name('delete.home.about');






