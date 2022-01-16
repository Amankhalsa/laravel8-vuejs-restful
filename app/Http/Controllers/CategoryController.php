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
    // $data['get_cat_data']=DB::table('categories')
    // ->join('users','categories.user_id','users.id')
    // ->select('categories.*','users.name')
    // ->latest()->paginate(5);

    // $data['get_cat_data']=Category::all();
    $data['get_cat_data']=Category::latest()->paginate(5);
    $data['trashdata']=Category::onlyTrashed()->paginate(3);

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

//================== edit category  ==================
public function edit_category($id){
    // $category=Category::find($id);
    // quesry builder way edit data 
         $category=DB::table('categories')->where('id',$id)->first();
    return view('admin.category.edit',compact('category'));
}

public function update_category(Request $request, $id){
    // $category =Category::find($id)->update([
    //     '$data'=>$request->category_name,
    //     'user_id'=>Auth::user()->id

    // ]);
   
    //================== quesry builder way update data ==================
        $data= array();
        $data['category_name']=$request->category_name;
        $data['user_id']=  Auth::user()->id;
        DB::table('categories')->where('id',$id)->update($data);
    return redirect()->route('all.category')->with('success','ਤੁਹਾਡਾ ਡਾਟਾ ਬਦਲ ਗਿਆ ਹੈ');


}
    //================== soft delete  data ==================

    public function soft_delcategory($id){
        $data =Category::find($id)->delete();
    return redirect()->route('all.category')->with('success','ਤੁਹਾਡਾ ਡਾਟਾ softdelete ਹੋ ਗਿਆ ਹੈ');

    }
    //================== restore   data ==================
public function restore_category($id){
        $data =Category::withTrashed()->find($id)->restore();
    return redirect()->route('all.category')->with('success','ਤੁਹਾਡਾ ਡਾਟਾ Restore ਹੋ ਗਿਆ ਹੈ');

}
// ======================== parmanent delete =====================

public function pdelete_category($id){
    $data =Category::onlyTrashed()->find($id)->forceDelete();
    return redirect()->route('all.category')->with('success','ਤੁਹਾਡਾ ਡਾਟਾ ਪੱਕਾ ਡਲੀਟ ਹੋ ਗਿਆ ਹੈ');

}
}
