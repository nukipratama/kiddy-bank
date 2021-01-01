@extends('userPanel.template.app',[
'title'=>'Vouchers'
])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 p-2">
            <div class="card shadow roundedCorner border-0 h-100">
                <div class="row justify-content-start">
                    <div class="col-md-6">
                        <div class="card bg-primary border-0 balanceOverlay">
                            <h4 class="h4 text-white font-weight-bold m-0 p-0">My Vouchers</h4>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center text-center">
                    <div class="col-md-12">
                        <table class="table table-light text-center ">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Reward</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vouchers as $item)
                                <tr>
                                    <th scope="row">
                                        {{($vouchers ->currentpage()-1) * $vouchers ->perpage() + $loop->index + 1}}
                                    </th>
                                    <td class="font-weight-bold">
                                        <a class="text-secondary"
                                            href="{{route('vouchers.detail',['voucher'=>$item])}}">
                                            {{$item->title}}
                                        </a>
                                    </td>
                                    <td>{{$item->reward}}</td>
                                    <td>
                                        {{$item->unit == 'Cash' ? 'Rp'.number_format($item->price , 0, ',', '.') : $item->price.' '.$item->unit }}
                                    </td>
                                    <td class="font-weight-bold">{{$item->code}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$vouchers->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection