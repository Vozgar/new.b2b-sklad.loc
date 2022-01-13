<aside class="col-md-3">
	<div class="card sticky-top sticky-xxl">


			<div class="card m-1 p-2 bg-light">
				<label for="draft" class="form-label b text-center">{{__('l.save_to_draft')}}</label>
				<input type="text" class="form-control" id="draft">
				<div id="emailHelp" class="form-text b text-center">{{__('l.input_name_of_draft')}}</div>
				<a class="btn btn-outline-success mt-3" href="draft">{{__('l.create_draft')}}</a>
			</div>
			<br>
            <?php
                        $sum_uah = app(App\Http\Controllers\CartController::class)->getSumUah();
                        $sum_usd = app(App\Http\Controllers\CartController::class)->getSumUsd();
                        $sum_eur = app(App\Http\Controllers\CartController::class)->getSumEur();
                        $cart_count = app(App\Http\Controllers\CartController::class)->getCartCount(); 
                      ?>
			<h4 class="text-center">{{__('l.cart')}}</h4>
			<h6 class="text-center">{{$cart_count}} {{__('l.items')}}</h6>
			<div class="card m-1 p-2">

					<dl class="dlist-align">
					  <dt>{{__('l.total')}} USD:</dt>
					  <dd class="text-right"><strong> {{$sum_usd}}</strong></dd>
					</dl>
					<dl class="dlist-align">
					  <dt>{{__('l.total')}} EUR:</dt>
					  <dd class="text-right"><strong> {{$sum_eur}}</strong></dd>
					</dl>
					<dl class="dlist-align">
					  <dt>{{__('l.total')}} UAH:</dt>

					  <dd class="text-right "><strong> {{$sum_uah}}</strong></dd>
					</dl>
					<hr>
				<div class="d-grid gap-2">
					<a class="btn bg-blue white" href="#deli">{{__('l.arrange_delivery')}}</a>
				</div>
			</div>

   </div>
</aside>
