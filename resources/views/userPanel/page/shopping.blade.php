@extends('userPanel.template.app',[
'title'=>'Shopping'
])
@section('content')
<div class="container h-100">
    {{-- top sales --}}
    <div class="p-4 my-2">
        <div class="row">
            <h2 class="h2 font-weight-bold px-4">Top Sales</h2>
        </div>
        <div class="row justify-content-center align-items-center">
            @for ($i = 0; $i < 4; $i++) <div class="col-md-3 py-2 px-4">
                <div class="card shadow border-0 roundedCorner text-center ">
                    <img class="card-img-top ml-auto mr-auto" src="{{asset('img/logo/tokopedia.png')}}"
                        style="width:100px">
                    <div class="card-body ">
                        <h6 class="card-title font-weight-bold">Cashback Tokopedia</h6>
                        <h6 class="card-title font-weight-bold">Rp100.000</h6>
                        <a href="#" class="btn btn-primary roundedCorner text-white w-100 font-weight-bold">75 point</a>
                    </div>
                </div>
        </div>
        @endfor
    </div>
</div>
{{-- entertainment --}}
<div class="p-4 my-2">
    <div class="row">
        <h2 class="h2 font-weight-bold px-4">Entertainment</h2>
    </div>
    <div class="row justify-content-center align-items-center">
        @for ($i = 0; $i < 4; $i++) <div class="col-md-3 py-2 px-4">
            <div class="card shadow border-0 roundedCorner text-center ">
                <img class="card-img-top ml-auto mr-auto" src="{{asset('img/logo/tokopedia.png')}}" style="width:100px">
                <div class="card-body ">
                    <h6 class="card-title font-weight-bold">Cashback Tokopedia</h6>
                    <h6 class="card-title font-weight-bold">Rp100.000</h6>
                    <a href="#" class="btn btn-primary roundedCorner text-white w-100 font-weight-bold">75 point</a>
                </div>
            </div>
    </div>
    @endfor
</div>
</div>
</div>
@endsection