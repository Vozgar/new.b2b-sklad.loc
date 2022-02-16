<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Mail as Mail;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private static function main_categories()
    {
        return Category::orderBy('sort', 'asc')->where(['parent_id' => 0])->get();
    }
    public function products(Request $request, $id)
    {


        $ids = $request->get('ids');
        if ($ids != null) {
            $ids = explode(",", $ids);
            //dd($ids);
            $products = Product::orderBy('id', 'desc')->where(['category_id' => $id])->whereIn('id', $ids)->paginate(10);
            $all_products = Product::orderBy('id', 'desc')->where(['category_id' => $id])->get()->toJson();
            $filtered_products = Product::orderBy('id', 'desc')->where(['category_id' => $id])->whereIn('id', $ids)->get()->toJson();
        } else {
            $products = Product::orderBy('id', 'desc')->where(['category_id' => $id])->paginate(10);
            $all_products = Product::orderBy('id', 'desc')->where(['category_id' => $id])->get()->toJson();
            $filtered_products = Product::orderBy('id', 'desc')->where(['category_id' => $id])->get()->toJson();
        }

        $categories = $this->main_categories();

        if ($request->ajax()) {
            return view('catalog.products_body', compact('products', 'categories', 'all_products', 'filtered_products'));
        }

        return view('catalog.products', compact('products', 'categories', 'all_products', 'filtered_products'));
    }

    public function product(Request $request, $id)
    {
        $products = Product::orderBy('id', 'desc')->get();
        $categories = $this->main_categories();
        $product = Product::where(['id' => $id])->first();
        return view('catalog.product', compact('products', 'categories', 'product'));
    }

    public function list(Request $request)
    {
        if ($request->q != '') {

            $products = Product::where('name', 'like', '%' . $request->q . '%')->orWhere('code', 'like', '%' . $request->q . '%')
                ->orWhere('name_ru', 'like', '%' . $request->q . '%')->take(100)->get();
            $res = '{
            "items": [';
            $first = true;
            foreach ($products as $item) {
                if (!$first) {
                    $res .= ',';
                }

                $name = str_replace('"', "", $item->name);
                //$name = str_replace("\u0027", "\\'",  $name );
                $first = false;
                $res .= '{
                "id": "' . $item->id . '",
                "text": "' . $name . '",
                "price": "' . $item->personal_price . '",
                "currency": "' . $item->personal_price_currency . '",
                "qty": "' . 22 . '"
              }';
            }
            $res .= '],"pagination": {
            "more": false
          }
        }';
            return $res;
        } else {
            return '';
        }
    }


    public function delivery()
    {
        $products = Product::orderBy('id', 'desc')->get();
        $categories = $this->main_categories();
        return view('catalog.delivery', compact('products', 'categories'));
    }

    public function drafts()
    {
        $products = Product::orderBy('id', 'desc')->get();
        $categories = $this->main_categories();
        return view('catalog.drafts', compact('products', 'categories'));
    }



    public function OrderLists()
    {
        // $detalis = [
        //     'title' => 'Register',
        //     'body' => 'Your password 222',
        // ];
        // $mail = Mail::to('lysak.olexandr@gmail.com');
        // $mail_body = new RegisterMail($detalis);
        // $res = $mail->send($mail_body);

        //dd($mail);
        //die();


        $products = Product::orderBy('id', 'desc')->get();
        $categories = $this->main_categories();
        return view('catalog.order_lists', compact('products', 'categories'));
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}