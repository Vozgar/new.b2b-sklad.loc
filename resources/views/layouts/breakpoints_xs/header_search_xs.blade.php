    <section class="header-main border-bottom p-2">
        <div class="container">
            <div class="d-flex justify-content-between">
			    <div class="">
					<a href="#menu" class="btn bg-blue white "><i class="bi bi-list"></i>{{__('l.menu')}}</a>
                </div>
				
				
                <div class="">
                    <a href="/" class="brand-wrap">
                        <img class="logo" src="{{ asset('img/logo.png') }}">
                    </a>
                </div>



                <div class="">
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

