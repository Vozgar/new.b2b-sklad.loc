<div class="row ">
	<article class="card  mb-2 sticky-top sticky-xxl">
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

<article class="card mb-4">
	<div class="card-body">
		<h4 class="card-title mb-4">Способ доставки</h4>
		<div class="nav d-flex justify-content-around row" id="nav-tab" role="tablist">
			<div class="form-group col-4 dev box active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="bi bi-arrow-right-square"></i> Самовывоз</div>

			<div class="form-group col-4 dev box" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="bi bi-arrow-right-square"></i> Адресная доставка</div>

			<div class="form-group col-4 dev box" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="bi bi-arrow-right-square"></i> Новая почта</div>
		</div>

			<div class="tab-content mt-3" id="nav-tabContent">

				<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
					<div class="card p-4">
						<h4 class="card-title mb-4">Киев</h4> 
						<h4 class="card-title mb-4">ул.Якутская 12</h4>
						<h5 class="card-title mb-4">пон.-пят - 9:00-17:30</h5>
						<h5 class="card-title mb-4">суб. - 10:00-13:30</h5>
					</div>
				</div>

				<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
					<div class="card p-4">
						<h4 class="card-title mb-4">Адресная доставка</h4> 
						<h5 class="card-title mb-4">Только для тех у кого предусмотрен договор на доставку</h5>

							<div class="form-check">
							<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
							<label class="form-check-label" for="flexRadioDefault1">
								Магазин №1 (Винницкая область, Бихів, Вишнева, вул., буд. № 1)
							</label>
							</div>
							<hr>
							<div class="form-check">
							<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
							<label class="form-check-label" for="flexRadioDefault2">
								Магазин №2 (Винницкая область, Бихів, Вишнева, вул., буд. № 1)
							</label>
							</div>							
							<hr>
							<div class="form-check">
							<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
							<label class="form-check-label" for="flexRadioDefault2">
								Магазин №3 (Винницкая область, Бихів, Вишнева, вул., буд. № 1)
							</label>
							</div>



					</div>
				</div>

				<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
					<div class="row">

						<div class="col-6">
							<div class="card p-4">
								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Область</label>
									<input type="email" class="form-control" id="exampleFormControlInput1">
								</div>						
								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Населенный пункт</label>
									<input type="email" class="form-control" id="exampleFormControlInput1">
								</div>						
								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Отделение Новой почты</label>
									<input type="email" class="form-control" id="exampleFormControlInput1">
								</div>						
								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Наложенный платеж (по умолчанию не установлен)</label>
									<div class="row">	
										<div class="col-5">
											<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Установить</button>
										</div>
										<div class="col-5">
											<div class="collapse" id="collapseExample">
												<div class="card">
													<input type="number" class="form-control">
												</div>
											</div>
										</div>
										<div class="col-2">
											<div class="collapse " id="collapseExample">
												<div class="row g-2 align-items-center">
  													<div class="col-auto">
    													<label class="col-form-label">UAH</label>
  													</div>
												</div>																					
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-6">
							<div class="card p-4">
								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Фамилия</label>
									<input type="email" class="form-control">
								</div>						
								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Имя</label>
									<input type="email" class="form-control">
								</div>						
								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Отчество</label>
									<input type="email" class="form-control" id="exampleFormControlInput1">
								</div>						
								<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Телефон</label>
									<input type="email" class="form-control" id="exampleFormControlInput1">
								</div>
							</div>
						</div>
					<div>
				</div>
			</div>
	</div>
</article>

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



