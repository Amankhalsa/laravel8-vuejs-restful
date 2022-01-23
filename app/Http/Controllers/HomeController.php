<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Auth;
use Image;
use Illuminate\support\Carbon;
use Illuminate\support\Facades\DB;

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
        'title' => 'required|unique:sliders',
        'discription' => 'required',
        'image' => 'required|mimes:jpg,png,jpeg,webp',
    ],[
        'title.required' => 'ਓ ਮਾਮਾ ਖਾਲੀ ਨਾ ਛੱਡ',
        'discription.required' => 'ਓ ਮਾਮਾ ਖਾਲੀ ਨਾ ਛੱਡ',
        'image.required' => 'ਓ ਮਾਮਾ ਫੋਟੋ ਵੀ ਖਾਲੀ ਨਾ ਛੱਡ',
    ]);

    		    // end validation 


  $slider_image =$request->file('image');
$gen_name= hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
Image::make($slider_image)->resize(1920,1088)->save('brand/slider/'.$gen_name);
$last_img = 'brand/slider/'.$gen_name;



	    	Slider::insert([
	    		'title'=>$request->title,
	    		'discription'=>$request->discription,
	    		'image'=>$last_img,
	    		'created_at'=>Carbon::now()
	    	]);

 return redirect()->route('home.slider.view')->with('success','ਤੁਹਾਡਾ ਸਲਾਈਡਰ ਡਾਟਾ ਐਡ ਹੋ ਗਿਆ ਹੈ');

    }
    //================== edit slider ==================

    public function edit_slider($id){
        $data['edit_slider'] =Slider::find($id);
            return view('admin.slider.edit',$data);

    }
    //================== update slider ==================

    public function update_home_slider(Request $request, $id){
$old_image = $request->old_image;

 $slider_image =$request->file('image');
if ($slider_image) {
    # code...

$gen_name= hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
Image::make($slider_image)->resize(1920,1088)->save('brand/slider/'.$gen_name);
$last_img = 'brand/slider/'.$gen_name;
unlink($old_image);
}
        $data =Slider::find($id)->update([
                'title'=>$request->title,
                'discription'=>$request->discription,
                'image'=>$last_img,
                'created_at'=>Carbon::now()

        ]);
 return redirect()->route('home.slider.view')->with('success','ਤੁਹਾਡਾ ਸਲਾਈਡਰ ਡਾਟਾ ਅਪਡੇਟ ਹੋ ਗਿਆ ਹੈ');


    }
    //================== trashed  slider ==================
    public function delete_slider($id){
        $data=Slider::find($id)->delete();
 return redirect()->route('home.slider.view')->with('success','ਤੁਹਾਡਾ ਸਲਾਈਡਰ ਡਾਟਾ ਡਲੀਟ ਹੋ ਗਿਆ ਹੈ');

    //================== restore  slider ==================

}

public function restore_slider($id){
    
        $data=Slider::withTrashed()->find($id)->restore();

 return redirect()->route('home.slider.view')->with('success','ਤੁਹਾਡਾ ਸਲਾਈਡਰ ਡਾਟਾ ਵਾਪਸ ਆ ਗਿਆ ਹੈ');





    }

    // parmanent delete
    public function pdelete_slider($id){
              $data=Slider::onlyTrashed()->find($id);
              $get_image =$data->image;
              unlink($get_image);
        $data=Slider::onlyTrashed()->find($id)->forcedelete();

 return redirect()->route('home.slider.view')->with('success','ਤੁਹਾਡਾ ਸਲਾਈਡਰ ਡਾਟਾ ਪੱਕਾ ਡਲੀਟ ਹੋ ਗਿਆ ਹੈ');

    }

}
