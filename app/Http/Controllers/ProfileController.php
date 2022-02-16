<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->where(['parent_id' => null])->get();
        $carts = Cart::where(['user_id'=>Auth::user()->id])->get();

        if ($request->ajax()) {
            //return view('layouts.breakpoints_xxl.profile_body_xxl', compact('products', 'categories','carts'));
            return view('catalog.profile', compact('products', 'categories','carts'));
        }else{
            return view('catalog.profile', compact('products', 'categories','carts'));
        };
    }

    public function changePassword(Request $request){
        $user = Auth::user();
        $pass = $request['pass'];
        $repass = $request['repass'];
        if ($repass==$pass){
            $user->pass = $pass;
            $user->password = Hash::make($pass);
            $user->save();
            Session::flash('success','You years old');
            return redirect()->back();
        }else{
            return 501;
        }
        //return $request->ajax();
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
