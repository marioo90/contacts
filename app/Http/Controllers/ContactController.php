<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use Auth;

class ContactController extends Controller
{
    public function index(){
        
        
        $contacts = Contacts::select('*')
        ->get();
        
        return view('contacts', ['contacts' => $contacts]);
    }
    
    public function newContact(){
        
        return view('newContact');
    }
    
    public function createContact(Request $req){
        
            $verifyEmail = Contacts::select('*')
            ->where('email', '=',$req->email)
            ->get();
            
            $verifyContact = Contacts::select('*')
            ->where('contact', '=',$req->contact)
            ->get();
            
            if(count($verifyEmail) > 0 || count($verifyContact) > 0) {
                return redirect()->back()->with('error', 'Error! This e-mail or phone number already exists!');
            } else {

                $contact=new Contacts;
                $contact->name=$req->name;
                $contact->email=$req->email;
                $contact->contact=$req->contact;
        
                $contact->save();
                
                 if($contact->save()){
                   return redirect('/')->with('success', 'Saved!');  
            } else {
                return redirect()->back()->with('error', 'Error! Try again');
            }
        }
    }
    
    public function update(Request $req){
        $contact = Contacts::find($req->contactIdEdit);
        $contact->name=$req->contactNameEdit;
        $contact->email=$req->contactEmailEdit;
        $contact->contact=$req->contactContactEdit;
        $contact->save();
        return redirect('/');
    }

    public function delete($id)
    {
        $contact = Contacts::findOrFail($id);
        
        if($contact->delete()){
               return redirect()->back()->with('success', 'Deleted!');  
        } else {
            return redirect()->back()->with('error', 'Error! Try again');
        }
    }
    
    public function showDetails(Request $req){
    if(isset($_POST)){
        if($req->contact_id){
            
            $contacts= Contacts::findOrFail($req->contact_id);
            
            return view('showDetails', ['contacts'=>$contacts]);
   
        }

    }else 
        return redirect('/');    
    }
    
}
