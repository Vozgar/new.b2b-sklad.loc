@foreach ($draft->items as $item)
    <article class="card card-body-cart mb-2">
        <a href="#" class="title blue text-decoration-none b pb-2">{{$item->product->name}} </a>
                <div class="row align-items-center">
                    <div class="col-5">
                        <figure class="itemside">
                            <div class="aside"><img src="{{$item->product->main_picture}}" class="border img-sm"></div>
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
                        <div class="price-dark h5"> {{$item->personalPrice}} {{$item->personalPriceCurrency}} </div>
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
                        <?php
            $fmt = new NumberFormatter( 'en-CA', NumberFormatter::PATTERN_DECIMAL, "* #####.00 ;(* #####.00)");
            $res = $item->product->personal_price*$item->qty;
            $sum = $fmt->format($res);
        ?>
                        <div class="price-dark h5"> {{$sum}} {{$item->product->personal_price_currency}} </div>
                    </div>
                    <div class="col flex-grow-0 text-right">
                        {{-- <a href="#" class="btn btn-outline-danger"> <i class="bi bi-trash-fill"></i> </a> --}}
                        <button class="btn btn-outline-danger delete-draft-row" data-row-id = "{{$item->id}}"> <i class="bi bi-trash-fill"></i> </button>
                    </div>
                </div>
        </article>
    @endforeach
