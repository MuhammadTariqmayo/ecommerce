<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product()
    {
        if(Auth::user())
        {
          return view('admin.product');

        }else{
            return redirect('login');
        }
    }

    public function showorder()

    {
        $order=Order::all();
        return view('admin.showorder',compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $product=new Product;

        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage',$imagename);
        $product->image=$imagename;

       $product->title=$request->title;
       $product->price=$request->price;
       $product->description=$request->description;
       $product->quantity=$request->quantity;
       $product->save();
       return redirect()->back()->with('message','data inserted succeffuly');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatestatus($id)
    {
        $order=Order::find($id);

        $order->status='deliverd';
        $order->save();

        return redirect()->back()->with('message','status changed succeffuly');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $products=Product::all();
        return view('admin.showproduct',compact('products'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $product=Product::find($id);
        $image=$request->file;
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage',$imagename);
        $product->image=$imagename;
        }

       $product->title=$request->title;
       $product->price=$request->price;
       $product->description=$request->description;
       $product->quantity=$request->quantity;
       $product->save();
       return redirect()->back()->with('message','data update succeffuly');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $product=Product::find($id);
        return view('admin.updateproduct',compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Product::find($id);
        $data->delete();
        return redirect()->back()->with('message',' is delete');
    }
}
