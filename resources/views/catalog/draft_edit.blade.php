@extends('layouts.app')

@section('content')

<!-- breakpoints xxl -->
<section class="d-none d-xxl-block section-content pt-0">
    <header class="bg-white sticky-top">
        @include('layouts.breakpoints_xxl.header_user_xxl')
        @include('layouts.breakpoints_xxl.header_search_xxl')
        @include('layouts.breakpoints_xxl.menu_xxl')
    </header>
    <div class="container">
        <div class="row">
            @include('layouts.breakpoints_xxl.aside_draft_edit_xxl')
            <main class="col-9">
                @include('layouts.breakpoints_xxl.draft_edit_xxl')
            </main>
                @include('layouts.breakpoints_xxl.modal_xxl')
        </div>
    </div>
    <span class="fixed-bottom">
        @include('layouts.breakpoints_xxl.footer_xxl')
    </span>
</section>


@endsection

{{-- @section('scripts')
<script src="{{ asset('js/select2.js') }}"></script>
@endsection --}}
