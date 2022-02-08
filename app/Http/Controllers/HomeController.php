<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chef;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $data = Menu::all();
        $data2 = Chef::all(); 
        $user_id=Auth::id();
        $count = Cart::where('user_id',$user_id)->count();
        return view("pages.home",compact("data","data2","count"));
    }
    public function redirects()
    {
        $data = Menu::all();
        $data2 = Chef::all();
        $userType = Auth::user()->usertype;
        if($userType =='1')
        {
            return view('admin.adminhome');
        }
        else
        {
            $user_id=Auth::id();
            $count = Cart::where('user_id',$user_id)->count();
            return view("pages.inc.header",compact("data","data2","count"));
        }
        
    }
    public function addCart(Request $request,$id)
        {
            if(Auth::id())
            {
                $user_id=Auth::id();
                $food_id = $id;
                $qty=$request->qty;

                $cart =new Cart;

                $cart->user_id = $user_id;
                $cart->food_id = $food_id;
                $cart->qty     = $qty;
                $cart->save();


                return redirect()->back();
            }
            else
            {
                return redirect('/login');
            }
        }
        public function showCart(Request $request,$id)
        {
            $user_id=Auth::id();
            $count = Cart::where('user_id',$id)->count();
            $data2=Cart::select('*')->where('user_id','=',$id)->get();
            $data = Cart::where('user_id',$id)->join('menus','carts.food_id','=','menus.id')->get();
            return view('pages.showCart',compact('count','data','data2'));

        }
        public function remove($id)
        {
            $data =Cart::FindOrFail($id);
            $data->delete();
            return redirect()->back();

        }
}
