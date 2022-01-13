    <nav class="navbar navbar-expand bg-grey header-user-xxl">
        <?php
                        $user = auth()->user();
                    ?>
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-link b">$28,40</li>
                <li class="nav-link b">€34,40</li>
               
            </ul>
            <ul class="navbar-nav ">
                 <li class="nav-link blue b">|</li>
                <li class="nav-item dropdown b">
                    <?php $locale = Session::get('locale'); ?>
                    @if ($locale == 'ua')
                        <a href="{{ route('locale', ['locale' => 'ua']) }}" class="nav-link dropdown-toggle blue b text-uppercase"
                            id="navbarDogovor" role="button" data-bs-toggle="dropdown" aria-expanded="false">UKR</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDogovorLink">
                            <li>
                                <a class="dropdown-item blue b text-uppercase" href="{{ route('locale', ['locale' => 'ru']) }}">RUS</a>
                            </li>
                        </ul>
                    @else
                        <a href="{{ route('locale', ['locale' => 'ru']) }}" class="nav-link dropdown-toggle blue b text-uppercase"
                           id="navbarDogovor" role="button" data-bs-toggle="dropdown" aria-expanded="false">RUS</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDogovorLink">
                            <li>
                                <a class="dropdown-item blue b text-uppercase" href="{{ route('locale', ['locale' => 'ua']) }}">UKR</a>
                            </li>
                        </ul>
                    @endif
                </li>

                <li class="nav-link blue b">|</li>

                <li class="nav-item">
                    <a class="nav-link blue b" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                                <i class="bi bi-box-arrow-right"></i></a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    {{-- <a href="#" class="nav-link blue b"><i class="bi bi-box-arrow-right"></i> {{ __('l.logout') }}</a> --}}
                </li>
            </ul>
        </div>
    </nav>

