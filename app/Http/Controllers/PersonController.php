<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    //
    public function index(){
        return view("registar");
    }

    public function register(Request $r){
        //dd($r->all());

        $r->validate([
            'username'=>'required',
            'password'=>'required',
            'conf_password'=>'required|same:password',
            'email'=>'required|email',
            'phone'=>'required|numeric|digits:10',
            'city'=>'required'
        ]);
        // $imgName=time() .'.'.$r->img->extension();
        // $r->img->move(public_path('Users'),$imgName);

        $table=new Person;
        $table->username=$r->username;
        $table->password=$r->password;
        $table->email=$r->email;
        $table->phone=$r->phone;
        $table->city=$r->city;
        $table->address=$r->address;
        $table->image=" ";
        $table->save();
        return redirect('/login')->withSuccess('Registered Successfully!!!!');
    }
}
