<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Order;
use App\User;
use App\Mail\Sendmail;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use DB;


class CartController extends Controller
{
    public function addToCart(Product $product,Request $request){
    	//return $product;

        if(session()->has('cart')){
    		$cart = new Cart(session()->get('cart'));
    	}else{
    		$cart = new Cart();
    	}
    	$cart->add($product);


    	session()->put('cart',$cart);
        return redirect()->back();

    }

    public function showCart(){
    	if(session()->has('cart')){
    		$cart = new Cart(session()->get('cart'));
    	}else{
    		$cart = null;
    	}
    	return view('cart',compact('cart'));
    }

    public function updateCart(Request $request, Product $product){
    	$request->validate([
    		'qty'=>'required|numeric|min:1'
    	]);

    	$cart  = new Cart(session()->get('cart'));
    	$cart->updateQty($product->id,$request->qty);
    	session()->put('cart',$cart);
    	
        return redirect()->back();

    }

    public function removeCart(Product $product){
    	$cart = new Cart(session()->get('cart'));
    	$cart->remove($product->id);
    	if($cart->totalQty<=0){
    		session()->forget('cart');
    	}else{
    		session()->put('cart',$cart);
    		

    	}
    	
            return redirect()->back();
    }

    public function checkout($amount){
        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }else{
            $cart = null;
        }  
        return view('checkout',compact('amount','cart'));
    }

    public function charge(Request $request){
        $charge = Stripe::charges()->create([
            'currency'=>"THB",
            'source'=>$request->stripeToken,
            'amount'=>$request->amount,
            'description'=>'pay status'
        ]);

        $chargeId = $charge['id'];
        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }else{
            $cart = null;
        } 
        \Mail::to(auth()->user()->email)->send(new Sendmail($cart));

      

        if($chargeId){
            auth()->user()->orders()->create([

                'cart'=>serialize(session()->get('cart')),
               
            ]);

            session()->forget('cart');
            
            return redirect()->to('/');

        }else{
            return redirect()->back();
        }

    }
    //for loggedin user
    public function order(){
        $orders = auth()->user()->orders;
        $carts =$orders->transform(function($cart,$key){
            return unserialize($cart->cart);

        });
        // dd($day);
        return view('order',compact('carts'));

   }

    //for admin
    public function userOrder(){
        
        $orders = Order::latest()->paginate(8);
        return view('admin.order.index',compact('orders'));
    }
    public function viewUserOrder($userid,$orderid){
        $user = User::find($userid);
        $orders = $user->orders->where('id',$orderid);
        $carts =$orders->transform(function($cart,$key){
            return unserialize($cart->cart);

        });
        return view('admin.order.show',compact('carts'));
    }
    //status payment
    public function editStatus($id){
        
        $orders = Order::find($id);
        return view('admin.order.status',compact('orders'));
    }

    public function updateStatus(Request $request, $id){
        $orders = Order::find($id);
        $orders->payment=$request->input('payment');
        $orders->save();
        return redirect('auth/orders');
      
    }
    


}
