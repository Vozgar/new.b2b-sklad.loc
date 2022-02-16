
<!-- breakpoints xxl -->
<section class="d-none d-xxl-block section-content pt-0">
    <div class="container">
        <div class="row cart-items">
			@include('layouts.breakpoints_xxl.cart_body_xxl')
        </div>
    </div>
</section>


<!-- breakpoints xl  -->
<section class="d-none d-xl-block d-xxl-none section-content pt-0">
    <div class="container">
        <div class="row cart-items">
            @include('layouts.breakpoints_xl.cart_body_xl')
        </div>
    </div>
</section>


<!-- breakpoints lg -->
<section class="d-none d-lg-block d-xl-none bg-warning section-content pt-0">
    <div class="container">
        <div class="row cart-items">
            @include('layouts.breakpoints_lg.cart_body_lg')
        </div>
    </div>
</section>


<!-- breakpoints md -->
<section class="d-none d-md-block d-lg-none bg-info section-content pt-0">
    <div class="container">
        <div class="row cart-items">
			@include('layouts.breakpoints_md.cart_body_md')
        </div>
    </div>
</section>


<!-- breakpoints sm -->
<section class="d-none d-sm-block d-md-none bg-dark section-content pt-0">
    <div class="container">
        <div class="row cart-items">
			@include('layouts.breakpoints_sm.cart_body_sm')
        </div>
    </div>

</section>


<!-- breakpoints xs -->
<section class="d-block d-sm-none">
    <div class="container">
        <div class="row cart-items">
			@include('layouts.breakpoints_xs.cart_body_xs')
        </div>
    </div>
</section>
