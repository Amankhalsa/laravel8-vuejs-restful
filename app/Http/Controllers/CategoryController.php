<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\Category;
use App\Models\User;

use Illuminate\support\Carbon;
use Illuminate\support\Facades\DB;



class CategoryController extends Controller
{
    //
public function view_category(){
	 // quesy builder relation with user and category table 
    $data['get_cat_data']=DB::table('categories')
    ->join('users','categories.user_id','users.id')
    ->select('categories.*','users.name')
    ->latest()->paginate(5);

    // $data['get_cat_data']=Category::all();
    // $data['get_cat_data']=Category::paginate(5);

    // featchdata by query builder 
    // $data['get_cat_data']=DB::table('categories')->latest()->get();
    // $data['get_cat_data']=DB::table('categories')->paginate(5);

	return view('admin.category.index',$data);

} 
public function store_category(Request $request){
	    $validatedData = $request->validate([
        'category_name' => 'required|unique:categories|max:255',
 
    ],

[
        'category_name.required' => 'ਓ ਮਾਮਾ ਖਾਲੀ ਨਾ ਛੱਡ',
        'category_name.max' => 'Category less than 255 char',

 
    ]
);

//         Category::insert([
//         'category_name'=>$request->category_name,
//         'user_id'=>Auth::user()->id,
//         'created_at'=>Carbon::now()


// ]);

//============= Usefull profession way to  insert data =============
             $data =new  Category();
            $data->user_id =  Auth::user()->id;
            $data->category_name = $request->category_name;
            $data->save();

//=============== Quesry builder way to insert data ===============
        // $data =array();
        // $data['category_name']=$request->category_name;
        // $data['user_id']=  Auth::user()->id;
        // $data['created_at']=  Carbon::now();
        // DB::table('categories')->insert($data);



            return redirect()->route('all.category')->with('success','ਤੁਹਾਡਾ ਡਾਟਾ ਐਡ ਹੋ ਗਿਆ ਹੈ ');

}
}
