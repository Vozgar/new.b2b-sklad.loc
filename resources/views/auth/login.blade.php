@extends('layouts.clear')


@section('content')
    <div class="vw-100 vh-100 bg-login-img">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class=" mx-auto col-sm-8 col-md-8 col-lg-6 col-xl-4 col-xxl-4">
                    <div class="bg-white p-4 border rounded text-center">
                        <form class="validate-form" method="POST" action="{{ route('login') }}">
                            <span class="h2 text-primary text-uppercase">
                                {{ __('b2b-sklad.com') }}
                            </span>
                            @csrf
                            <div class="p-3">
                                <input id="email" type="email" class=" form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Пошта" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="p-3">
                                <input id="password" type="password"
                                    class=" form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password" placeholder="Пароль">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div>
                                <div class="d-flex justify-content-center">
                                    <div>
                                        <input type="checkbox" class="custom-control-input" id="remember_me"
                                            name="remember_me">
                                        <label class="custom-control-label pr-2" for="remember_me">Запам'ятати
                                            мене</label>
                                        <button type="submit" class="ms-3 btn bg-blue white">ВХІД</button>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">
                                            {{ __('Відновити пароль') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
