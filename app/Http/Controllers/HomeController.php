<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Auth;
use Image;
use Illuminate\support\Carbon;
class HomeController extends Controller
{
    //
    public function manage_slider(){
    	$sliders['get_sliders'] =Slider::all();
    	$sliders['get_trash'] =Slider::onlyTrashed()->get();

    	return view('admin.slider.index',$sliders);
    }
    public function add_slider(){

    	return view('admin.slider.create');
    }
    // sstore slider 
    public function store_slider(Request $request){
    		    $validatedData = $request->validate([
        'title' => 'required|unique:brands',
        'discription' => 'required',

        'image' => 'required|mimes:jpg,png,jpeg,webp',
    ],[
        'title.required' => 'ਓ ਮਾਮਾ ਖਾਲੀ ਨਾ ਛੱਡ',
        'discription.required' => 'ਓ ਮਾਮਾ  ਖਾਲੀ ਨਾ ਛੱਡ',
        'image.required' => 'ਓ ਮਾਮਾ ਫੋਟੋ ਵੀ ਖਾਲੀ ਨਾ ਛੱਡ',
    ]);

    		    // end validation 


  $slider_image =$request->file('image');
$gen_name= hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
Image::make($slider_image)->resize(300,200)->save('brand/slider/'.$gen_name);
$last_img = 'brand/slider/'.$gen_name;



	    	Slider::insert([
	    		'title'=>$request->title,
	    		'discription'=>$request->discription,
	    		'image'=>$last_img,
	    		'created_at'=>Carbon::now()
	    	]);

 return redirect()->back()->with('success','ਤੁਹਾਡਾ ਡਾਟਾ ਐਡ ਹੋ ਗਿਆ ਹੈ ');

    }

}
