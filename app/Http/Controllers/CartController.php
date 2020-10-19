<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Order;
use App\User;
use App\Mail\Sendmail;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use App\Company;



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
        notify()->success('เพิ่มสินค้า เรียบร้อยแล้ว!');
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

    public function checkout($amount,Request $request){
      
           
        
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
            'description'=>'pay status',
           
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
                'phone'=>$request->phone  , 
                'name'=>$request->name   ,
                'address'=>$request->address,
                'postalcode'=>$request->postalcode
            ]);
           

            session()->forget('cart');
            
            return redirect()->to('/shop');

        }else{
            return redirect()->back();
        }

    }
    //for loggedin user
    public function order(){
        $orders = auth()->user()->orders;
        
        return view('order',compact('orders'));

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
    public function editStatus($id,$orderid){
        $company = Company::get();
        $orders = Order::find($orderid);
        return view('admin.order.status',compact('orders','company'));
    }

    public function updateStatus(Request $request, $id,$orderid){
        $orders = Order::find($orderid);
        $orders->payment=$request->input('payment');
        $orders->tracking=$request->input('tracking');
        $orders->company=$request->input('company');
        $orders->tracking_number=$request->input('tracking_number');
        $orders->save();
        return redirect('auth/orders');
      
    }
    public function search(Request $request){
        $search= $request->get('search');
      
       
        $orders = Order::with('user')->where('user_id',$search)->orWhere('name',$search)->get();

        return view('admin.order.index',['orders'=>$orders]);
       
    }
    public function orderuser($userid,$orderid){
        $user = User::find($userid);
        $orders = $user->orders->where('id',$orderid);
        $carts =$orders->transform(function($cart,$key){
            return unserialize($cart->cart);

        });
        return view('orderuser',compact('carts'));
       
    }

    public function tracking($userid,$orderid){
        $inform = Order::find($orderid)->where('id',$orderid)->get();
        $user = User::find($userid);
        $orders = $user->orders->where('id',$orderid);
        $carts =$orders->transform(function($cart,$key){
            return unserialize($cart->cart);

        });
        return view('trackinguser',compact('carts','inform'));
       
    }
}
