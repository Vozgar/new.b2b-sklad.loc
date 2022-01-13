<div class="row pb-5">
	<article class="card  mb-2 sticky-top sticky-xxl">
			<div class="row p-2">
			<div class="col-3 d-grid gap-2">
                @foreach ($prices as $price)
                @if ($loop->first)
				<a id="copy_price_button" href="/price/copy/{{$price->id}}" class="btn bg-green white">{{__('l.copy_price')}}</a>
                @endif
                @endforeach
			</div>

			<div class="col-3 d-grid gap-2">
                @foreach ($prices as $price)
                @if ($loop->first)
                <a id="delete_price_button" href="/price/delete/{{$price->id}}" class="btn bg-red white">{{__('l.delete_price')}}</a>
                @endif
                @endforeach

			</div>
            <div class="col-3 d-grid gap-2">
                @foreach ($prices as $price)
                @if ($loop->first)
                <a id="download_price_button" href="/price/download/{{$price->id}}" class="btn bg-blue white">{{__('l.download_price_ua')}}</a>
                @endif
                @endforeach

			</div>            
			<div class="col-3 d-grid gap-2">
                @foreach ($prices as $price)
                @if ($loop->first)
                <a id="download_price_button" href="/price/download/{{$price->id}}" class="btn bg-blue white">{{__('l.download_price_ru')}}</a>
                @endif
                @endforeach

			</div>

    	</div>
		<hr class="m-0">
		<div class="row align-items-center pt-2">

			{{-- <div class="col-5">
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
			</div> --}}
		</div>
	</article>

	<div class="tab-content p-0" id="v-pills-tabContent">
        @foreach ($prices as $price)
        <div class="tab-pane fade @if ($loop->first)show active @endif" id="v-pills-{{$price->id}}" role="tabpanel" aria-labelledby="v-pills-{{$price->id}}-tab">
            @include('layouts.breakpoints_xxl.price_edit_settings')
		</div>
        @endforeach


	</div>
</div>



