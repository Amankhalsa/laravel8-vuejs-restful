<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use Auth;
use Illuminate\support\Facades\DB;
use Illuminate\support\Carbon;


class HomeaboutController extends Controller
{
    //home about data view
    public function view_home_about(){
    	$data['get_about']=HomeAbout::all();
    	$data['get_trash']=HomeAbout::onlyTrashed()->get();

    	return view('admin.about.index',$data);
    }
    // ================= Home about store ==================


    public function add_home_about(){

    	return view('admin.about.create');
    }
    	public function store_home_about(Request $request){


    			// $data = new HomeAbout();
    			// $data->title = $request->title;
    			// $data->shortdis = $request->shortdis;
    			// $data->longdis= $request->longdis;
    			// $data->save();

				HomeAbout::insert([
				'title' => $request->title,
				'shortdis' => $request->shortdis,
				'longdis' => $request->longdis,
				'created_at'=>Carbon::now()

    			]);

    		
    		return redirect()->route('home.about.view')->with('success','ਤੁਹਾਡਾ ਸਲਾਈਡਰ ਡਾਟਾ ਐਡ ਹੋ ਗਿਆ ਹੈ');

    	}

    	//================ edit home about ============
    	public function edit_home_about($id){
    		$data['edit_about']=HomeAbout::find($id);
    		return view('admin.about.edit',$data);
    	}

    	// ================ update home about data ================

    	public function update_home_about(Request $request,$id){

					$data = HomeAbout::find($id);
					$data->title = $request->title;
					$data->shortdis = $request->shortdis;
					$data->longdis= $request->longdis;
					$data->save();
	return redirect()->route('home.about.view')->with('success','ਤੁਹਾਡਾ ਸਲਾਈਡਰ ਡਾਟਾ ਅਪਡੇਟ ਹੋ ਗਿਆ ਹੈ');

    	}

    	//================ delete home about ============
    	public function delete_home_about($id){
    		$data=HomeAbout::find($id)->delete();
    	return redirect()->route('home.about.view')->with('success','ਤੁਹਾਡਾ ਸਲਾਈਡਰ ਡਾਟਾ ਡਲੀਟ ਹੋ ਗਿਆ ਹੈ');
    	}

}
