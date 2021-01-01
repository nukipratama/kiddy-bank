@extends('adminPanel.template.layout',[
'title'=>'Edit Voucher'
])
@section('content')
<div class="container mt-5">
    <div class="row p-2 align-items-center">
        <a href="{{route('admin.voucher.index')}}" class="text-dark">
            <h1 class="fas fa-arrow-left"></h1>
        </a>
        <h1 class="h1 mr-auto ml-auto">Edit Voucher</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="pt-5" method="POST" action="{{ route('admin.voucher.update',['voucher'=>$voucher]) }}"
                    enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="form-group row justify-content-center">
                        <div class="col-md-8">
                            <input id="title" type="text"
                                class="form-control bg-light border-0 roundedCorner @error('title') is-invalid @enderror"
                                name="title" value="{{ old('title') }}{{$voucher->title}}" required autofocus
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
                            <input id="reward" type="text"
                                class="form-control bg-light border-0 roundedCorner @error('reward') is-invalid @enderror"
                                name="reward" value="{{ old('reward') }}{{$voucher->reward}}" required autofocus
                                placeholder="Reward">
                            @error('reward')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <div class="col-md-4">
                            <input id="price" type="number"
                                class="form-control bg-light border-0 roundedCorner @error('price') is-invalid @enderror"
                                name="price" value="{{ old('price') }}{{$voucher->price}}" required autofocus
                                placeholder="Price">

                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <select
                                class="form-control bg-light border-0 roundedCorner @error('unit') is-invalid @enderror"
                                id="unit" name="unit" required>
                                <option value="Point">Point</option>
                                <option value="Cash">Cash</option>
                            </select>
                            @error('unit')
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
                            <textarea id="description" placeholder="Description" name="description"
                                class="form-control roundedCorner bg-light @error('description') is-invalid @enderror"
                                rows="5" required>{{old('description')}}{{$voucher->description}}</textarea>
                            @error('description')
                            <span class="invalid-feedback px-2 " role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <div class="col-md-8">
                            <input id="code" type="text"
                                class="form-control bg-light border-0 roundedCorner @error('code') is-invalid @enderror"
                                name="code" value="{{ old('code') }}{{$voucher->code}}" required autofocus
                                placeholder="Voucher Code">

                            @error('code')
                            <span class="invalid-feedback" role="alert">
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