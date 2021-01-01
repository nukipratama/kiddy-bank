@extends('adminPanel.template.layout',[
'title'=>'Add Task'
])
@section('content')
<div class="container mt-5">
    <div class="row p-2 align-items-center">
        <a href="{{route('admin.task.index')}}" class="text-dark">
            <h1 class="fas fa-arrow-left"></h1>
        </a>
        <h1 class="h1 mr-auto ml-auto">Add Task</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="pt-5" method="POST" action="{{ route('admin.task.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row justify-content-center">
                        <div class="col-md-8">
                            <input id="title" type="text"
                                class="form-control bg-light border-0 roundedCorner @error('title') is-invalid @enderror"
                                name="title" value="{{ old('title') }}" required autofocus placeholder="Title">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <div class="col-md-8">
                            <input id="pic_url" type="file"
                                class="form-control bg-light @error('pic_url') is-invalid @enderror" name="pic_url"
                                accept="image/x-png,image/gif,image/jpeg" required>
                            @error('pic_url')
                            <span class="invalid-feedback px-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <div class="col-md-8">
                            <textarea id="article" placeholder="Article" name="article"
                                class="form-control roundedCorner bg-light @error('article') is-invalid @enderror"
                                rows="5" required>{{old('article')}}</textarea>
                            @error('article')
                            <span class="invalid-feedback px-2 " role="alert">
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