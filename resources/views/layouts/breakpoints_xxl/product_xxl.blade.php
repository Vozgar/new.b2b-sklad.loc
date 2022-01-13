
<div class="card">

  <span class="h4 b text-center mt-1">{{$product->name}}</span>
  <span class="border-bottom"></span>
	<div class="row ">
		<aside class="col-5 mt-2">
      <article class="gallery-wrap">
      <span class="badge badges-xxl bg-blue white text-lg m-2"> Новинка</span>
        <div class="img-big-wrap">
           <div id="carouselExampleIndicators" class="carousel slide carousel-fade carousel-product-item" data-bs-ride="">

            <div class="carousel-inner ">
                @foreach ($product->pictures as $picture)
                <div class="carousel-item @if ($loop->first) active @endif">
                    <img src="{{ Str::replaceFirst('public', 'storage', asset($picture)) }}" alt="{{$product->name}}">
                </div>
                @endforeach
              {{-- <div class="carousel-item active">
                <img src="{{ asset('img/products/1_main.jpeg') }}" alt="{{$product->name}}">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/products/2.jpeg') }}" alt="Смеситель для кухни под осмос Globus Lux ALPEN SUS-0110">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/products/3.jpeg') }}" alt="Смеситель для кухни под осмос Globus Lux ALPEN SUS-0110">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/products/4.jpeg') }}" alt="Смеситель для кухни под осмос Globus Lux ALPEN SUS-0110">
              </div>
              <div class="carousel-item ">
                <img src="{{ asset('img/products/5.jpeg') }}" alt="Смеситель для кухни под осмос Globus Lux ALPEN SUS-0110">
              </div> --}}
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
              <span aria-hidden="true"><i class="bi bi-chevron-compact-left" style="font-size: 2rem; color: cornflowerblue;"></i></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
              <span aria-hidden="true"><i class="bi bi-chevron-compact-right" style="font-size: 2rem; color: cornflowerblue;"></i></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="thumbs-wrap">
            @foreach ($product->pictures as $picture)
            <a href="#" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}" class="@if ($loop->first) active @endif item-thumb" aria-current="true">
                <img src="{{ Str::replaceFirst('public', 'storage', asset($picture)) }}">
            </a>
            @endforeach
          {{-- <a href="#" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active item-thumb" aria-current="true">
            <img src="{{ asset('img/products/1_main.jpeg') }}">
          </a>
          <a href="#" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="item-thumb" aria-current="true">
            <img src="{{ asset('img/products/2.jpeg') }}">
          </a>
           <a href="#" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="item-thumb" aria-current="true">
            <img src="{{ asset('img/products/3.jpeg') }}">
          </a>
           <a href="#" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" class="item-thumb" aria-current="true">
            <img src="{{ asset('img/products/4.jpeg') }}">
          </a>
           <a href="#" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" class="item-thumb" aria-current="true">
            <img src="{{ asset('img/products/5.jpeg') }}">
          </a> --}}
        </div>

      </article>
		</aside>
		<main class="col-7  mt-2">
      <article class="content-body">

        <dl class="row">

          <dt class="col-3 price">{{__('l.code')}}:</dt>
          <dd class="col-9 b dark">{{$product->code}}</dd>

          <dt class="col-3 price">{{__('l.brand')}}:</dt>
          <dd class="col-9 b dark"><a href="" class="text-decoration-none">{{$product->brand_name}}</a></dd>

          <dt class="col-3 price">{{__('l.category')}}:</dt>
          <dd class="col-9 b blue"><a href="" class="text-decoration-none">{{$product->categoryName}}</a></dd>

        </dl>
          <hr class="mt-2 mb-2">
         <a href="#certificate" class=" h5 b blue text-decoration-none"> {{__('l.certificate')}}</a>
          <hr class="mt-2 mb-3">

        <dl class="row">

          <dt class="col-3 h6 dark"> {{__('l.delivery')}}:</dt>
          <dd class="col-9 b">{{__('l.own_delivery')}} | {{__('l.transport_company')}} | <img src="{{ asset('img/nova-poshta.png') }}" class="nova-poshta-xxl"></dd>

        </dl>





           <hr class="mt-2 mb-4">
        <div class="mb-2">
          <var class="price h4"> {{__('l.retail_price')}}: </var>
          <var class="b dark h4">{{$product->retailPriceUah}} UAH / {{$product->multiplicity_unit}}</var>
        </div>
        <div class="mb-3">
          <var class="price h5"> {{__('l.personal_price_uah')}}: </var>
          <var class="b dark h5"> {{$product->personalPriceUah}} UAH / {{$product->multiplicity_unit}} </var>
        </div>
        <div class="mb-3">
          <var class="price h5"> {{__('l.personal_price_currency')}}: </var>
          <var class="b dark h5"> {{$product->personalPrice}} {{$product->personalPriceCurrency}} / {{$product->multiplicity_unit}} </var>
        </div>
          <hr class="mt-2 mb-2">
        <dl class="row">
          <dt class="col-4 price">Локальний склад: </dt>
          <dd class="col-8 b dark">1шт.</dd>

          <dt class="col-4 price">Головний склад:</dt>
          <dd class="col-8 b dark">>10</dd>

          <dt class="col-4 price">{{__('l.pack')}} 1: </dt>
          <dd class="col-8 b dark">{{$product->pack_qty}} {{$product->multiplicity_unit}} </dd>

          <dt class="col-4 price">{{__('l.pack')}} 2: </dt>
          <dd class="col-8 b dark">{{$product->pack_qty2}} {{$product->multiplicity_unit}} </dd>
        </dl>
        <hr>
        <div class="row">
          <div class="form-group col-md flex-grow-0">
            <div class="input-group mb-3 input-spinner ">
              <div class="input-group-prepend ">
                <button class="btn btn-light button-minus" type="button" data-product-id="{{$product->id}}" data-mutiplicity="{{$product->multiplicity}}" id="button-minus"> &minus; </button>
              </div>
              <input type="text" class="form-control" id="qty-{{$product->id}}" value="{{$product->multiplicity}}">
              <div class="input-group-append">
                <button class="btn btn-light button-plus" type="button" data-product-id="{{$product->id}}" data-mutiplicity="{{$product->multiplicity}}" id="button-plus"> + </button>
              </div>
			  <div class="d-flex align-items-center mx-2">
							<span class="b dark">{{$product->multiplicity_unit}}</span>
				</div>
            </div>
			
          </div>
          <div class="form-group col-md">
              <div class="d-flex justify-content-around">

                <a href="#" class="btn btn-primary add-to-cart ml-2" data-product-id="{{$product->id}}">
                  <span class="text">{{__('l.add_to_cart')}}</span>
                  <i class="bi bi-cart4"></i>
                </a>
              </div>
          </div>
        </div>
      </article>
		</main>
	</div>
