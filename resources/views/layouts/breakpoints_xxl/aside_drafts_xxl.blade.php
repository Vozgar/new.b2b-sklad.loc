<aside class="col-md-3">
	<div class="card sticky-top sticky-xxl">
    		<div class="card m-1 p-2 bg-light">
				<input type="text" class="form-control" id="draft_name">
				<div class="form-text b text-center" >{{__('l.input_name_of_draft')}}</div>
				<a class="btn btn-outline-primary mt-2" id="create_draft" href="javascript:void(0);">{{__('l.create_draft')}}</a>
			</div>
    <div class="card mt-2 m-1">
    <label for="draft" class="form-label b text-center pt-2">{{__('l.my_drafts')}}</label>
      <div class="nav flex-column nav-pills p-1" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          @foreach ($drafts as $draft)
            <button
            class="nav-link text-start nav-draft @if ($loop->first) active @endif"
            id="v-pills-{{$draft->id}}-tab"
            data-bs-toggle="pill"
            data-bs-target="#v-pills-{{$draft->id}}"
            data-draft-id="{{$draft->id}}"
            type="button"
            role="tab"
            aria-controls="v-pills-{{$draft->id}}"
            aria-selected="false">{{$draft->name}}</button>
          @endforeach
        {{-- <button class="nav-link text-start active" id="v-pills-1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-1" type="button" role="tab" aria-controls="v-pills-1" aria-selected="true">Первый </button>
        <button class="nav-link text-start" id="v-pills-2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-2" type="button" role="tab" aria-controls="v-pills-2" aria-selected="false">На вторник</button>
        <button class="nav-link text-start" id="v-pills-3-tab" data-bs-toggle="pill" data-bs-target="#v-pills-3" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Под заказ</button> --}}
      </div>
    </div>


  </div>
</aside>
