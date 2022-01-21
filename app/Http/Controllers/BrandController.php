<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\Models\Category;
use App\Models\User;

use App\Models\Multipicture;
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

// without image intervention 
	    // $brand_image =$request->file('brand_image');
	    // $gen_name= hexdec(uniqid());
	    // $img_ext = strtolower($brand_image->getClientOriginalExtension());
	    // $img_name = $gen_name.'.'.$img_ext;
	    // $img_location ='brand/images/';
	   	// $last_img= $img_location.$img_name;
	   	// $brand_image->move($img_location,$img_name);
// without image intervention 
// ======================= using imagee intervention ==================
$brand_image =$request->file('brand_image');
$gen_name= hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
Image::make($brand_image)->resize(300,200)->save('brand/images/'.$gen_name);
$last_img = 'brand/images/'.$gen_name;
// ======================= using imagee intervention ==================
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
    // =================== Multi picture view =======================
    public function view_multi_images(){
        $data['get_pics']=Multipicture::all();
        return view('admin.multipics.index',$data);
    }


    // ================ store multi images ==================

    public function store_multipics(Request $request){

// ======================= using imagee intervention ==================

$image =$request->file('image');
foreach($image as $value) {  //start loop
    # code...

$gen_name= hexdec(uniqid()).'.'.$value->getClientOriginalExtension();
Image::make($value)->fit(300,300)->save('brand/multi/'.$gen_name);
$last_img = 'brand/multi/'.$gen_name;
// ======================= using imagee intervention ==================
            Multipicture::insert([
         
                'image'=>$last_img,
                'created_at'=>Carbon::now()
            ]);

            }//end foreach loop

 return redirect()->back()->with('success','ਤੁਹਾਡਾ ਡਾਟਾ ਐਡ ਹੋ ਗਿਆ ਹੈ ');

    }

    //logout method 


    public function logout(){

            Auth::logout();
            return redirect()->route('login');

    }
}
