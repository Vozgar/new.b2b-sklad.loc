@extends('layouts.clear')

@section('content')
<div class="vw-100 vh-100 bg-login-img">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class=" mx-auto col-sm-8 col-md-8 col-lg-6 col-xl-4 col-xxl-4">
                <div class="bg-white p-4 border rounded text-center">
                <form class=" alidate-form" method="POST" action="{{ route('login') }}">
                    <span class="h2 text-primary ">
                    {{ __('Запит на зміну паролю') }}
                    </span>
                    @csrf
					<div class="p-4">
                        <input id="email" type="email" class="input100 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Пошта" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>

					<div class="d-grid gap-2 col-10 mx-auto">
                        <button type="submit" class="btn bg-blue white ">ВІДПРАВИТИ</button>
                    </div>
				</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
