<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use NumberFormatter;

class CartController extends Controller
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
            return view('layouts.breakpoints_xxl.cart_body_xxl', compact('products', 'categories','carts'));

        }else{
            return view('catalog.cart', compact('products', 'categories','carts'));
        };


    }

    public function add(Request $request)
    {
        $product_id = $request->product_id;
        if ( $product_id<> null) {
            $cart = Cart::firstOrNew(
                ['product_id' => $product_id],
                ['user_id' => Auth::user()->id]
            );
            $cart->qty = $cart->qty+$request->qty;
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }elseif($request->qty=='delete'){
            $row = Cart::find($request->row_id);
            $row->delete();
        }
        return $this::getCartCount();
    }

    public function set(Request $request)
    {
        //dd($request->row_id);
        $row_id = $request->row_id;
        if ( $row_id<> null) {
            $cart = Cart::firstOrNew(
                ['id' => $row_id],
            );
            $cart->qty = $request->qty;
            $cart->user_id = Auth::user()->id;
            $cart->save();
        };
        return $this::getCartCount();
    }

    public static function getCartCount(){
        $carts = Cart::where(
            'user_id',Auth::user()->id
        )->get();
        $res = 0;
        foreach ($carts as $item) {
            $res+=$item->qty;
        }
        return $res;
    }

    public static function getSumUah(){
        $carts = Cart::where(
            'user_id',Auth::user()->id
        )->get();
        $res = 0;
        foreach ($carts as $item) {
            if ($item->product->personalPriceCurrency=='грн') {
                $res+=($item->product->personal_price*$item->qty);
            }

        }
        $fmt = new NumberFormatter( 'en-CA', NumberFormatter::PATTERN_DECIMAL, "* #####.00 ;(* #####.00)");
        $res = $fmt->format($res);
        return $res;
    }

    public static function getSumUsd(){
        $carts = Cart::where(
            'user_id',Auth::user()->id
        )->get();
        $res = 0;
        foreach ($carts as $item) {
            if ($item->product->personalPriceCurrency=='USD') {
                $res+=($item->product->personal_price*$item->qty);
            }

        }
        $fmt = new NumberFormatter( 'en-CA', NumberFormatter::PATTERN_DECIMAL, "* #####.00 ;(* #####.00)");
        $res = $fmt->format($res);
        return $res;
    }

    public static function getSumEur(){
        $carts = Cart::where(
            'user_id',Auth::user()->id
        )->get();
        $res = 0;
        foreach ($carts as $item) {
            if ($item->product->personalPriceCurrency=='EUR') {
                $res+=($item->product->personal_price*$item->qty);
            }

        }
        $fmt = new NumberFormatter( 'en-CA', NumberFormatter::PATTERN_DECIMAL, "* #####.00 ;(* #####.00)");
        $res = $fmt->format($res);
        return $res;
    }
}
