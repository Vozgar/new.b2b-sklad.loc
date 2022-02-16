<?php

namespace App\Models;

use App\Http\Controllers\CurrencyController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

//use File;

class Product extends MainModel
{
    use HasFactory;

    protected $visible = ['id', 'properties_filter'];

    public function Certificates()
    {
        return $this->hasMany(Certificate::class, 'product_id', 'id');
    }

    /**
     * @return string
     */
    public function getBrandNameAttribute(): string
    {
        $brand = Brand::where(['id' => $this->brand_id])->first();

        if ($brand != null) {
            return $brand->name;
        }
        return '';
    }

    public function getMainPictureAttribute()
    {
        $picture = Storage::url('public/img/products/' . $this->id . '/1.jpeg');
        return $picture;
    }

    public function getCertificatesFilesAttribute()
    {
        $files = [];
        foreach ($this->certificates as $item) {
            $files[] = Storage::url('public/img/certificates/' . $item->file_name . '');
            //$files[] = $item->name;
        }
        return $files;
    }

    public function getPicturesAttribute()
    {
        $files = Storage::files('public/img/products/' . $this->id . '/');
        return $files;
    }

    public function getCountryOfConsignmentNameAttribute()
    {
        $country = Country::where(['id' => $this->country_of_consignment_id])->first();

        if ($country != null) {
            return $country->name;
        }
        return '';
    }

    public function getCountryOfBrandRegistrationNameAttribute()
    {
        $country = Country::where(['id' => $this->country_of_brand_registration_id])->first();

        if ($country != null) {
            return $country->name;
        }
        return '';
    }

    public function getMyAmountAttribute()
    {
        $user = Auth::user();

        $stock_group_id = UserSettings::where(['customer_id' => $user->customer_code])->first()->stock_group_id;
        $stocks = [];
        $stock_groups = StockGroup::where(['group_id' => $stock_group_id])->get();
        foreach ($stock_groups as $item) {
            $stocks[] = $item->stock_id;
        }
        $amount = 0;
        $product_in_stock = ProductsInStock::whereIn('stock_id', $stocks)->where(['product_id' => $this->id])->get();
        //$product_in_stock = ProductsInStock::where(['stock_id' => $stocks, 'product_id' => $this->id])->get();
        foreach ($product_in_stock as $item) {
            $amount = $amount + $item->amount;
        }
        return $amount;
    }

    public function getCenterAmountAttribute()
    {
        $stock_group_id = setting('central_stock_group');
        $stocks = [];
        $stock_groups = StockGroup::where(['group_id' => $stock_group_id])->get();
        foreach ($stock_groups as $item) {
            $stocks[] = $item->stock_id;
        }
        $amount = 0;

        $product_in_stock = ProductsInStock::whereIn('stock_id', $stocks)->where(['product_id' => $this->id])->get();
        foreach ($product_in_stock as $item) {
            $amount = $amount + $item->amount;
        }


        return $amount;
    }

    public function getCategoryNameAttribute()
    {
        $category = Category::where(['id' => $this->category_id])->first();

        if ($category != null) {
            return $category->name;
        }
        return '';
    }

    public function getPersonalPriceUahAttribute()
    {
        $user = Auth::user();

        $row_price_type_id = IndividualPriceType::where(['customer_id' => $user->user_code, 'product_id' => $this->id])->first();
        $price_type_id = null;
        if ($row_price_type_id != null) {
            $price_type_id = $row_price_type_id->price_type_id;
        }
        if ($price_type_id == null) {
            $price_type_id = UserSettings::where(['customer_id' => $user->customer_code])->first()->price_type_id;
        }
        $product_price = ProductPrice::where(['product_id' => $this->id, 'price_type_id' => $price_type_id])->first();
        if ($product_price == null) {
            return '0';
        }

        $price = 0;
        if ($product_price != null) {
            $price = $product_price->price;
        }
        $second_currency = Currency::where(['id' => 980])->first();
        $price = CurrencyController::Convert($price, Currency::where(['id' => $product_price->currency_id])->first(), $second_currency);

        return $price;
    }

