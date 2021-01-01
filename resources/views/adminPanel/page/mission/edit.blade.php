@extends('adminPanel.template.layout',[
'title'=>'Edit Mission'
])
@section('content')
<div class="container mt-5">
    <div class="row p-2 align-items-center">
        <a href="{{route('admin.mission.index')}}" class="text-dark">
            <h1 class="fas fa-arrow-left"></h1>
        </a>
        <h1 class="h1 mr-auto ml-auto">Edit Mission</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="pt-5" method="POST" action="{{ route('admin.mission.update',['mission'=>$mission]) }}"
                    enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="form-group row justify-content-center">
                        <div class="col-md-8">
                            <input id="title" type="text"
                                class="form-control bg-light border-0 roundedCorner @error('title') is-invalid @enderror"
                                name="title" value="{{ old('title') }}{{$mission->title}}" required autofocus
                                placeholder="Title">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <div class="col-md-8">
                            <input id="amount" type="number"
                                class="form-control bg-light border-0 roundedCorner @error('amount') is-invalid @enderror"
                                name="amount" value="{{ old('amount') }}{{$mission->amount}}" required autofocus
                                placeholder="Amount">
                            @error('amount')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="col-md-8">
                            <input id="reward" type="number"
                                class="form-control bg-light border-0 roundedCorner @error('reward') is-invalid @enderror"
                                name="reward" value="{{ old('reward') }}{{$mission->reward}}" required autofocus
                                placeholder="Reward">
                            @error('reward')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <div class="col-md-8">
                            <input id="icon" type="file"
                                class="form-control bg-light @error('icon') is-invalid @enderror" name="icon"
                                accept="image/x-png,image/gif,image/jpeg" required>
                            @error('icon')
                            <span class="invalid-feedback px-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <div class="col-md-8">
                            <button type="submit"
                                class="btn btn-primary w-100 text-white font-weight-bold roundedCorner">
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection