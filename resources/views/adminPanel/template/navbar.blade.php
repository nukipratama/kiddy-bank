<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold" href="{{route('admin.home')}}">Admin KiddyBank</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center font-weight-bold" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
            <a href="{{route('admin.home')}}" class=" nav-item nav-link
                {{Route::currentRouteName() === 'admin.home' ? 'active' : ''}}"">
                <i class=" fas fa-home"></i> Home
            </a>
            <a href="{{route('admin.users')}}" class=" nav-item nav-link
                {{Route::currentRouteName() === 'admin.users' ? 'active' : ''}}"">
                <i class=" fas fa-users"></i> Users
            </a>
            <a href="{{route('admin.task.index')}}" class="nav-item nav-link 
            {{Route::currentRouteName() === 'admin.task.index' ? 'active' : ''}}"">
                <i class=" fas fa-book"></i> Task
            </a>
            <a href="{{route('admin.mission.index')}}" class="nav-item nav-link 
            {{Route::currentRouteName() === 'admin.mission.index' ? 'active' : ''}}"">
                <i class=" fas fa-tasks"></i> Mission
            </a>
            <a href="{{route('admin.voucher.index')}}" class="nav-item nav-link 
            {{Route::currentRouteName() === 'admin.voucher.index' ? 'active' : ''}}"">
                <i class=" fas fa-gift"></i> Voucher
            </a>
            <a href="{{route('admin.topup')}}" class="nav-item nav-link 
            {{Route::currentRouteName() === 'admin.topup' ? 'active' : ''}}"">
                <i class=" fas fa-wallet"></i> Top-up
            </a>
            <a href="{{url('/logout')}}" class="nav-item nav-link">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>
</nav>