@extends('userPanel.template.app',[
'title'=>$voucher->title
])
@section('content')
<div class="container h-100 p-4 my-2">
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block w-100">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="row p-2 align-items-center">
        <a href="{{route('shopping')}}" class="text-dark">
            <h1 class="fas fa-arrow-left"></h1>
        </a>
        <h1 class="h1 mr-auto ml-auto">{{$voucher->title}}</h1>
        @if (!$voucher->claim_user_id)
        <form action="{{route('vouchers.claim',['voucher'=>$voucher])}}" method="POST"> @csrf
            <button type="submit" class="btn btn-primary text-white font-weight-bold borderButton">Claim</button>
        </form>
        @endif
    </div>
    <div class="row p-2 justify-content-center align-items-center">
        <div class="col-md-2 text-center">
            <img src="{{asset($voucher->pic_url)}}" class="img-fluid">
        </div>
    </div>
    <div class="row p-2 justify-content-center align-items-center">
        <div class="col-md-8 text-justify">
            <p class="font-weight-bold">{{$voucher->description}}</p>
        </div>
    </div>
</div>
@endsection