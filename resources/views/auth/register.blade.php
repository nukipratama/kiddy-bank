@extends('userPanel.template.app',[
'title'=>'Sign-up'
])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg roundedCorner border-0">
                <div class="card-body pt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6 align-items-center">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-10">
                                        <h2 class="h2 font-weight-bold">Sign-up</h2>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-10">
                                        <input id="name" type="text"
                                            class="form-control bg-light border-0 roundedCorner @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" required autofocus
                                            placeholder="Full Name">

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">
                                    <div class="col-md-10">
                                        <input id="username" type="text"
                                            class="form-control bg-light border-0 roundedCorner @error('username') is-invalid @enderror"
                                            name="username" value="{{ old('username') }}" required autofocus
                                            placeholder="Username">

                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">
                                    <div class="col-md-10">
                                        <input id="password" type="password"
                                            class="form-control bg-light border-0 roundedCorner @error('password') is-invalid @enderror"
                                            name="password" required placeholder="Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">
                                    <div class="col-md-10">
                                        <input id="parent_phone" type="number"
                                            class="form-control bg-light border-0 roundedCorner @error('parent_phone') is-invalid @enderror"
                                            name="parent_phone" required placeholder="Parent Home Number">
                                        @error('parent_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">
                                    <div class="col-md-10">
                                        <button type="submit"
                                            class="btn btn-primary w-100 text-white font-weight-bold roundedCorner">
                                            {{ __('Sign Up') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 text-center">
                            <img class="img-fluid w-75" src="{{asset('img/illustration/illustration_3 kids_svg.svg')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection