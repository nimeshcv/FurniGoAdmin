<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Furniture;
use App\Models\Cart;
use App\Models\Person;
use App\Services\RazorpayService;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isEmpty;

class CartController extends Controller
{
    public function insertcart($id)
    {
        $uid = Session::get('id');
        if ($uid != null) {
          
            $data = Cart::where('pid', $id)->where('uid', $uid)->first();
            
            if (isEmpty($data)) {
                $product = Furniture::where('id', $id)->first();
                $table = new Cart;
                $table->pid = $id;
                $table->price = $product->price;
                $table->orderid = "#o_";


                $table->quantity = 1;
                $table->totalamt = $table->price * $table->quantity;
                $table->uid = $uid;
                $table->img=$product->img;
                $table->save();



            } else {
                $data->quantity = $data->quantity + 1;
                $data->orderid = "#o_";
                
                $data->totalamt = $data->price * $data->quantity;
                $data->save();
                
            }
            $cart_count=Cart::where('uid',$uid)
            ->where('status','0')->count();
            session()->put('ccount',$cart_count);
            return redirect('viewcart')->with('success', 'Added to cart!!!');


        } else {
            return redirect('login');
        }
    }

    public function index()
    {
        $uid = Session::get('id');
        $product = Furniture::get();

        $carts = Cart::where('status', '0')
            ->where('uid', $uid)->get();

        $user = Person::where('id', $uid)->get();
        return view('viewcart', compact('product', 'carts', 'user'));
    }

    public function destroy($id)
    {
       
        $cart = Cart::where('id', $id)->first();
        $cart->delete();
        $cart_count=Cart::where('uid',session()->get('id'))
        ->where('status','0')->count();
        session()->put('ccount',$cart_count);

        return redirect('viewcart');
    }

    public function cartdone(Request $request)
    {
        $uid = Session::get('id');
        $orderid="#O_".time();

        Cart::where('status', '0')
            ->where('uid', $uid)->update(['paymenttype'=>"$request->payment",'status' => 1,"orderid"=>"$orderid"]);
            $cart_count=Cart::where('uid',session()->get('id'))
            ->where('status','0')->count();
            session()->put('ccount',$cart_count);
        return back()->with('success', 'Order Placed Successfully!!!!');
    }

    public function showPaymentForm()
    {
        return view('payment_form');
    }

    protected $razorpay;

    public function __construct(RazorpayService $razorpay)
    {
        $this->razorpay = $razorpay;
    }

    public function minus($id){

        $data= Cart::where('id',$id)->first();
        $data->quantity= $data->quantity - 1;
        $data->totalamt = $data->price * $data->quantity;
        $data->save();
        return redirect('viewcart')->with('success', 'Updated to cart!!!');
    }
    public function plus($id){
        $data = Cart::where('id',$id)->first();
        $data->quantity = $data->quantity + 1;
        $data->totalamt = $data->price * $data->quantity;
        $data->save();
        return redirect('viewcart')->with('success', 'Updated to cart!!!');
    }

}
