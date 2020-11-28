<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $address = auth()->user()->addressed;
       
        return view('address.index',compact('address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'title'=>'required',
            'address'=>'required',
            'postcode'=>'required',
            'phone'=>'required',
            
        ]);
     
        $address = new Address();
        $address->title=$request->input('title');
        $address->user_id= auth()->user()->id;
        $address->address=$request->input('address');
        $address->postcode=$request->input('postcode');
        $address->phone=$request->input('phone');
        $address->save();
        return redirect()->route('address.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $address =  auth()->user()->address;
        $useraddress=Address::where('id',$id)->get();
        // dd($useraddress);
        return view('address.view',compact('useraddress'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address = Address::find($id);
        return view('address.edit',compact('address'));
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
        $address = Address::find($id);
        $address->address=$request->input('address');
        $address->postcode=$request->input('postcode');
        $address->phone=$request->input('phone');
        $address->save();
        return view('address.index',compact('address'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address =Address::find($id)->delete();
        return redirect()->route('address.index');
    }
}
