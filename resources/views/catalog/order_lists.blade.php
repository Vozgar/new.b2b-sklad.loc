@extends('layouts.app')

@section('content')


<!-- breakpoints xxl -->
<section class="d-none d-xxl-block">
    <header class="bg-white sticky-top">
        @include('layouts.breakpoints_xxl.header_user_xxl') 
        @include('layouts.breakpoints_xxl.header_search_xxl')
        @include('layouts.breakpoints_xxl.menu_xxl')  
    </header>
    <div class="container">
        <div class="row">
            <main class="col-12">
               @include('layouts.breakpoints_xxl.order_lists_xxl')
               @include('layouts.breakpoints_xxl.modal_xxl')
            </main>            
        </div>    
    </div>
        <span class="fixed-bottom">
        @include('layouts.breakpoints_xxl.footer_xxl')  
    </span>
</section>

	<!-- breakpoints xs --> 
    <section class="d-block d-sm-none">
        <header class="bg-white sticky-top">
            @include('layouts.breakpoints_xs.header_user_xs')
            @include('layouts.breakpoints_xs.header_search_xs')
            @include('layouts.breakpoints_xs.menu_xs')
        </header>
		@include('layouts.breakpoints_xs.footer_xs')
    </section>

@endsection

