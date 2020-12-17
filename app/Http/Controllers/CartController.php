<?php

namespace App\Http\Controllers;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Order;
use App\User;
use App\Mail\Sendmail;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use App\Company;
use App\Address;



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
        
        $address = auth()->user()->addressed;  
        
        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
         
        }else{
            $cart = null;
        }  
        
        return view('checkout',compact('amount','cart','address'));
    }

    public function checklater($amount,Request $request){
        
        $address = auth()->user()->addressed;  
        
        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
            
         
        }else{
            $cart = null;
        }  
        
        
        return view('checkoutlater',compact('amount','cart','address'));
    }
    public function chargelater(Request $request){
        
        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
            
        }else{
            $cart = null;
        } 
    
            auth()->user()->orders()->create([
                'cart'=>serialize(session()->get('cart')),
                'name'=>$request->name   ,
                'address'=>$request->address,
                'payment'=>$request->payment
               
               
            ]);
            session()->forget('cart');
                
            return redirect()->to('/thankyou');    
       
         
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
        if($chargeId){

            auth()->user()->orders()->create([
                'cart'=>serialize(session()->get('cart')),
              
                'name'=>$request->name   ,
                'address'=>$request->address,
               
            ]);
            session()->forget('cart');
 
            return redirect()->to('/thankyou');    
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
    public function viewUserOrder($userid,$orderid,$address){
        $user = User::find($userid);
   
        $zz=User::find($userid)->addressed->where('id',$address);
        $up=$zz;
        // $up=$address->address;
        
        
        $orders = $user->orders->where('id',$orderid);
        $carts =$orders->transform(function($cart,$key){
            return unserialize($cart->cart);

        });
     
        return view('admin.order.show',compact('carts','up'));
    }
    //status payment
    public function editStatus($id,$orderid){
        $company = Company::get();
        $orders = Order::find($orderid);
        return view('admin.order.status',compact('orders','company'));
    }
    
    public function updateStatus(Request $request, $id,$orderid){
        $orders = Order::find($orderid);
        $orders->tracking=$request->input('tracking');
        $orders->company=$request->input('company');
        $orders->tracking_number=$request->input('tracking_number');
        $orders->save();
        $order=User::find($id)->where('id',$id)->select('userId')->get();
        $up=json_encode($order);
        $cut=mb_substr($up,12,-3);

        if($orders->tracking=='แพ็คสินค้าเรียบร้อย'){
            $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('+sCKQKTaNez/c8BzdGJRxk8NAeqNjRAmBvGdmqlqPPRxhyA9xZHh5av2RhW9VCEdl2KPfislOKZuuTw6fuOuGDs6JklgztzFNy/NWpmG5jX47Wo1exyp70BioFL9mxsEkhWwSGKEit4hxhDdT8dYNgdB04t89/1O/w1cDnyilFU=+sCKQKTaNez/c8BzdGJRxk8NAeqNjRAmBvGdmqlqPPRxhyA9xZHh5av2RhW9VCEdl2KPfislOKZuuTw6fuOuGDs6JklgztzFNy/NWpmG5jX47Wo1exyp70BioFL9mxsEkhWwSGKEit4hxhDdT8dYNgdB04t89/1O/w1cDnyilFU=');
            $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'f1dbce386793edb47c112e096efefa29']);
            $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('คำสั่งชื้อเลขที่ :'.$orderid."\n".'สินค้าของท่านแพ็คสินค้าเรียบร้อย');//text
            
            $response = $bot->pushMessage($cut, $textMessageBuilder); 
        }elseif ($orders->tracking=='กำลังจัดส่ง') {
            $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('+sCKQKTaNez/c8BzdGJRxk8NAeqNjRAmBvGdmqlqPPRxhyA9xZHh5av2RhW9VCEdl2KPfislOKZuuTw6fuOuGDs6JklgztzFNy/NWpmG5jX47Wo1exyp70BioFL9mxsEkhWwSGKEit4hxhDdT8dYNgdB04t89/1O/w1cDnyilFU=+sCKQKTaNez/c8BzdGJRxk8NAeqNjRAmBvGdmqlqPPRxhyA9xZHh5av2RhW9VCEdl2KPfislOKZuuTw6fuOuGDs6JklgztzFNy/NWpmG5jX47Wo1exyp70BioFL9mxsEkhWwSGKEit4hxhDdT8dYNgdB04t89/1O/w1cDnyilFU=');
            $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'f1dbce386793edb47c112e096efefa29']);
            $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('คำสั่งชื้อเลขที่ :'.$orderid."\n".'สินค้าของท่านกำลังจัดส่ง'."\n".'จัดส่งโดย : '.$orders->company."\n".'เลขสินค้าของท่านเราจะส่งถัดจากข้อความนี้ ');//text
            $text= new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($orders->tracking_number);
            $up = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('หากท่านได้รับสินค้าเรียบร้อยแล้วกรุณายืนยันในorderของท่านด้วย');
            
            $response = $bot->pushMessage($cut, $textMessageBuilder); 
            $response = $bot->pushMessage($cut, $text); 
            $response = $bot->pushMessage($cut, $up);
        }else{
            $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('+sCKQKTaNez/c8BzdGJRxk8NAeqNjRAmBvGdmqlqPPRxhyA9xZHh5av2RhW9VCEdl2KPfislOKZuuTw6fuOuGDs6JklgztzFNy/NWpmG5jX47Wo1exyp70BioFL9mxsEkhWwSGKEit4hxhDdT8dYNgdB04t89/1O/w1cDnyilFU=+sCKQKTaNez/c8BzdGJRxk8NAeqNjRAmBvGdmqlqPPRxhyA9xZHh5av2RhW9VCEdl2KPfislOKZuuTw6fuOuGDs6JklgztzFNy/NWpmG5jX47Wo1exyp70BioFL9mxsEkhWwSGKEit4hxhDdT8dYNgdB04t89/1O/w1cDnyilFU=');
            $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'f1dbce386793edb47c112e096efefa29']);
            
        }
        return redirect('auth/orders');
      
 
    }

    public function editPayment($id,$orderid){
        $company = Company::get();
        $orders = Order::find($orderid);
        return view('admin.order.payment',compact('orders'));
    }

    public function updatePayment(Request $request, $id,$orderid){
        $orders = Order::find($orderid);
        $orders->payment=$request->input('payment');
        $orders->save();

        $order=User::find($id)->where('id',$id)->select('userId')->get();
        $up=json_encode($order);
        $cut=mb_substr($up,12,-3);

        $user = User::find($id);
        $upcart = $user->orders->where('id',$orderid);
        $carts =$upcart->transform(function($cart,$key){
            return unserialize($cart->cart);
        });
        foreach ($carts as $p) { 
            // print_r('array1 : ');  
            // echo json_encode ($p);
             $up =$p->totalPrice; 
            //  $js=$p->items;     
            //  $product=json_encode($js);
                $count=$p->items;
                $list=count($count);
                // $list=count($p);

            
              
        }
        // echo($cut);
        if($orders->payment=='ยืนยันเรียบร้อยแล้ว'){
            $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('+sCKQKTaNez/c8BzdGJRxk8NAeqNjRAmBvGdmqlqPPRxhyA9xZHh5av2RhW9VCEdl2KPfislOKZuuTw6fuOuGDs6JklgztzFNy/NWpmG5jX47Wo1exyp70BioFL9mxsEkhWwSGKEit4hxhDdT8dYNgdB04t89/1O/w1cDnyilFU=+sCKQKTaNez/c8BzdGJRxk8NAeqNjRAmBvGdmqlqPPRxhyA9xZHh5av2RhW9VCEdl2KPfislOKZuuTw6fuOuGDs6JklgztzFNy/NWpmG5jX47Wo1exyp70BioFL9mxsEkhWwSGKEit4hxhDdT8dYNgdB04t89/1O/w1cDnyilFU=');
            $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'f1dbce386793edb47c112e096efefa29']);
            $text = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('คำสั่งชื้อเลขที่ :'.$orderid."\n".'ราคารวม  : '.$up.' บาท'."\n".'รายการสินค้า : '.$list.' รายการ'."\n".'การชำระเงินของท่านได้รับการยืนยันแล้ว'."\n".'ขอบคุณที่ใช้บริการครับ');
            $response = $bot->pushMessage($cut, $text); 
        }elseif($orders->payment=='ยืนยันคำสั่งซื้อแบบเก็บเงินปลายทาง'){
            $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('+sCKQKTaNez/c8BzdGJRxk8NAeqNjRAmBvGdmqlqPPRxhyA9xZHh5av2RhW9VCEdl2KPfislOKZuuTw6fuOuGDs6JklgztzFNy/NWpmG5jX47Wo1exyp70BioFL9mxsEkhWwSGKEit4hxhDdT8dYNgdB04t89/1O/w1cDnyilFU=+sCKQKTaNez/c8BzdGJRxk8NAeqNjRAmBvGdmqlqPPRxhyA9xZHh5av2RhW9VCEdl2KPfislOKZuuTw6fuOuGDs6JklgztzFNy/NWpmG5jX47Wo1exyp70BioFL9mxsEkhWwSGKEit4hxhDdT8dYNgdB04t89/1O/w1cDnyilFU=');
            $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'f1dbce386793edb47c112e096efefa29']);
            $text = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('คำสั่งชื้อเลขที่ :'.$orderid."\n".'ราคารวม  : '.$up.' บาท'."\n".'รายการสินค้า : '.$list.' รายการ'."\n".'เป็นการชำระเงินแบบเก็บปลายทาง'."\n".'ขอบคุณที่ใช้บริการครับ');
            $response = $bot->pushMessage($cut, $text); 
        }
        else{
            $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('+sCKQKTaNez/c8BzdGJRxk8NAeqNjRAmBvGdmqlqPPRxhyA9xZHh5av2RhW9VCEdl2KPfislOKZuuTw6fuOuGDs6JklgztzFNy/NWpmG5jX47Wo1exyp70BioFL9mxsEkhWwSGKEit4hxhDdT8dYNgdB04t89/1O/w1cDnyilFU=+sCKQKTaNez/c8BzdGJRxk8NAeqNjRAmBvGdmqlqPPRxhyA9xZHh5av2RhW9VCEdl2KPfislOKZuuTw6fuOuGDs6JklgztzFNy/NWpmG5jX47Wo1exyp70BioFL9mxsEkhWwSGKEit4hxhDdT8dYNgdB04t89/1O/w1cDnyilFU=');
            $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'f1dbce386793edb47c112e096efefa29']);
            
         }
         return redirect('auth/orders');
            // dd($list);
    }
    public function search(Request $request){
        $search= $request->get('search');
      
       
        $orders = Order::with('user')->where('user_id',$search)->orWhere('name',$search)->paginate(8);

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

    public function tracking($userid,$orderid,$address){
        $inform = Order::find($orderid)->where('id',$orderid)->get();
        $user = User::find($userid);
    
        $zz=User::find($userid)->addressed->where('id',$address);
        $up=$zz;

        $orders = $user->orders->where('id',$orderid);
        $carts =$orders->transform(function($cart,$key){
            return unserialize($cart->cart);

        });
     
        return view('trackinguser',compact('carts','inform','up'));
       
    }

    public function frontSearch(Request $request){
        $search= $request->get('search');
      
        $orders = Product::where('name',$search)->orWhere('name',$search)->get();

        return view('admin.order.index',['orders'=>$orders]);
    }
 
}
