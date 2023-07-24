<?php

namespace App\Http\Controllers;

use App\Models\PhoneBook;
use Illuminate\Http\Request;

class PhoneBookController extends Controller
{
    public function index(){
        $contacts = PhoneBook::all();
        return view('phoneBookList',compact('contacts'));
    }
    public function create(){
        $this->validate(request(),[
            'name'=>'required',
            'email'=>'required',
            'contact'=>'required'
        ]);
        PhoneBook::create([
           'name'=>\request('name'),
           'email'=>\request('email'),
           'contact'=>\request('contact')
        ]);
        return redirect()->back()->with('success','Contact Added!');
    }
    public function showEdit($id){
        $contact = PhoneBook::find($id);
        return view('edit',compact('contact'));
    }
    public function editContact($id){
        $this->validate(request(),[
            'name'=>'required',
            'email'=>'required',
            'contact'=>'required'
        ]);
        $contact = PhoneBook::find($id);
        $contact->update([
            'name'=>\request('name'),
            'email'=>\request('email'),
            'contact'=>\request('contact')
        ]);
        return redirect()->route('contactList');
    }
    public function deleteContact($id){
        $contact = PhoneBook::find($id)->delete();
        return redirect()->route('contactList');
    }
}
