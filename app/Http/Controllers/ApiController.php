<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Furniture;
use App\Models\Order;
use App\Models\Person;
use App\Models\Pincode;
use App\Models\Product;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //

    public function login(Request $request)
    {
        if (
            !isset($request->email) &&
            !isset($request->password) ){
                return [
                    "status" => false,
                    "message" => "Not Sufficient Parameter",
                    "person" => null
                ];

            }else{
                $table = Person::where("email",$request->email)
                ->where('password',$request->password)->first();

                if(isset($table)) {
                    return [
                        "status" => true,
                        "message" => "Login Successfully!!!",
                        "person" => $table
                    ];
                } else {
                    return [
                        "status" => false,
                        "message" => "Invalid Email Or Password",
                        "person" => null
                    ];
                }
            }
      
    }

    public function register(Request $request)
    {

        if (
            !isset($request->username) ||
            !isset($request->password) ||
            !isset($request->email) ||
            !isset($request->mobileno)
        ) {

            return
                [
                    "status" => false,
                    "message" => "Not Sufficient Parameter",
                    "person" => null
                ];
        } else {

            $table = new Person();
            $table->username = $request->username;
            $table->email = $request->email;
            $table->mobileno = $request->mobileno;
            $table->password = $request->password;
            $table->status=true;
            $table->save();

            return
                [
                    "status" => true,
                    "message" => "Registered Successfully!!!",
                    "person" => $table
                ];
        }
    }

    public function getData()
    {

        $banner_data = Banner::where('status', 1)->get();
        $category_data = Category::get();
        $coupon_data = Coupon::where('status', true)->get();
        $product_data = Furniture::get();
        $store_data=Store::get();
        return
            [
                "status" => true,
                "message" => "getting data",
                "category_data" => $category_data,
                "coupon_data" => $coupon_data,
                "product_data" => $product_data,
                "banner_data" => $banner_data,
                "store_data"=>$store_data

            ];
    }

    public function getAddress(Request $request){
        if(isset($request->uid)){
            $data=Address::where('uid',$request->uid)->get();
            if(isset($data)){
                return ['status'=>true,'msg'=>'getting...','address'=>$data];
            }
            else{
                return ['status'=>false,'msg'=>'getting...','address'=>null];
             }
        }
    }
    public function addAddress(Request $request){
        if(isset($request->uid)
        && isset($request->address)
        &&isset($request->pincode)){
            $table=new Address();
            $table->uid=$request->uid;
            $table->address=$request->address;
            $table->pincode=$request->pincode;
            $table->save();

            return [
                'status' => true,
                'message' => 'Success',
                'address' => array($table)
            ];
        }  return [
            'status' => false,
            'message' => 'Insufficient parameters',
            'address' => null
        ];
    }

    public function getCuponFromCode(Request $request){
        if(isset($request->code)){
            $table = Coupon::where('c_code',$request->code)->first();
            if(isset($table)){
                return[
                    'status'=>true,
                    'message'=>'Coupon Applyed',
                    'coupon_data'=>$table
                ];
            }else{
                return[
                    'status'=>false,
                    'message'=>'Invalid Coupon Code',
                    'coupon_data'=>null
                ];
            }
        } else {
            return[
            'status'=>false,
            'message'=>'Insufficient parameters',
            'coupon_data'=>null
            ];
        }
    }
    public function addorder(Request $request) {
        $uid=$request->uid;
        $pid=$request->pid;
        $data=Order::where('uid',$uid)
        ->where('pid',$pid)
        ->where('status',0)->first();
        if($data==null){
            $table=new Order();
            $product=Product::find($pid);
            //select * from tvl_product where id=pid
            $table->pid=$pid;
            $table->uid=$uid;
            $table->pname = $product->productname;
            $table->pic1=$product->pic1;
            $table->qty=1;
            $table->amount=(int)$product->price;
            $table->tot_amount=(int)$product->price;
            $table->c_discount=0;
            $table->date="date";
            $table->time="time";
            $table->status=0;
            $table->c_o="cash";

            $table->c_code="c-code";
            $table->address="address";
            $table->save();


            $data=Order::where('uid',$uid)
           
            ->where('status',0)->get();
            return [
                "status"=>true,
                "message"=>"Added to cart",
                "order"=>$data
            ];

        }
        else{
            $data->qty=$request->qty;
            $data->tot_amount=(int)$request->qty * (int) $request->amount;
            $data->save();
            $data=Order::where('uid',$uid)
            
            ->where('status',0)->get();

            return [
                "status"=>true,
                "message"=>"Added to cart",
                "order"=>$data
            ];

            
        }
        
    }

    public function getOrder(Request $request) {

        $data=Order::where('uid',$request->uid)
        ->where('status',(int)$request->status)->get();
        return [
            "status"=>true,
            "message"=>"getting cart",
            "order"=>$data
        ];
    }

    public function updateQty(Request $request){

        $id=$request->id;
        $uid=$request->uid;
        $data=Order::find($id);

        $data->qty=(int)$request->qty;
        $data->tot_amount=(int)$request->qty * (int) $data->amount;
        $data->save();


        $data=Order::where('uid',$uid)
            ->where('status',0)->get();
        return [
            "status"=>true,
            "message"=>"update",
            "order"=>$data
        ];
    } 

    public function removeOrder(Request $request)  {
        $uid=$request->uid;
        Order::find($request->id)->delete();

         $data=Order::where('uid',$uid)
        ->where('status',0)->get();
        return [
            "status"=>true,
            "message"=>"remove from cart",
            "order"=>$data
        ];
    }

    public function confirmOrder(Request $request)  {
        $uid=$request->uid;
        $time = Carbon::now()->format('H:i');
        $date = Carbon::now()->format('d/m/Y'); 

         $data=Order::where('uid',$uid)
        ->where('status',0)->get();
        foreach($data as $item){
            $item->status=1;
            $item->address=$request->address;
            $item->c_code=$request->c_code;
            $item->c_o=$request->c_o;
            $item->time=$time;
            $item->date=$date;
            $item->c_discount=$request->c_discount;
            $item->save();
        } 
        $data=Order::where('uid',$uid)
        ->where('status',0)->get(); 
        return [
            "status"=>true,
            "message"=>"Order placed successfully",
            "order"=>$data
        ];
    }
    public function getOrderhistory(Request $request) {

        $data=Order::where('uid',$request->uid)
        ->where('status','>',(int)$request->status)->get();
        return [
            "status"=>true,
            "message"=>"getting cart",
            "order"=>$data
        ];
    }

    

       
        
 
}