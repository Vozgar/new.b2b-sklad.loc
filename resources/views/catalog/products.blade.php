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
                @include('layouts.breakpoints_xxl.aside_filter_xxl')
                <main class="col-9">
                    @include('layouts.breakpoints_xxl.breadcrumb_xxl')
                    <div id="products_wrap">
                        @include('layouts.breakpoints_xxl.products_xxl')
                        {{-- @include('layouts.breakpoints_xxl.pagination_xxl') --}}
                        @include('layouts.breakpoints_xxl.modal_xxl')
                    </div>

                </main>
            </div>
        </div>
        @include('layouts.breakpoints_xxl.footer_xxl')
    </section>    
	
	<!-- breakpoints xl -->
    <section class="d-none d-xl-block d-xxl-none blueg">
        <header class="bg-white sticky-top">
            @include('layouts.breakpoints_xl.header_user_xl')
            @include('layouts.breakpoints_xl.header_search_xl')
            @include('layouts.breakpoints_xl.menu_xl')
        </header>
        <div class="container">
            <div class="row">
                @include('layouts.breakpoints_xl.aside_filter_xl')
                <main class="col-9">
                    @include('layouts.breakpoints_xl.breadcrumb_xl')
                    <div id="products_wrap">
                        @include('layouts.breakpoints_xl.products_xl')
                        {{-- @include('layouts.breakpoints_xl.pagination_xl') --}}
                        @include('layouts.breakpoints_xl.modal_xl')
                    </div>

                </main>
            </div>
        </div>
        @include('layouts.breakpoints_xl.footer_xl')
    </section>	
	
	
	<!-- breakpoints lg -->
    <section class="d-none d-lg-block d-xl-none">
        <header class="bg-white sticky-top">
            @include('layouts.breakpoints_lg.header_user_lg')
            @include('layouts.breakpoints_lg.header_search_lg')
            @include('layouts.breakpoints_lg.menu_lg')
        </header>
        <div class="container">
            <div class="row">
                @include('layouts.breakpoints_lg.aside_filter_lg')
                <main class="col-9">
                    @include('layouts.breakpoints_lg.breadcrumb_lg')
                    <div id="products_wrap">
                        @include('layouts.breakpoints_lg.products_lg')
                        {{-- @include('layouts.breakpoints_lg.pagination_lg') --}}
                        @include('layouts.breakpoints_lg.modal_lg')
                    </div>

                </main>
            </div>
        </div>
        @include('layouts.breakpoints_lg.footer_lg')
    </section>	
	
	<!-- breakpoints md -->
    <section class="d-none d-md-block d-lg-none">
        <header class="bg-white sticky-top">
            @include('layouts.breakpoints_md.header_user_md')
            @include('layouts.breakpoints_md.header_search_md')
            @include('layouts.breakpoints_md.menu_md')
        </header>
        <div class="container">
            <div class="row">
                @include('layouts.breakpoints_md.aside_filter_md')
                <main class="col-9">
                    @include('layouts.breakpoints_md.breadcrumb_md')
                    <div id="products_wrap">
                        @include('layouts.breakpoints_md.products_md')
                        {{-- @include('layouts.breakpoints_md.pagination_md') --}}
                        @include('layouts.breakpoints_md.modal_md')
                    </div> 

                </main>
            </div>
        </div>
        @include('layouts.breakpoints_md.footer_md')
    </section>	
	
	<!-- breakpoints sm --> 
    <section class="d-none d-sm-block d-md-none">
        <header class="bg-white sticky-top">
            @include('layouts.breakpoints_sm.header_user_sm')
            @include('layouts.breakpoints_sm.header_search_sm')
            @include('layouts.breakpoints_sm.menu_sm')
        </header>
        <div class="container">
            <div class="row">
                @include('layouts.breakpoints_sm.aside_filter_sm')
                <main class="col-9">
                    @include('layouts.breakpoints_sm.breadcrumb_sm')
                    <div id="products_wrap">
                        @include('layouts.breakpoints_sm.products_sm')
                        {{-- @include('layouts.breakpoints_sm.pagination_sm') --}}
                        @include('layouts.breakpoints_sm.modal_sm')
                    </div> 

                </main>
            </div>
        </div>
        @include('layouts.breakpoints_sm.footer_sm')
    </section>	
	
	
	<!-- breakpoints xs --> 
    <section class="d-block d-sm-none">
        <header class="bg-white sticky-top">
            @include('layouts.breakpoints_xs.header_user_xs')
            @include('layouts.breakpoints_xs.header_search_xs')
            @include('layouts.breakpoints_xs.menu_xs')
        </header>
		
    </section>

    <script src="{{ asset('js/filter.js') }}"></script>
    <script type="text/javascript">
        $(window).on('hashchange', function() {
            // if (window.location.hash) {
            //     var page = window.location.hash.replace('#', '');
            //     if (page == Number.NaN || page <= 0) {
            //         return false;
            //     } else {
            //         //getData(page);
            //     }
            // }
        });
        $(document).ready(function() {
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                $('li').removeClass('active');
                $(this).parent('li').addClass('active');
                var myurl = $(this).attr('href');
                var page = $(this).attr('href').split('page=')[1];
                getData(page);
            });
        });

        function getData(page) {
            $.ajax({
                    url: '?page=' + page+'&ids='+window.request_id,
                    type: "get",
                    datatype: "html"
                })
                .done(function(data) {
                    $("#products_wrap").empty().html(data);
                    location.hash = page;
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('No response from server');
                });
        }

    </script>
@endsection
