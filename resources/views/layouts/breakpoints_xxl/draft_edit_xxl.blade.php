<div class="row  pb-5">
    <textarea id="draft_id" hidden>
        {{$draft->id}}
    </textarea>
	<article class="card  mb-2 sticky-top sticky-xxl">
		<div class="row ">
			<div class="col-6">
				<div class="mb-2">
				    <label class="form-label">{{__('l.search_product')}}</label>
    				{{-- <input type="text" class="form-control" placeholder="{{__('l.input_name_or_sku')}}..."> --}}
                    <select class="form-control select2" id="kt_select2_6" name="param">
                        <option label="Label"></option>
                    </select>

  				</div>
			</div>
			<div class="col-2">
				<label class="form-label">{{__('l.price')}}</label>
    				<div class="input-group ">
                    	<input type="text" class="form-control" id = "add_price" value="0.00">
                    	<span class="input-group-text pl-2" id="add_currency" style="max-width:55px;"> UAH </span>
          			</div>
			</div>
			<div class="col-2">
				<div class="mb-2">
				    <label class="form-label">{{__('l.qty')}}</label>
    				<input type="number" id = "add_qty" class="form-control" placeholder="1">
  				</div>
			</div>
            <input class="form-control"  id="add_id"  hidden
                            value="">

			<div class="col-2">
				<div class="mb-2">
				    <label class="form-label">{{__('l.add')}}</label>
    				<a href="javascript:void(0);" class="btn bg-blue white" id="add-product-to-draft"> {{__('l.add_product')}}</a>
  				</div>
			</div>

		</div>
		<hr class="m-0">
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
<div id="ajax_table" style="padding: unset">
    @include('layouts.breakpoints_xxl.draft_edit_table_xxl')
</div>







