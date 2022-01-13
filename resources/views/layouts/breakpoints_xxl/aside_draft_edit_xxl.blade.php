<aside class="col-md-3">
	<div class="card sticky-top sticky-xxl">
      <header class="card-header">
        <div class="row">
          <div class="input-group ">

              <input type="text" class="form-control" value="{{$draft->name}}">

              <span class="input-group-text"><i class="bi bi-pencil-square"></i></span>
          </div>
        </div>

      </header>
    		<div class="card m-1 p-2 bg-light">
			    <a href="javascript:void(0);" class="btn bg-green white" id="copy-draft" data-draft-id = "{{$draft->id}}">{{__('l.copy_draft')}}</a>
			  </div>
        <div class="card m-1 p-2 bg-light">
			    <a href="javascript:void(0);" class="btn bg-red white" id="delete-draft" data-draft-id = "{{$draft->id}}">{{__('l.delete_draft')}}</a>
			  </div>
        <div class="card m-1 p-2 bg-light">
			    <a href="javascript:void(0);" class="btn bg-blue white" id="add-draft-to-order" data-draft-id = "{{$draft->id}}">{{__('l.add_draft_to_order')}}</a>
			  </div>



  </div>
</aside>
