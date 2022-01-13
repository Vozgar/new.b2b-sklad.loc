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
		<div class="col-7">
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
				<span class="b dark">{{number_format($item->retailPriceUah, 2, ',', ' ')}} UAH / {{$item->multiplicity_unit}}</span>
				<br>
				<span class="price"> {{__('l.personal_price_uah')}}: </span>
				<span class="b dark"> {{number_format($item->personalPriceUah, 2, ',', ' ')}} UAH / {{$item->multiplicity_unit}}</span>
				<br>
				<span class="price"> {{__('l.personal_price_currency')}}: </span>
				<span class="b dark"> {{number_format($item->personalPrice, 2, ',', ' ')}} {{$item->personalPriceCurrency}} / {{$item->multiplicity_unit}}</span>
			</div>
		</div>
		<div class="col-3">
			<div class="info-aside">
				<div class="price-wrap">
				<span class="price"> {{__('l.your_stock')}}: </span>
				<span class="b dark"> {{$item->myAmount}} {{$item->multiplicity_unit}}</span>
				<br>
				<span class="price"> {{__('l.main_stock')}}: </span>
				<span class="b dark"> {{$item->centerAmount}} {{$item->multiplicity_unit}} </span>
				<br>
				<span class="price"> {{__('l.pack')}} 1: </span>
				<span class="b dark"> {{$item->pack_qty}} {{$item->multiplicity_unit}}</span>
				<br>
				<span class="price"> {{__('l.pack')}} 2: </span>
				<span class="b dark"> {{$item->pack_qty2}} {{$item->multiplicity_unit}}.</span>

				</div>
				<div class="col-md flex-grow-0 border rounded pb-2">
					<span class="d-flex justify-content-between mt-2">
						<div class="input-group input-spinner justify-content-center">
							<div class="input-group-prepend">
								<button class="btn btn-light button-minus" data-product-id="{{$item->id}}" data-mutiplicity="{{$item->multiplicity}}" type="button" id="button-minus"> &minus; </button>
							</div>
								<input type="text" id="qty-{{$item->id}}" class="form-control" value="{{$item->multiplicity}}">
							<div class="input-group-append">
								<button class="btn btn-light button-plus" data-product-id="{{$item->id}}" data-mutiplicity="{{$item->multiplicity}}" type="button" id="button-plus"> + </button>
							</div>			  
						</div>
						<div class="d-flex align-items-center">
							<span class="b dark pe-2">{{$item->multiplicity_unit}}</span>
						</div>
					</span>		
					<span class="d-flex justify-content-center mt-2">
						<button class="btn btn-primary btn-mb btn-block add-to-cart" data-product-id="{{$item->id}}" type="button"><i class="bi bi-cart4"></i>   {{__('l.add_to_cart')}}</button>
					</span>	
					  
				</div>
			</div>
		</div>
	</div>
</article>
@endforeach

{!! $products->links() !!}
