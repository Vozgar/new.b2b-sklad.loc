<aside class="col-md-3">
	<div class="card sticky-top sticky-xxl">
    		<div class="card m-1 p-2 bg-light">
				<input type="text" class="form-control" id="price_name">
				<div class="form-text b text-center" >{{__('l.input_name_of_price')}}</div>
				<a class="btn btn-outline-primary mt-2" id="create_price" href="javascript:void(0);">{{__('l.create_price')}}</a>
			</div>
    <div class="card mt-2 m-1">
    <label for="price" class="form-label b text-center pt-2">{{__('l.my_prices')}}</label>
      <div class="nav flex-column nav-pills p-1" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          @foreach ($prices as $price)
            <button
            class="nav-link text-start nav-price @if ($loop->first) active @endif"
            id="v-pills-{{$price->id}}-tab"
            data-bs-toggle="pill"
            data-bs-target="#v-pills-{{$price->id}}"
            data-draft-id="{{$price->id}}"
            type="button"
            role="tab"
            aria-controls="v-pills-{{$price->id}}"
            aria-selected="false">{{$price->name}}</button>
          @endforeach
      </div>
    </div>


  </div>
</aside>
