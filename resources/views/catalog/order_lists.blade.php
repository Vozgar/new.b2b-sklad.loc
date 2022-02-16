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


<!-- breakpoints xl -->
<section class="d-none d-xl-block d-xxl-none bg-danger">
    <header class="bg-white sticky-top">
        @include('layouts.breakpoints_xl.header_user_xl') 
        @include('layouts.breakpoints_xl.header_search_xl')
        @include('layouts.breakpoints_xl.menu_xl')  
    </header>
    <div class="container">
        <div class="row">
            <main class="col-12">
               @include('layouts.breakpoints_xl.order_lists_xl')
               @include('layouts.breakpoints_xl.modal_xl')
            </main>            
        </div>    
    </div>
        <span class="fixed-bottom">
        @include('layouts.breakpoints_xl.footer_xl')  
    </span>
</section>


<!-- breakpoints lg -->
<section class="d-none d-lg-block d-xl-none bg-warning">
    <header class="bg-white sticky-top">
        @include('layouts.breakpoints_lg.header_user_lg') 
        @include('layouts.breakpoints_lg.header_search_lg')
        @include('layouts.breakpoints_lg.menu_lg')  
    </header>
    <div class="container">
        <div class="row">
            <main class="col-12">
               @include('layouts.breakpoints_lg.order_lists_lg')
               @include('layouts.breakpoints_lg.modal_lg')
            </main>            
        </div>    
    </div>
        <span class="fixed-bottom">
        @include('layouts.breakpoints_lg.footer_lg')  
    </span>
</section>


<!-- breakpoints md -->
<section class="d-none d-md-block d-lg-none bg-info">
    <header class="bg-white sticky-top">
        @include('layouts.breakpoints_md.header_user_md') 
        @include('layouts.breakpoints_md.header_search_md')
        @include('layouts.breakpoints_md.menu_md')  
    </header>
    <div class="container">
        <div class="row">
            <main class="col-12">
               @include('layouts.breakpoints_md.order_lists_md')
               @include('layouts.breakpoints_md.modal_md')
            </main>            
        </div>    
    </div>
        <span class="fixed-bottom">
        @include('layouts.breakpoints_md.footer_md') 
    </span>
</section>


<!-- breakpoints sm -->
<section class="d-none d-sm-block d-md-none bg-dark">
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

