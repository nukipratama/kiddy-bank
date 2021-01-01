@extends('userPanel.template.app',[
'title'=>'Balance'
])
@section('content')
<div class="container">
    <div class="row justify-content-center m-4">
        <div class="col-md-12 p-2">
            <div class="card shadow roundedCorner border-0 h-100">
                <div class="row justify-content-start">
                    <div class="col-md-4">
                        <div class="card bg-primary border-0 balanceOverlay">
                            <h4 class="h4 text-white font-weight-bold m-0 p-0">Balance</h4>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center text-center">
                    <div class="col-md-4 p-3">
                        <h6 class="font-weight-bold">Cash</h6>
                        <h5 class="mb-0 font-weight-bold"><small>Rp
                            </small>{{number_format($balance->cash , 0, ',', '.')}}</h5>
                    </div>
                    <div class="col-md-4 p-3">
                        <h6 class="font-weight-bold">Point</h6>
                        <h5 class="mb-0 font-weight-bold">{{number_format($balance->point , 0, ',', '.')}}<small>
                                Point</small></h5>
                    </div>
                    <div class="col-md-4 p-3">
                        <h6 class="font-weight-bold">Saving</h6>
                        <h5 class="mb-0 font-weight-bold"><small>Rp
                            </small>{{number_format($balance->saving , 0, ',', '.')}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center m-4">
        <div class="col-md-4 p-2 text-center">
            <img src="{{asset('img/illustration/illustration_treasure_svg.svg')}}" class="img-fluid">
        </div>
        <div class="col-md-8 p-2">
            <div class="card shadow roundedCorner border-0 h-100">
                <div class="row justify-content-start align-items-center">
                    <div class="col-md-6">
                        <div class="card bg-primary border-0 balanceOverlay">
                            <h4 class="h4 text-white font-weight-bold m-0 p-0">Transaction History</h4>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center h-100 p-3">
                    @if ($balanceHistory->total() == 0)
                    <div class="col-md-10 my-2">
                        <h4 class="text-center">Tidak ada Transaksi</h4>
                    </div>
                    @else
                    {{$balanceHistory->links()}}
                    @foreach ($balanceHistory as $item)
                    <div class="col-md-10 my-2">
                        <div class="card roundedCorner shadow border-0">
                            <div class="row m-0 align-items-center text-center p-2">
                                <div class="col-md-2">
                                    <img src="{{asset($item->icon)}}" class="img-fluid">
                                </div>
                                <div class="col-md-6 py-2">
                                    <h4 class="font-weight-bold m-0">{{$item->title}}</h4>
                                    <small class="font-weight-bold m-0 text-muted">8 Des 2020, 15:52</small>
                                </div>
                                <div class="col-md-4">
                                    @if ($item->addition)
                                    <h5 class="font-weight-bold text-success m-0">
                                        +{{$item->balance_type == 'Point' ? $item->addition.' Point' : 'Rp '.$item->addition}}
                                        <br>
                                        <small>{{$item->balance_type}}</small>
                                    </h5>
                                    @else
                                    <h5 class="font-weight-bold text-danger m-0">
                                        -{{$item->balance_type == 'Point' ? $item->expense.' Point' : 'Rp '.$item->expense}}
                                        <br>
                                        <small>{{$item->balance_type}}</small>
                                    </h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection