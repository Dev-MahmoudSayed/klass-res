<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Menu;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\New_;

class AdminController extends Controller
{
  // user controller
    public function user()
    {
        $data = User::all();
      return view("admin.user",compact('data'));
    }
    public function deleteUser($id)
    {
       $data = User::findOrFail($id);
       
       if($data->delete())
       {
        Session::flash('message', 'User Deleted success!');
       }else{
        Session::flash('message', 'User Not Deleted !');
       }
        return redirect()->back();
    }

    // menu controller

    public function foodMenu()
    {
      return view("admin.foodMenu");
    }

    public function deleteMenu($id)
    {
       $data = Menu::findOrFail($id);
       
       if($data->delete())
       {
        Session::flash('message', 'Menu Deleted success!');
       }else{
        Session::flash('message', 'Menu Not Deleted !');
       }
        return redirect()->back();
    }

    


    public function upload(Request $request)
    { 

      $request->validate([
        'title'=>'required|string|max:15',
        'price'=>'required|numeric',
        'description'=>'required|string|max:1500',
        'img'=>'nullable']);

        $data= new Menu;
        
        $file = $request->file('image');
        
        // $exten = $request->img->extension();
        $exten = $file->getClientOriginalExtension();
        $newName = uniqid('',true).'.'.$exten;
        $destinationPath =public_path('foodimage');
        $file->move($destinationPath,$newName);
        $data->image = $newName;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->save();
        Session::flash('message', 'Added Success ');
        return redirect()->back();
    }


    public function showMenu()
    {
       
        $data = Menu::all();
      return view("admin.showMenu",compact('data'));
    }
    
    public function updateView($id)
    {
       
        $data = Menu::findOrFail($id);
       return view("admin.updateView",compact('data'));
      
    }
    public function update(Request $request,$id)
    {
       
        $data = Menu::findOrFail($id);
        $file = $request->file('image');
        
        // $exten = $request->img->extension();
        $exten = $file->getClientOriginalExtension();
        $newName = uniqid('',true).'.'.$exten;
        $destinationPath =public_path('foodimage');
        $file->move($destinationPath,$newName);
        $data->image = $newName;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->save();
        Session::flash('message', 'Added Success ');
        return redirect()->back();
       
      
    }

    // contact

    public function Contact(Request $request)
    {
      $data= new Contact();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->guest=$request->guest;
        $data->date=$request->date;
        $data->time=$request->time;
        $data->message=$request->message;
        $data->save();
        return redirect()->back();

    }
    public function viewCon()
    {
      $data = Contact::all();
      return view("admin.contact",compact("data"));
    }
    public function deleteCon($id)
    {
       $data = Contact::findOrFail($id);
       
       if($data->delete())
       {
        Session::flash('message', 'Contact Deleted success!');
       }else{
        Session::flash('message', 'User Not Deleted !');
       }
        return redirect()->back();
    }


    // chef controller

    public function viewChef()
    {
      $data= Chef::all();
      return view("admin.chef",compact('data'));
    }

    public function uploadChef(Request $request)
    {
  
      $request->validate([
        'name'=>'required|string|max:15',
        'special'=>'required|string|max:1500',
        'img'=>'nullable']);
      $data = new Chef;

      $file = $request->file('image');
        
        // $exten = $request->img->extension();
        $exten = $file->getClientOriginalExtension();
        $newName = uniqid('',true).'.'.$exten;
        $destinationPath =public_path('chefImage');
        $file->move($destinationPath,$newName);
        $data->image = $newName;

        $data->name = $request->name;
        $data->special = $request->special;
        $data->save();
        return redirect()->back();
        Session::flash('message', 'Added Success ');
    }
    public function editChef($id)
    {
      $data = Chef::findOrFail($id);
      return view("admin.updateChef",compact('data'));
    }

    public function updatedChef(Request $request,$id)
    {
      $data = Chef::findOrFail($id);
      if($request->hasFile('image'))
      {
      $file = $request->file('image');

        $exten = $file->getClientOriginalExtension();
        $newName = uniqid('',true).'.'.$exten;
        $destinationPath =public_path('chefImage');
        $file->move($destinationPath,$newName);
        $data->image = $newName;
      }
        $data->name= $request->name;
        $data->special=$request->special;
        $data->save();
        Session::flash('message', 'updated Success ');
        return redirect()->back();
    }
    public function deleteChef($id)
    {
      $data = Chef::findOrFail($id);
      if($data->delete())
      {
       Session::flash('message', ' Deleted success!');
      }else{
       Session::flash('message', ' Not Deleted !');
      }
       return redirect()->back();

    }










  } 





















