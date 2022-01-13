<div class="row ">
	<article class="card  mb-2 sticky-top sticky-xl">
		<div class="row align-items-center pt-2">
			<div class="col-5">
				<figure class="itemside">
					<div class="aside"></div>
						<figcaption class="info">
              				<div class="price h5"> {{__('l.product')}} </div>
						</figcaption>
				</figure>
			</div>
          	<div class="col-2">
				<div class="price h5 d-flex justify-content-center"> {{__('l.price')}} </div>
			</div>
			<div class="col-2">
				<div class="price h5 d-flex justify-content-end"> {{__('l.qty')}} </div>
			</div>
			<div class="col-2">
				<div class="price h5 d-flex justify-content-center"> {{__('l.sum')}} </div>
			</div>
			<div class="col-1">
				<div class="price h5 d-flex justify-content-end"><a href="#" class="btn btn-outline-danger"> <i class="bi bi-trash-fill"></i> </a></div>
			</div>
			<div class="col flex-grow-0 text-right">
			</div>
		</div>
	</article>

    @foreach ($carts as $item)
    <article class="card card-body-cart mb-2">
        <a href="#" class="title blue text-decoration-none b pb-2">{{$item->product->name}} </a>
            <div class="row align-items-center">
                <div class="col-5">
                    <figure class="itemside">
                        <div class="aside"><img src="{{$item->product->main_picture}}" class="border img-sm"></div>
                        <figcaption class="info">
                            <span class="text-muted title">Brand: <a href="#" class="blue text-decoration-none">{{$item->product->brand}} </a></span>
                            <span class="text-muted title">Виница: <span class="b dark">В наличии</span> </span>
                            <span class="text-muted">Основной склад: <span class="b red">Нет в наличии</span> </span>
                        </figcaption>
                    </figure>
                </div>
                <div class="col">
                    <div class="price h5"></div>
                </div>
                <div class="col-2">
                    <div class="price-dark h5"> {{$item->product->personal_price}} {{$item->product->personal_price_currency}} </div>
                </div>
                <div class="col">
                    <div class="input-group input-spinner">
                        <div class="input-group-prepend">
                            <button class="btn btn-light button-minus" data-row-id = "{{$item->id}}" type="button" id="button-minus-{{$item->id}}"> &minus; </button>
                        </div>
                        <input type="text" class="form-control" data-row-id = "{{$item->id}}" value="{{$item->qty}}" id="qty-{{$item->id}}">
                        <div class="input-group-append">
                            <button class="btn btn-light button-plus" data-row-id = "{{$item->id}}" type="button" id="button-plus-{{$item->id}}"> + </button>
                        </div>
                    </div>
                </div>
                <?php
                    $fmt = new NumberFormatter( 'en-CA', NumberFormatter::PATTERN_DECIMAL, "* #####.00 ;(* #####.00)");
                    $res = $item->product->personal_price*$item->qty;
                    $sum = $fmt->format($res);
                ?>
                <div class="col-2">
                    <div class="price-dark h5"> {{$sum}} {{$item->product->personal_price_currency}} </div>
                </div>
                <div class="col flex-grow-0 text-right">
                    <button class="btn btn-outline-danger delete-cart-row" data-row-id = "{{$item->id}}"> <i class="bi bi-trash-fill"></i> </button>
                </div>
            </div>
      </article>
    @endforeach


	{{-- <article class="card card-body-cart mb-2">
      <a href="#" class="title blue text-decoration-none b pb-2">Смеситель для кухне Globus Lux ALPEN SUS-203L </a>
				<div class="row align-items-center">
        			<div class="col-5">
						<figure class="itemside">
							<div class="aside"><img src="{{ asset('img/products/2.jpeg') }}" class="border img-sm"></div>
							<figcaption class="info">
              					<span class="text-muted title">Brand: <a href="#" class="blue text-decoration-none">Topaz </a></span>
                         		<span class="text-muted title">Виница: <span class="b red">Нет в наличии</span> </span>
                				<span class="text-muted">Основной склад: <span class="b dark">В наличии</span> </span>
							</figcaption>
						</figure>
					</div>
                    <div class="col">
						<div class="price h5"></div>
					</div>
          			<div class="col-2">
						<div class="price-dark h5"> 180.00 EUR </div>
					</div>
					<div class="col">
						<div class="input-group input-spinner">
							<div class="input-group-prepend">
								<button class="btn btn-light" type="button" id="button-minus"> &minus; </button>
							</div>
								<input type="text" class="form-control"  value="1">
							<div class="input-group-append">
								<button class="btn btn-light" type="button" id="button-plus"> + </button>
							</div>
						</div>
					</div>
					<div class="col-2">
						<div class="price-dark h5"> 180.00 EUR </div>
					</div>
					<div class="col flex-grow-0 text-right">
						<a href="#" class="btn btn-outline-danger"> <i class="bi bi-trash-fill"></i> </a>
					</div>
				</div>
	</article>

	<article class="card card-body-cart mb-2">
      <a href="#" class="title blue text-decoration-none b pb-2">Смеситель для кухне Globus Lux ALPEN SUS-203L </a>
				<div class="row align-items-center">
        			<div class="col-5">
						<figure class="itemside">
							<div class="aside"><img src="{{ asset('img/products/4.jpeg') }}" class="border img-sm"></div>
							<figcaption class="info">
              					<span class="text-muted title">Brand: <a href="#" class="blue text-decoration-none">Topaz </a></span>
                         		<span class="text-muted title">Виница: <span class="b dark">В наличии</span> </span>
                				<span class="text-muted">Основной склад: <span class="b red ">Нет в наличии</span> </span>
							</figcaption>
						</figure>
					</div>
                    <div class="col">
						<div class="price h5"></div>
					</div>
          			<div class="col-2">
						<div class="price-dark h5"> 110.00 UAH </div>
					</div>
					<div class="col">
						<div class="input-group input-spinner">
							<div class="input-group-prepend">
								<button class="btn btn-light" type="button" id="button-minus"> &minus; </button>
							</div>
								<input type="text" class="form-control"  value="2">
							<div class="input-group-append">
								<button class="btn btn-light" type="button" id="button-plus"> + </button>
							</div>
						</div>
					</div>
					<div class="col-2">
						<div class="price-dark h5"> 220.00 UAH </div>
					</div>
					<div class="col flex-grow-0 text-right">
						<a href="#" class="btn btn-outline-danger"> <i class="bi bi-trash-fill"></i> </a>
					</div>
				</div>
	</article> --}}

</div>



