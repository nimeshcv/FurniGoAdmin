<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Furniture;
use App\Models\Person;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function open_register()  {
        return view('register');
    }

    public function register(Request $request)  {   

        $request->validate([
            "username"=>"required",
            "password"=>"required|min:6|max:8",
            "cpassword"=>"required|same:password",
            "email"=>"required|email",
            "mobile_no"=>"required|digits:10"
        ]);

        $table=new Admin();
        $table->username=$request->username;
        $table->password=$request->password;
        $table->mobile_no=$request->mobile_no;
        $table->email=$request->email;
        $table->sec_que=$request->sec_que;
        $table->answer=$request->answer;

        $table->save();
        return redirect('/')->withSuccess("Registered Successfully");


        
    }

    public function open_login() {
        
        $user=session()->get('user');
        if(isset($user)){
        return redirect("home");
    }
    else{
        return view('login');
        
        
    }
    }

    public function login(Request $request)  {
       

        $request->validate([
            "username"=>"required",
            "password"=>"required"
        ]);
        
        $data=Admin::where('username',$request->username)
            ->where("password",$request->password)->first();

            if($data!=null){
                session()->put("user",$data);
                return redirect("home")->withSuccess("Login Successfully!");
            }else{
                return redirect("/")->withSuccess("Username Or Password does not matched");
            }
    }

    public function home() {

        $banner_count=Banner::count();
            $cat_count=Category::count();
            $pr_count=Furniture::count();
            $user_count=Person::count();
            $data = Cart::where('status', 1)->sum('tot_amount');
            $item = Furniture::where('status', 1)->get();


            
        return view('adminhome' ,compact('data', 'item','banner_count','cat_count','pr_count','user_count'));
        
    }

    public function open_forgot_pwd()  {
        return view('fpassword');
        
    }

    public function open_cpwd()  {

        return view('cpwd');
        
    }


    public function logout()  {

        session()->flush();
        return redirect("/")->withSuccess("Successfully Logout!");
        
    }

    public function aboutus()
    {

        // $data=Banner::paginate(3);//select * from banners;
        // // echo "<pre>";
        // // print_r($data);
        return view('aboutus');

    }


}
