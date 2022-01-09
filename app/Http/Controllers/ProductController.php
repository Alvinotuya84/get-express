<?php

namespace App\Http\Controllers;

use Session; 
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    //
    public function index(){

        $products=Product::all();
        return View('home',['products'=>$products

        ]); 
    }
    public function productDetails(Request $request,$id){
      $product=  DB::table('products')->where('id',$id)->get();
      
      return view('productDetails',[
          'product'=>$product,

      ]);

    }
    public function addToCart(Request $request){
        if($request->session()->has('user')){

            $cart=new Cart;
            $cart->user_id=$request->session()->get('user')['id'];
            $cart->product_id=$request->product_id;
            $cart->save();




        }
        else{
            return redirect('/login');
        }
    }
    public function cartItem(){
        $userId=Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }
    public function cartList(Request $request){
        $userId=Session::get('user')['id'];
        $totalPrice=DB::table('cart')->join('products','cart.product_id','=','products.id')->where('cart.user_id',$userId)->sum('products.price');
        $cartProducts=DB::table('cart')->join('products','cart.product_id','=','products.id')->where('cart.user_id',$userId)->select('products.*','cart.id as cart_id')->get();
        $countItems=DB::table('cart')->join('products','cart.product_id','=','products.id')->where('cart.user_id',$userId)->select('products.*')->get()->count();


        //checkoutForm
        $allCart=Cart::where('user_id',$userId)->get();
        foreach($allCart as $cart){
            $order=new Order;
            $order->product_id=$cart->product_id;
            $order->user_id=$cart->user_id;
            $order->payment_status='pending';
            $order->payment_method=$request->payment_method;
            $order->save();
            Cart::where('user_id',$userId)->delete();
        }

        return view('cartList',['cartProducts'=>$cartProducts,
    'countItems'=>$countItems,
    'totalPrice'=>$totalPrice,
    ]);
    }
    public function removeItemFromCart(Request $request,$id){
        DB::table('cart')->where('id',$id)->delete();
        return redirect('/cart-list');


    }
    public  function checkOut(){
        $userId=Session::get('user')['id'];
        return $total=DB::table('cart')->join('products','cart.product_id','=','products.id')->where('cart.user_id',$userId)->sum('products.price');
        

    }
    public function myOrders(){
        $userId=Session::get('user')['id'];
        $orders=DB::table('products')->join('orders','products.id','=','orders.product_id')->where('user_id',$userId)->select('products.*','orders.payment_status as payment_status')->get();
        return view('myOrders',[
            'myOrders'=>$orders,
        ]);
    }
}
