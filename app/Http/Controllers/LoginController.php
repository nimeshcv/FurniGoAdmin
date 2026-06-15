<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Person;
use App\Models\Furniture;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('logins');
    }

    public function loggedin(Request $r){
        $r->validate([
            'uname' => 'required',
            'pwd' => 'required'
        ]);

        $data = Person::where('username', $r->uname)
                      ->where('password', $r->pwd)
                      ->first();

        $banners=Banner::where('status','1')->get();

        if (strcmp($r->uname, "admin") == 0 && strcmp($r->pwd, "admin") == 0) {
            $banner_count=Banner::count();
            $cat_count=Category::count();
            $pr_count=Furniture::count();
            $user_count=Person::count();

            $r->session()->put('uname', 'admin');

            $data = Cart::where('status', 1)->sum('totalamt');
            $item = Furniture::where('status', 1)->get();
            return view('adminhome', compact('data', 'item',
            'banner_count','cat_count'
            ,'pr_count','user_count'));
        } elseif ($data != null) {
            $r->session()->put('uname',  $r->uname);

            $r->session()->put('uname', $r->uname);

            $r->session()->put('id', $data->id);
            $cart_count=Cart::where('uid',$data->id)
                        ->where('status','0')->count();
            session()->put('ccount',$cart_count);

            $clist = Category::get(); // select * from category
            $blist = Furniture::where('status', 1)->get();
            return view('userhome', compact('clist', 'blist','banners'));
        } else {
            return redirect('login')->withSuccess( 'Username password not matched');
        }
    }

    public function getpackagedata($id){
        $datas = Furniture::where('cid', $id)->paginate(3);
        $cat = Category::where('id', $id)->get();
        return view('userproduct', compact('datas', 'cat'));
    }

    public function getcategorydata(){
        $category = Category::get();
        return view('userhome', ['data' => $category]);
    }

    public function userhome(){
       
            $clist = Category::get(); // select * from category
            $blist = Furniture::where('status', 1)->get();
            $banners= Banner::where('status','1')->get();
            return view('userhome', compact('clist', 'blist','banners'));
        
        
    }

    public function asc($id){
        $datas = Furniture::orderBy('price', 'ASC')->where('cid', $id)->paginate(3);
        $cat = Category::where('id', $id)->get();
        return view('userproduct', compact('datas', 'cat'));
    }

    public function desc($id){
        $datas = Furniture::orderBy('price', 'DESC')->where('cid', $id)->paginate(3);
        $cat = Category::where('id', $id)->get();
        return view('userproduct', compact('datas', 'cat'));
    }

    public function getrevenue(){
        if(empty(session('uname'))){
            return redirect('login');
        }else{
            $banner_count=Banner::count();
            $cat_count=Category::count();
            $pr_count=Furniture::count();
            $user_count=Person::count();
        $data = Cart::where('status', 1)->sum('totalamt');
        $item = Furniture::where('status', 1)->get();
        return view('adminhome', compact('data', 'item',
        'banner_count','cat_count'
        ,'pr_count','user_count'));
        }
    }

    public function getOrderHistory()  {
        if(!empty(session('uname'))){
            $product=Furniture::get();

        $id=session()->get('id');
        $user=Person::where('id',$id)->first();

        $data=Cart::where("uid",$id)->where('status','1')->latest()->get();
        return view('myorder',compact('data','user','product'));
        }else{
            return redirect('login');
        }

        
    }
    public function getproduct(){
        $datas = Furniture::paginate(3);
        $cat = Category::get();
        return view('productall', compact('datas', 'cat'));
    }

    public function getproductSearch(Request $request){
        $datas = Furniture::where('productname','LIKE','%'.$request->search.'%')->paginate(3);
        $cat = Category::get();
        return view('productall', compact('datas', 'cat'));
    }

    public function userdisplay(){
        $user = Person::paginate(6);
        return view('user', ['user' => $user]);
    }

    public function logout()  {

        session()->flush();
        return redirect('login')->withSuccess('Logout Successfully!!!!');

        
    }
}
