    <section class="header-main border-bottom p-2">
        <div class="container">
            <div class="row align-items-center d-flex justify-content-between">
                <div class=" col-1">
                    <a href="/" class="brand-wrap">
                        <img class="logo" src="{{ asset('img/logo.png') }}">
                    </a>
                </div>

                <div class="col-2 d-flex justify-content-end">
                    <div class="dropdown ">
                        <button type="button" class="btn bg-blue white dropdown-toggle"  id="dropdownMenuXXL" data-bs-toggle="dropdown" aria-expanded="false"
                            >
                            <i class="bi bi-list"></i> {{__('l.menu')}}
                        </button>
                        <div class="dropdown-menu" x-placement="bottom-start" aria-labelledby="dropdowndropdownMenuXXL"
                            style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">

                            <a class="dropdown-item" href="/order-lists">{{__('l.order_list')}} </a>
                            <a class="dropdown-item" href="#">{{__('l.product_return')}}</a>
                            <a class="dropdown-item" href="#">{{__('l.brands')}}</a>
                            <a class="dropdown-item" href="#">{{__('l.xml_upload')}}</a>
                            <a class="dropdown-item" href="#">{{__('l.personal_price_xls')}}</a>
                            <a class="dropdown-item" href="#">{{__('l.API_Integration')}}</a>

                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <form action="#" class="search">
                        <div class="input-group">
                        <input type="text" class="form-control" placeholder="{{__('l.search')}}" aria-describedby="search_xxl">
                        <button class="btn bg-blue white" type="button" id="search_xxl"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-1">
                    <a href="/drafts" class="btn btn-outline-primary">
                        {{__('l.drafts')}}
                    </a>
                </div>
                <div class="col-1">
                    <a href="cart" class="btn btn-outline-primary position-relative">
                        <i class="bi bi-cart3"></i>
                        <?php
                            $cart_count = app(App\Http\Controllers\CartController::class)->getCartCount();
                        ?>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-red" id="cart-qty">{{$cart_count}}</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

