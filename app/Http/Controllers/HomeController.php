<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::id()){

            return redirect('redirect');

        }else{
            $product=Product::paginate(3);
            return view('user.home',compact('product'));
        }
    }

    public function redirect()
    {
        $usertype=Auth::user()->usertype;
        if($usertype=='1')
        {
            return view('admin.home');
        }else{

             $product=Product::paginate(3);
             $user=Auth::user();
             $count=Cart::where('phone',$user->phone )->count();
            return view('user.home',compact('product','count'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //
    }

    public function confirmorder(Request $request){

        $user=Auth::user();
        $name=$user->name;
        $phone=$user->phone;
        $address=$user->address;

        foreach($request->product_name as $key=>$product_name)
        {
            $order=new Order();
            $order->product_name=$request->product_name[$key];
            $order->quantity=$request->quantity[$key];
            $order->price=$request->price[$key];
            $order->name=$name;
            $order->phone=$phone;
            $order->address=$address;
            $order->status="not confirmed";
            $order->save();
           DB::table('carts')->where('phone',$phone)->delete();


        }
        return redirect()->back()->with('message','order added sucessfully');



    }

    public function search(Request $request)
    {
        $search=$request->search;
        if($search==''){
            $product=Product::paginate(3);
            return view('user.home',compact('product'));

        }else
        $product=Product::where('title','Like','%'.$search.'%')->get();
        return view('user.home',compact('product'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addcart(Request $request,$id)
    {
        if(Auth::user()){
            $user=Auth::user();
            $product=Product::find($id);
            $cart=new Cart();
            $cart->name=$user->name;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->product_title=$product->title;
            $cart->quantity=$request->quantity;
            $cart->price=$product->price;
            $cart->save();
            return redirect()->back()->with('message','product added sucessfully');



        }else{
            return redirect('login');
        }

    }

    public function showcart()
    {
        $user=Auth::user();
        $cart=Cart::where('phone',$user->phone)->get();
        $count=Cart::where('phone',$user->phone )->count();
        return view('user.showcart',compact('count','cart'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id)
    {
        $cart=Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('message','product deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