    public function getPersonalPriceAttribute()
    {
        $user = Auth::user();

        $row_price_type_id = IndividualPriceType::where(['customer_id' => $user->user_code, 'product_id' => $this->id])->first();
        $price_type_id = null;
        if ($row_price_type_id != null) {
            $price_type_id = $row_price_type_id->price_type_id;
        }
        if ($price_type_id == null) {
            $price_type_id = UserSettings::where(['customer_id' => $user->customer_code])->first()->price_type_id;
        }
        $product_price = ProductPrice::where(['product_id' => $this->id, 'price_type_id' => $price_type_id])->first();

        $price = 0;
        if ($product_price != null) {
            $price = $product_price->price;
        }

        return $price;
    }

    public function getPersonalPriceCurrencyAttribute()
    {
        $user = Auth::user();

        $price_type_id = UserSettings::where(['customer_id' => $user->customer_code])->first()->price_type_id;
        $product_price = ProductPrice::where(['product_id' => $this->id, 'price_type_id' => $price_type_id])->first();

        $currency_id = 0;
        if ($product_price != null) {
            $currency_id = $product_price->currency_id;
        }


        $currency = Currency::where(['id' => $currency_id])->first();

        if ($currency == null) {
            return 0;
        }
        $code = $currency->code;


        return $code;
    }


    public function getRetailPriceUahAttribute()
    {
        $user = Auth::user();

        $price_type_id = 2;
        $product_price = ProductPrice::where(['product_id' => $this->id, 'price_type_id' => $price_type_id])->first();

        $price = 0;
        if ($product_price != null) {
            $price = $product_price->price;
        } else {
            return $price;
        }

        $secont_currency = Currency::where(['id' => 980])->first();
        $price = CurrencyController::Convert($price, Currency::where(['id' => $product_price->currency_id])->first(), $secont_currency);


        return $price;
    }

    public function getStatusColorAttribute()
    {
        $status_id = $this->statusID($this->status);
        switch ($status_id) {
            case 1:
                $color_class = 'blue';
                break;
            case 2:
                $color_class = 'red';
                break;
            case 3:
                $color_class = 'green';
                break;
            case 4:
                $color_class = 'blue';
                break;
            case 5:
                $color_class = 'red';
                break;
            case 6:
                $color_class = 'green';
                break;
            case 7:
                $color_class = 'blue';
                break;
            case 8:
                $color_class = 'red';
                break;
            case 9:
                $color_class = 'green';
                break;

            default:
                $color_class = '';
                break;
        }

        return $color_class;
    }

    public function getStatusIdAttribute()
    {
        return $this->statusID($this->status);
    }

    public static function statusID($status)
    {
        $status_id = 0;
        if ($status == 'Рабочий асортимент') {
            $status_id = 1;
        } elseif ($status == 'Новинка') {
            $status_id = 2;
        } elseif ($status == 'Распродажа') {
            $status_id = 3;
        } elseif ($status == 'Под заказ') {
            $status_id = 4;
        } elseif ($status == 'Производство') {
            $status_id = 5;
        } elseif ($status == 'Снят с продажи') {
            $status_id = 6;
        } elseif ($status == 'Услуга') {
            $status_id = 7;
        } elseif ($status == 'Реклама') {
            $status_id = 8;
        } elseif ($status == 'Сервис') {
            $status_id = 9;
        };

        return $status_id;
    }

    public function getStatusNameAttribute()
    {
        $status_id = $this->statusID($this->status);

        $status_name = '';
        if (Session::get('locale') != 'ru') {
            switch ($status_id) {
                case 1:
                    $status_name = 'Робочий асортимент';
                    break;
                case 2:
                    $status_name = 'Новинка';
                    break;
                case 3:
                    $status_name = 'Розпродаж';
                    break;
                case 4:
                    $status_name = 'Під замовлення';
                    break;
                case 5:
                    $status_name = 'Виробництво';
                    break;
                case 6:
                    $status_name = 'Знято з продажу';
                    break;
                case 7:
                    $status_name = 'Послуга';
                    break;
                case 8:
                    $status_name = 'Реклама';
                    break;
                case 9:
                    $status_name = 'Сервіс';
                    break;

                default:
                    $status_name = '';
                    break;
            }
        } else {
            $status_name = $this->status;
        }
        return $status_name;
    }
}
