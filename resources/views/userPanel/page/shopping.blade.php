@extends('userPanel.template.app',[
'title'=>'Shopping'
])
@section('content')
<div class="container h-100 p-4 my-2">
    <div class="row">
        <h2 class="font-weight-bold px-4">Available Vouchers</h2>
    </div>
    <div class="row justify-content-center align-items-center ">
        <div class="col-md-10">
            <div class="row justify-content-center align-items-center ">
                @foreach ($voucher as $item)
                <div class="col-md-3 py-2 px-4">
                    <div class="card shadow border-0 roundedCorner text-center h-100">
                        <img class="card-img-top ml-auto mr-auto" src="{{asset($item->pic_url)}}" style="height:150px">
                        <div class="card-body ">
                            <h6 class="card-title font-weight-bold">{{$item->title}}</h6>
                            <h6 class="card-title font-weight-bold">{{$item->reward}}</h6>
                            <a href="{{route('vouchers.detail',['voucher'=>$item])}}"
                                class="btn btn-primary roundedCorner text-white w-100 font-weight-bold">{{$item->price .' '.$item->unit}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
                {{$voucher->links()}}
            </div>
        </div>
    </div>
</div>
@endsection