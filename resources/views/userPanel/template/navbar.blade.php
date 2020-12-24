<nav class="navbar navbar-expand-md navbar-light bg-transparent font-weight-bold m-0">
    <div class="container p-2">
        <div class="row align-items-center">
            <div class="col-2">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('img/logo/KB Logo Horizontal.png')}}" class="img-fluid">
                </a>
            </div>
            <button class="navbar-toggler ml-auto border-0" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse mt-4" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto font-weight-bold">
                    <li class="nav-item">
                        <a href="{{route('about')}}"
                            class="nav-link {{Route::currentRouteName() === 'about' ? 'active' : ''}}"">{{ __('About Us') }}</a>
                    </li>
                    <li class=" nav-item">
                            <a href="{{route('index')}}"
                                class="nav-link {{Route::currentRouteName() === 'index' ? 'active' : ''}}"">{{ __('Home') }}</a>
                    </li>
                    <li class=" nav-item">
                                <a href="{{route('shopping')}}"
                                    class="nav-link {{Route::currentRouteName() === 'shopping' ? 'active' : ''}}"">{{ __('Shopping') }}</a>
                    </li>
                    <li class=" nav-item">
                                    <a href="{{route('index')}}"
                                        class="nav-link {{Route::currentRouteName() === 'tracking' ? 'active' : ''}}"">{{ __('Tracking') }}</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->                
                <ul class=" navbar-nav ml-auto font-weight-bold">
                    <li class="nav-item px-2">
                        <a href="">
                            <img src="{{asset('img/icon/wallet.svg')}}" width="40px" class="img-fluid">
                        </a>
                    </li>
                    @guest
                    <li class="nav-item px-2">
                        <a href="{{route('login')}}" class="btn btn-primary text-white font-weight-bold borderButton">
                            Sign In
                        </a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item px-2">
                        <div class="dropdown show">
                            <a class="btn btn-primary text-white font-weight-bold borderButton dropdown-toggle"
                                role="button" id="dropdownAuth" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
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