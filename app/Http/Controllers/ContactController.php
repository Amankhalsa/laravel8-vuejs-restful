<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\Contact;
use App\Models\ContactForm;

class ContactController extends Controller
{
    //
    public function index(){
    return view('contact');
    }
    public function admin_contact(){
    	$data['get_contact']=Contact::all();
    	return view('admin.contact.index',$data);
    }
    //======================== add contact ========================
    public function add_contact_data(){
    	return view('admin.contact.create');


    }
    // ======================== store ========================
    public function store_contact_data(Request $request){
    		$data =new Contact();
    		$data->address =$request->address;
    		$data->email =$request->email;
    		$data->phone =$request->phone;
    		$data->save();


return redirect()->route('admin.contact')->with('success','ਤੁਹਾਡਾ ਡਾਟਾ ਐਡ ਹੋ ਗਿਆ ਹੈ ');

    }

    //edit 
public function edit_contact_data($id){
		$data['edit_contact']=Contact::find($id);
    	return view('admin.contact.edit',$data);

}


//======================== update contact data ========================
public function update_contact(Request $request,$id){

    		$data =Contact::find($id);
    		$data->address =$request->address;
    		$data->email =$request->email;
    		$data->phone =$request->phone;
    		$data->save();

return redirect()->route('admin.contact')->with('success','ਤੁਹਾਡਾ ਡਾਟਾ ਅਪਡੇਟ ਹੋ ਗਿਆ ਹੈ ');

}

// ============================== home page address ================
public function view_home_contact(){

	$data['get_address'] = DB::table('contacts')->first();
	return view('admin.pages.contact',$data);

}

//====================== send message ==========================

public function send_contact(Request $request){

            $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required',
        'subject' => 'required',
        'message' => 'required',

    ],[
        'name.required' => 'ਓ ਮਾਮਾ ਖਾਲੀ ਨਾ ਛੱਡ',
        'email.required' => 'ਓ ਮਾਮਾ ਖਾਲੀ ਨਾ ਛੱਡ',
        'subject.required' => 'ਓ ਮਾਮਾ ਖਾਲੀ ਨਾ ਛੱਡ',
        'email.required' => 'ਓ ਮਾਮਾ ਖਾਲੀ ਨਾ ਛੱਡ',

    ]);
    $data =new ContactForm();
    $data->name =$request->name;
    $data->email =$request->email;
    $data->subject =$request->subject;
    $data->message =$request->message;
    $data->save();


return redirect()->route('contact.messages')->with('success','ਤੁਹਾਡਾ ਡਾਟਾ ਅਪਡੇਟ ਹੋ ਗਿਆ ਹੈ ');
  


}
//view messages 
public function contact_messages(){
    $data['get_messages']=DB::table('contact_forms')->get();
    return view('admin.contact.message',$data);

}


}
