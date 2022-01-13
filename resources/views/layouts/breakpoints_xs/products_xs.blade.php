<textarea id="filter_json" hidden>
    {{$all_products}}
</textarea>
<textarea id="filtered_products_json" hidden>
    {{$filtered_products}}
</textarea>
@foreach ($products as $item)
<article class="card card-product-list">
	<div class="row no-gutters">
		<div class="col-2 border-end d-flex">

			<a href="{{ route('product', ['id' => $item->id]) }}"class="d-flex align-items-center">

				<span class="badge bg-{{$item->statusColor}} white"> {{$item->statusName}}</span>
				{{-- <img class="img-fluid" src="{{ asset('img/products/1_main.jpeg') }}"> --}}
                <img class="img-fluid" src="{{$item->main_picture}}">
			</a>

		</div>
		<div class="col-12">
			<div class="info-main">
				<a href="{{ route('product', ['id' => $item->id]) }}" class="h5 d-block blue text-decoration-none">{{$item->name}}</a>
				<span class="price"> {{__('l.code')}}: </span>
				<span class="b dark">{{$item->code}}</span>
				<br>
				<span class="price pl-3"> {{__('l.brand')}}: </span>
				<span class="b dark"> <a href="/{{$item->brandName}}" class="text-decoration-none">{{$item->brandName}}</a></span>
			</div>

			<div class="info-main">
				<span class="price"> {{__('l.retail_price')}}: </span>
				<span class="b dark">{{$item->retailPriceUah}} UAH</span>
				<br>
				<span class="price"> {{__('l.personal_price_uah')}}: </span>
				<span class="b dark"> {{$item->personalPriceUah}} UAH</span>
				<br>
				<span class="price"> {{__('l.personal.price_currency')}}: </span>
				<span class="b dark"> {{$item->personalPrice}} {{$item->personalPriceCurrency}}</span>
			</div>
		</div>
		<div class="col-3">
			<div class="info-aside">
				<div class="price-wrap">
				<span class="price"> Виница: </span>
				<span class="b dark"> 1шт.</span>
				<br>
				<span class="price"> Основной склад: </span>
				<span class="b dark"> >10 </span>
				<br>
				<span class="price"> {{__('l.pack')}} 1: </span>
				<span class="b dark"> {{$item->pack_qty}} шт.</span>
				<br>
				<span class="price"> {{__('l.pack')}} 2: </span>
				<span class="b dark"> {{$item->pack_qty2}} шт.</span>

				</div>
				<div class=" col-md flex-grow-0  border rounded pb-2">

				<p class="h7 pb-2 text-center">{{__('l.add_to_cart')}}</p>
			<span class="d-flex justify-content-center">
			<div class="input-group input-spinner">
			  <div class="input-group-prepend">
			  <button class="btn btn-light qty-minus" data-product-id="{{$item->id}}" type="button" id="button-minus"> &minus; </button>
			  </div>
			  <input type="text" id="qty-{{$item->id}}" class="form-control" value="1">
			  <div class="input-group-append">
			    <button class="btn btn-light qty-plus" data-product-id="{{$item->id}}" type="button" id="button-plus"> + </button>
			  </div>

			</div>
			{{-- <a href="#" class="btn btn-primary ms-1 add-to-cart"> <span class=""></span> <i class="bi bi-cart4"></i>  </a> --}}
            <button class="btn btn-primary ms-1 add-to-cart" data-product-id="{{$item->id}}" type="button"><i class="bi bi-cart4"></i></button>
			<span>
		</div>

			</div>
		</div>
	</div>
</article>
@endforeach

{!! $products->links() !!}
