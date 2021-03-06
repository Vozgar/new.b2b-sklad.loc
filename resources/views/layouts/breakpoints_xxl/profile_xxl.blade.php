<div class="row pb-xxl-6">
	<article class="card  mb-4 sticky-top sticky-xxl">
        <div class="card m-2 p-4 bg-light">
            <div class="col-12">
            <input class="col-3" type="password" class="form-control" id="new_password">
            <div class="col-3 form-text b text-center" >{{__('l.input_new_password')}}</div>

            <input class="col-3" type="password" class="form-control" id="new_password_repeat">
            <div class="col-3 form-text b text-center" >{{__('l.repeat_new_password')}}</div>

            <a class="col-3 btn btn-outline-primary mt-2" id="change_password_button" href="javascript:void(0);">{{__('l.change_password')}}</a>
            </div>
        </div>

			{{-- <div class="row p-2">
			<div class="col-3 d-grid gap-2">
                @foreach ($drafts as $draft)
                @if ($loop->first)
				<a id="copy_draft_button" href="/draft/copy/{{$draft->id}}" class="btn bg-green white">{{__('l.copy_draft')}}</a>
                @endif
                @endforeach
			</div>
			<div class="col-3 d-grid gap-2">
                @foreach ($drafts as $draft)
                @if ($loop->first)
                <a id="edit_draft_button" href="/draft-edit/{{$draft->id}}" class="btn bg-orange white">{{__('l.edit_draft')}}</a>
                @endif
                @endforeach

			</div>
			<div class="col-3 d-grid gap-2">
                @foreach ($drafts as $draft)
                @if ($loop->first)
                <a id="delete_draft_button" href="/draft/delete/{{$draft->id}}" class="btn bg-red white">{{__('l.delete_draft')}}</a>
                @endif
                @endforeach

			</div>
			<div class="col-3 d-grid gap-2">
                @foreach ($drafts as $draft)
                @if ($loop->first)
				<a href="#" class="btn bg-blue white">{{__('l.add_draft_to_order')}}</a>
                @endif
                @endforeach
			</div>
    	</div> --}}
		<hr class="m-0">
		<div class="row align-items-center pt-2">
			{{-- <div class="col-5">
				<figure class="itemside">
					<div class="aside"></div>
						<figcaption class="info">
              				<div class="price h5"> {{__('l.product')}} </div>
						</figcaption>
				</figure>
			</div> --}}
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

	<div class="tab-content p-0" id="v-pills-tabContent">
        {{-- @foreach ($drafts as $draft)
        <div class="tab-pane fade @if ($loop->first)show active @endif" id="v-pills-{{$draft->id}}" role="tabpanel" aria-labelledby="v-pills-{{$draft->id}}-tab">
            @foreach ($draft->items as $item)
            <article class="card card-body-cart mb-2">
				<a href="#" class="title blue text-decoration-none b pb-2">{{$item->product->name}} </a>
					<div class="row align-items-center">
						<div class="col-5">
							<figure class="itemside">
								<div class="aside"><img src="{{ asset($item->product->main_picture) }}" class="border img-sm"></div>
								<figcaption class="info">
									<span class="text-muted title">Brand: <a href="#" class="blue text-decoration-none">{{$item->product->brand_name}} </a></span>
									<span class="text-muted title">????????????: <span class="b dark">?? ??????????????</span> </span>
									<span class="text-muted">???????????????? ??????????: <span class="b red">?????? ?? ??????????????</span> </span>
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
									<button class="btn btn-light" type="button" id="button-minus"> &minus; </button>
								</div>
									<input type="text" class="form-control"  value="{{$item->qty}}">
								<div class="input-group-append">
									<button class="btn btn-light" type="button" id="button-plus"> + </button>
								</div>
							</div>
						</div>
						<div class="col-2">
							<div class="price-dark h5"> {{$item->product->personal_price*$item->qty}} {{$item->product->personal_price_currency}} </div>
						</div>
						<div class="col flex-grow-0 text-right">
							<a href="#" class="btn btn-outline-danger"> <i class="bi bi-trash-fill"></i> </a>
						</div>
					</div>
			</article>
            @endforeach

		</div>
        @endforeach --}}


	</div>
</div>



