<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Category;
use App\Models\User;
use Illuminate\support\Carbon;

use App\Models\Brand;


class BrandController extends Controller
{
    //
    // ============= view brand ===============

    public function view_brand(){
    	$data['get_brand']=Brand::all();
    	$data['get_trash']=Brand::onlyTrashed()->get();
    	return view('admin.brand.index',$data);
    }


// =============== store brand ==================
    public function store_brand(Request $request){
	    $validatedData = $request->validate([
        'brand_name' => 'required|unique:brands|min:4',
        'brand_image' => 'required|mimes:jpg,png,jpeg,webp',
    ],[
        'brand_name.required' => 'ਓ ਮਾਮਾ ਖਾਲੀ ਨਾ ਛੱਡ',
        'brand_image.required' => 'ਓ ਮਾਮਾ ਫੋਟੋ ਵੀ ਖਾਲੀ ਨਾ ਛੱਡ',
        'brand_image.min' => 'Brand longer than 4 char',
    ]);


	    $brand_image =$request->file('brand_image');
	    $gen_name= hexdec(uniqid());
	    $img_ext = strtolower($brand_image->getClientOriginalExtension());
	    $img_name = $gen_name.'.'.$img_ext;
	    $img_location ='brand/images/';
	   	$last_img= $img_location.$img_name;
	   	$brand_image->move($img_location,$img_name);

	    	Brand::insert([
	    		'brand_name'=>$request->brand_name,
	    		'brand_image'=>$last_img,
	    		'created_at'=>Carbon::now()


	    	]);
 return redirect()->back()->with('success','ਤੁਹਾਡਾ ਡਾਟਾ ਐਡ ਹੋ ਗਿਆ ਹੈ ');




    }

    // ============= edit  brand ===============

    public function edit_brand($id){
    	$data['get_brand'] =Brand::find($id);
    	return view('admin.brand.edit',$data);

    }

public function update_brand(Request $request, $id){

$old_image= $request->old_image;
 $brand_image =$request->file('brand_image');
 if ($brand_image) {
 	# code...
 
	    $gen_name= hexdec(uniqid());
	    $img_ext = strtolower($brand_image->getClientOriginalExtension());
	    $img_name = $gen_name.'.'.$img_ext;
	    $img_location ='brand/images/';
	   	$last_img= $img_location.$img_name;
	   	$brand_image->move($img_location,$img_name);
unlink($old_image);
	    	Brand::find($id)->update([
	    		'brand_name'=>$request->brand_name,
	    		'brand_image'=>$last_img,
	    		'created_at'=>Carbon::now()


	    	]);
 return redirect()->route('all.brand')->with('success','ਤੁਹਾਡਾ ਡਾਟਾ ਐਡ ਹੋ ਗਿਆ ਹੈ ');
}
else{
		    	Brand::find($id)->update([
	    		'brand_name'=>$request->brand_name,

	    		'created_at'=>Carbon::now()


	    	]);
 return redirect()->route('all.brand')->with('success','ਤੁਹਾਡਾ ਡਾਟਾ ਐਡ ਹੋ ਗਿਆ ਹੈ ');

}

}

    // ============= Delete brand ===============
    public function delete_brand($id){
  	$data =Brand::find($id)->delete();
    	 return redirect()->back()->with('success','ਤੁਹਾਡਾ ਡਾਟਾ Delete ਹੋ ਗਿਆ ਹੈ ');
    }


    // ============= Delete brand ===============
    public function restore_brand($id){
  	$data =Brand::withTrashed()->find($id)->restore();
    	 return redirect()->back()->with('success','ਤੁਹਾਡਾ ਡਾਟਾ Restore ਹੋ ਗਿਆ ਹੈ ');
    }
        // ============= param Delete brand ===============
    public function paramdelete_brand($id){
    	$image=Brand::onlyTrashed()->find($id);
    	$old_image =$image->brand_image;
    	// dd($old_image);
    	unlink($old_image);
  	$data =Brand::onlyTrashed()->find($id)->forcedelete();

    	 return redirect()->route('all.brand')->with('success','ਤੁਹਾਡਾ ਡਾਟਾ Param Delete ਹੋ ਗਿਆ ਹੈ ');
    }
}