</div>

<article class="card mt-2 mb-2">
    <div class="card-body">
      <div class="row">
        <aside class="col-6">
          <dl class="row">
            <dt class="col-sm-6 price"> {{__('l.country_of_consignment')}}: </dt>
            <dd class="col-sm-6 b dark"> {{$product->countryOfConsignmentName}} </dd>
          </dl>
        </aside>
        <aside class="col-6">
          <dl class="row">
            <dt class="col-sm-6 price"> {{__('l.country_of_brand_registration')}}: </dt>
            <dd class="col-sm-6 b dark"> {{$product->countryOfBrandRegistrationName}}</dd>
          </dl>
        </aside>
      </div>
    </div>
      <hr class="m-0">
    <div class="card-body">
      <div class="row">
        <aside class="col-6">
          <dl class="row">
            <dt class="col-7 price">Размер верхнего душа (мм.)</dt>
            <dd class="col-5 b dark">200</dd>

            <dt class="col-7 price">Размер ручной лейки (мм.)</dt>
            <dd class="col-5 b dark">100</dd>

            <dt class="col-7 price">Длина кронштейна (мм.)</dt>
            <dd class="col-5 b dark">470</dd>

            <dt class="col-7 price">Длина шланга</dt>
            <dd class="col-5 b dark">150</dd>

            <dt class="col-7 price">Количество типов струи</dt>
            <dd class="col-5 b dark">4</dd>

            <dt class="col-7 price">Цвет</dt>
            <dd class="col-5 b dark">Хром</dd>
          </dl>
        </aside>
        <aside class="col-md-6">
          <dl class="row">

            <dt class="col-7 price">Материал</dt>
            <dd class="col-5 b dark">Латунь/Пластик</dd>

            <dt class="col-7 price">Оплетка шланга</dt>
            <dd class="col-5 b dark">Метал</dd>

            <dt class="col-7 price">Назначение</dt>
            <dd class="col-5 b dark">Для ванны</dd>

            <dt class="col-7 price">Система против скручивания шланга</dt>
            <dd class="col-5 b dark">Нет</dd>

            <dt class="col-7 price">Тип</dt>
            <dd class="col-5 b dark">Душевой гарнитур</dd>

            <dt class="col-7 price">Форма верхнего душа</dt>
            <dd class="col-5 b dark">Круглая</dd>
          </dl>
        </aside>
      </div>
    </div>
      <hr class="m-0">
    <div class="card-body">

          <p>{!!$product->description!!}</p>

    </div>
</article>
<article id="certificate" class="card mt-2 mb-2">
    <div class="card-body">
        <div class="text-center h4">Висновок державної санітарно-епідеміологічної експертизи</div>
        <div class="row">
          <div class="col-6">
            <img src="{{ asset('img/doc/1_1.jpg') }}" class="img-fluid">
          </div>
          <div class="col-6">
            <img src="{{ asset('img/doc/1_2.jpg') }}" class="img-fluid">
          </div>
        </div>
        <hr>
        <div class="text-center h4">Сертифікат відповідності</div>
        <div class="row">
          <div class="col-6">
            <img src="{{ asset('img/doc/2_1.jpg') }}" class="img-fluid">
          </div>
          <div class="col-6">

          </div>
        </div>

    </div>
</article>



