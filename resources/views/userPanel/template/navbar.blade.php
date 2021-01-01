<nav class="navbar navbar-expand-md navbar-light bg-transparent font-weight-bold m-0">
    <div class="container p-2">
        <div class="row align-items-center">
            <div class="col-4 col-md-2">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('img/logo/KB Logo Horizontal.png')}}" class="img-fluid">
                </a>
            </div>
            <button class="navbar-toggler ml-auto border-0" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse mt-4 text-center" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto font-weight-bold">
                    @guest
                    <li class="nav-item">
                        <a href="{{route('about')}}"
                            class="nav-link {{Route::currentRouteName() === 'about' ? 'active' : ''}}"">{{ __('About Us') }}</a>
                    </li>
                    @endguest
                    <li class=" nav-item">
                            <a href="{{route('home')}}"
                                class="nav-link {{Route::currentRouteName() === 'home' ? 'active' : ''}}"">{{ __('Home') }}</a>
                    </li>
                    <li class=" nav-item">
                                <a href="{{route('shopping')}}"
                                    class="nav-link {{Route::currentRouteName() === 'shopping' ? 'active' : ''}}"">{{ __('Shopping') }}</a>
                    </li>
                    <li class=" nav-item">
                                    <a href="{{route('tracking')}}"
                                        class="nav-link {{Route::currentRouteName() === 'tracking' ? 'active' : ''}}"">{{ __('Tracking') }}</a>
                    </li>
                    <li class=" nav-item">
                                        <a href="{{route('balance.topup')}}"
                                            class="nav-link {{Route::currentRouteName() === 'balance.topup' ? 'active' : ''}}"">{{ __('Topup') }}</a>
                    </li>
                    <li class=" nav-item">
                                            <a href="{{route('vouchers.index')}}"
                                                class="nav-link {{Route::currentRouteName() === 'vouchers.index' ? 'active' : ''}}"">{{ __('Vouchers') }}</a>
                </li>
                <li class=" nav-item">
                                                <a href="{{route('saving.index')}}"
                                                    class="nav-link {{Route::currentRouteName() === 'saving.index' ? 'active' : ''}}"">{{ __('Saving') }}</a>
                </li>
                </ul>

                <!-- Right Side Of Navbar -->                
                <ul class=" navbar-nav ml-auto font-weight-bold">
                                                    @guest
                    <li class="nav-item px-2">
                        <a href="{{route('login')}}" class="btn btn-primary font-weight-bold borderButton">
                            Sign In
                        </a>
                    </li>
                    @endguest
                    @auth
                    <li class=" nav-item px-2">
                        <a href="{{route('balance.index')}}" class="px-2 d-inline">
                            <img src="{{asset('img/icon/wallet.svg')}}" width="40px" class="img-fluid">
                        </a>
                        <div class="dropdown show d-inline">
                            <a class="btn btn-primary font-weight-bold borderButton dropdown-toggle" role="button"
                                id="dropdownAuth" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hi, {{Auth::user()->profile->first_name}}
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownAuth">
                                <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
                            </div>
                        </div>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>