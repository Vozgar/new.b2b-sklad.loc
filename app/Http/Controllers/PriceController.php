<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Price;
use App\Models\PriceCategories;
use App\Models\Product;
use DateTime;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\String_;
use Spatie\ArrayToXml\ArrayToXml;

class PriceController extends Controller
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
        $prices = Price::where(['user_id' => Auth::user()->id])->get();
        if ($prices->count() == 0) {
            $price = new Price();
            $price->user_id = Auth::user()->id;
            $price->name = 'My price';
            $price->save();
            $prices = Price::where(['user_id' => Auth::user()->id])->get();
        }

        if ($request->ajax()) {
            return view('layouts.breakpoints_xxl.price_edit_settings_xxl', compact('products', 'categories', 'prices'));
        }
        return view('catalog.price', compact('products', 'categories', 'prices'));
    }

    public function checkCategory(Request $request)
    {
        //dd($request);
        $record = PriceCategories::where(['price_id' => $request->get('price_id'), 'category_id' => $request->get('category_id')])->firstOrCreate();
        $record->price_id = $request->get('price_id');
        $record->category_id = $request->get('category_id');
        $record->check = $request->get('check');
        $record->save();

        return true;
    }

    public function arrayOfCategories($price_id)
    {
        $neededCategories = [];
        $rootCategories = Category::where(['parent_id' => null])->get();
        foreach ($rootCategories as $key => $value) {
            $need = PriceCategories::where(['price_id' => $price_id, 'category_id' => $value['id']])->first();
            if ($need != null) {

                if ($need['check'] == 1) {
                    $neededCategories[] =
                        [
                            '_attributes' => [
                                'id' => $value['id'],
                                'parentId' => '',
                                'portalId' => $value['id']
                            ],
                            '_value' => $value['name'],
                        ];
                    $childCategories = Category::where(['parent_id' => $value['id']])->get();
                    foreach ($childCategories as $child_value) {
                        $need = PriceCategories::where(['price_id' => $price_id, 'category_id' => $child_value['id']])->first();
                        if ($need != null) {

                            if ($need['check'] == 1) {
                                $neededCategories[] =
                                    [
                                        '_attributes' => [
                                            'id' => $child_value['id'],
                                            'parentId' => $child_value['parent_id'],
                                            'portalId' => $child_value['id']
                                        ],
                                        '_value' => $child_value['name'],
                                    ];
                            }
                        }
                    }
                }
            }
        }

        return $neededCategories;
    }

    public function arrayPictures($product)
    {
        $picture = [];
        //$picture[] = 'https://bportal.ml'.$product['mainPicture'];
        foreach ($product['pictures'] as $value) {
            $picture[] = 'https://new.b2b-sklad.com/'.str_replace('public','storage',$value);
        }
        return $picture;
    }

    public function arrayOffers($price_id)
    {
        $offers = [];
        $Categories = Category::whereNotNull('parent_id')->get();
        foreach ($Categories as $key => $value) {
            $need = PriceCategories::where(['price_id' => $price_id, 'category_id' => $value['id']])->first();
            if ($need != null) {
                if ($need['check'] == 1) {
                    $products = Product::where(['category_id'=>$value['id']])->get();
                    foreach ($products as $product) {
                        $offers[]=[
                            '_attributes' => [
                                'id' => $product['id'],
                                'available' => 'true',
                            ],
                            'currencyId' => 'UAH',
                            'categoryId' => $product['category_id'],
                            'price' => $product['retailPriceUah'],
                            'vendorCode' => $product['code'],
                            'vendor' => $product['brand'],
                            'name' => $product['name'],
                            'description' => $product['description'],
                            'picture' => $this->arrayPictures($product),
                        ];
                    }
                }
            }
        }
        return $offers;
    }

    public function download(Request $request, $id = null)
    {
        $price = Price::where(['id' => $id])->first();

        $array = [
            'shop' => [
                'currencies' => [
                    'currency' =>
                    [
                        '_attributes' => [
                            'id' => 'UAH',
                            'rate' => '1',
                        ]
                    ],
                ],
                'categories' => [
                    'category' => $this->arrayOfCategories($id),
                ],
                'offers' => [
                    'offer' => $this->arrayOffers($id),
                ]
            ]
        ];


        $root = [
            'rootElementName' => 'yml_catalog',
            '_attributes' => [
                'data' => date("Y-m-d"),
            ],
        ];
        $arrayToXml = new ArrayToXml($array, $root, true, 'UTF-8', '1.1', [], true);
        $arrayToXml->setDomProperties(['formatOutput' => true]);
        $xml = $arrayToXml->toXml();
        return response($xml, 200)->header('Content-Type', 'application/xml');
    }

    public function treeCategory(Request $request)
    {
        $categories = Category::orderBy('id', 'desc')->where(['parent_id' => null])->get();
        $cats = array();
        $i = 0;
        foreach ($categories as $cat) {

            $check_category = PriceCategories::where(['category_id' => $cat->id, 'price_id' => $request->get('price_id')])->first();
            if ($check_category != null) {
                $check = $check_category['check'];
            } else {
                $check = 0;
            }
            $cat_detail['text'] = $cat['name'];
            $cat_detail['id'] = trim($cat['id']);
            $state = [];
            $state['checked'] = $check;
            $cat_detail['state'] = $state;
            $cats[$i] = $cat_detail;
            $i++;
        }

        $tree = $this->build_tree($cats, $request->get('price_id'));


        return $tree;
    }

    public function build_tree(&$cats, $price_id)
    {


        foreach ($cats as &$cat) {

            $categories = Category::orderBy('id', 'desc')->where(['parent_id' => $cat['id']])->get();
            $i = 0;
            $dats = array();
            foreach ($categories as $dat) {
                $check_category = PriceCategories::where(['category_id' => $dat->id, 'price_id' => $price_id])->first();
                if ($check_category != null) {
                    $check = $check_category['check'];
                } else {
                    $check = 0;
                }
                $cat_detail['text'] = $dat['name'];
                $cat_detail['id'] = trim($dat['id']);
                $state = [];
                $state['checked'] = $check;
                $cat_detail['state'] = $state;
                $dats[$i] = $cat_detail;
                $i++;
            }

            $this->build_tree($dats, $price_id);
            if (count($dats) > 0) {
                $cat['nodes'] = $dats;
            }
        }

        return $cats;
    }
}
