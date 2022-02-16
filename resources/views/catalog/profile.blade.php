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
            {{-- @include('layouts.breakpoints_xxl.aside_drafts_xxl') --}}
            <main class="col-9">
                @include('layouts.breakpoints_xxl.profile_xxl')
            </main>
                @include('layouts.breakpoints_xxl.modal_xxl')
        </div>
    </div>
    <span class="fixed-bottom">
        @include('layouts.breakpoints_xxl.footer_xxl')
    </span>
</section>


<!-- breakpoints xl -->
<section class="d-none d-xl-block d-xxl-none bg-danger section-content pt-0">
    <header class="bg-white sticky-top">
        @include('layouts.breakpoints_xl.header_user_xl')
        @include('layouts.breakpoints_xl.header_search_xl')
        @include('layouts.breakpoints_xl.menu_xl')
    </header>
    <div class="container">
        <div class="row">
            {{-- @include('layouts.breakpoints_xl.aside_drafts_xl') --}}
            <main class="col-9">
                @include('layouts.breakpoints_xl.profile_xl')
            </main>
                @include('layouts.breakpoints_xl.modal_xl')
        </div>
    </div>
    <span class="fixed-bottom">
        @include('layouts.breakpoints_xl.footer_xl')
    </span>
</section>


<!-- breakpoints lg -->
<section class="d-none d-lg-block d-xl-none bg-warning section-content pt-0">
    <header class="bg-white sticky-top">
        @include('layouts.breakpoints_lg.header_user_lg')
        @include('layouts.breakpoints_lg.header_search_lg')
        @include('layouts.breakpoints_lg.menu_lg')
    </header>
    <div class="container">
        <div class="row">
            {{-- @include('layouts.breakpoints_lg.aside_drafts_lg') --}}
            <main class="col-9">
                @include('layouts.breakpoints_lg.profile_lg')
            </main>
                @include('layouts.breakpoints_lg.modal_lg')
        </div>
    </div>
    <span class="fixed-bottom">
        @include('layouts.breakpoints_lg.footer_lg')
    </span>
</section>


<!-- breakpoints md -->
<section class="d-none d-md-block d-lg-none bg-info section-content pt-0">
    <header class="bg-white sticky-top">
        @include('layouts.breakpoints_md.header_user_md')
        @include('layouts.breakpoints_md.header_search_md')
        @include('layouts.breakpoints_md.menu_md')
    </header>
    <div class="container">
        <div class="row">
            {{-- @include('layouts.breakpoints_md.aside_drafts_md') --}}
            <main class="col-9">
                @include('layouts.breakpoints_md.profile_md')
            </main>
                @include('layouts.breakpoints_md.modal_md')
        </div>
    </div>
    <span class="fixed-bottom">
        @include('layouts.breakpoints_md.footer_md')
    </span>
</section>


<!-- breakpoints sm -->
<section class="d-none d-sm-block d-md-none bg-dark section-content pt-0">
    <header class="bg-white sticky-top">
        @include('layouts.breakpoints_sm.header_user_sm')
        @include('layouts.breakpoints_sm.header_search_sm')
        @include('layouts.breakpoints_sm.menu_sm')
    </header>
    <div class="container">
        <div class="row">
            {{-- @include('layouts.breakpoints_sm.aside_drafts_sm') --}}
            <main class="col-9">
                @include('layouts.breakpoints_sm.profile_sm')
            </main>
                @include('layouts.breakpoints_sm.modal_sm')
        </div>
    </div>
    <span class="fixed-bottom">
        @include('layouts.breakpoints_sm.footer_sm')
    </span>
</section>


<!-- breakpoints xs -->
<section class="d-block d-sm-none section-content pt-0">
    <header class="bg-white sticky-top">
        @include('layouts.breakpoints_xs.header_user_xs')
        @include('layouts.breakpoints_xs.header_search_xs')
        @include('layouts.breakpoints_xs.menu_xs')
    </header>
    <div class="container">
        <div class="row">
            {{-- @include('layouts.breakpoints_xs.aside_drafts_xs') --}}
            <main class="col-9">
                @include('layouts.breakpoints_xs.profile_xs')
            </main>
                @include('layouts.breakpoints_xs.modal_xs')
        </div>
    </div>
    <span class="fixed-bottom">
        @include('layouts.breakpoints_xs.footer_xs')
    </span>
</section>

<script src="{{ asset('js/script.js') }}"></script>
@endsection

