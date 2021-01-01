@extends('adminPanel.template.layout',[
'title'=>'Detail Voucher'
])
@section('content')
<div class="container mt-5">
    <div class="row p-2 align-items-center">
        <a href="{{route('admin.voucher.index')}}" class="mr-auto">
            <h1 class="fas fa-arrow-left text-dark"></h1>
        </a>
        <h1 class="h1 mr-auto">{{$voucher->title}}</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <img src="{{asset($voucher->pic_url)}}" class="img-fluid">
        </div>
        <div class="col-md-4">
            <p class="p text-justify"><b>Price :</b> {{$voucher->price.' '.$voucher->unit}}
                <br><b>Code :</b> {{$voucher->code}}
                <br><b>Claimed By :</b> {{$voucher->user ? $voucher->user->name : '-'}}
                <br><b>Description :</b> {{$voucher->description}}
            </p>
        </div>
    </div>

</div>
@endsection