@extends('userPanel.template.app',[
'title'=>'Topup'
])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 p-2">
            <div class="card shadow roundedCorner border-0">
                <div class="row justify-content-start">
                    <div class="col-md-8">
                        <div class="card bg-primary border-0 balanceOverlay">
                            <h4 class="h4 text-white font-weight-bold m-0 p-0">Top-up</h4>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center text-center p-3">
                    <div class="col-md-12 text-center">
                        <p class="m-0"><b><u>Beneficiary Account</u></b>
                            <br><b>122-13-1233-01</b>
                            <br>Bank Central Asia
                            <br>PT. KiddyBank
                        </p>
                    </div>
                    <div class="col-md-6 p-3">
                        <h4 class="font-weight-bold mb-0"><small>Rp </small>100.000</h4>
                    </div>
                    <div class="col-md-6 p-3">
                        <form action="{{route('balance.topup.add')}}" method="POST"> @csrf
                            <input type="hidden" name="amount" value="100000">
                            <button class="btn btn-primary text-white font-weight-bold w-100">Top-up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 p-2">
            <div class="card shadow roundedCorner border-0">
                <div class="row justify-content-start">
                    <div class="col-md-6">
                        <div class="card bg-primary border-0 balanceOverlay">
                            <h4 class="h4 text-white font-weight-bold m-0 p-0">Topup Status</h4>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center text-center">
                    <div class="col-md-12">
                        <table class="table table-light text-center">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topup as $item)
                                <tr>
                                    <th scope="row">
                                        {{($topup ->currentpage()-1) * $topup ->perpage() + $loop->index + 1}}
                                    </th>
                                    <td>{{$item->created_at->format('d/m/Y - h:m:s')}}</td>
                                    <td>Rp {{number_format($item->amount , 0, ',', '.')}}</td>
                                    <td class="font-weight-bold">{{$item->status}}</td>
                                    <td class="font-weight-bold m-0 p-0">
                                        @switch($item->status)
                                        @case('Waiting Payment Proof')
                                        <a href=" {{route('balance.topup.uploadForm',['topup'=>$item])}}"
                                            class="badge badge-info text-white">Upload Proof</a>
                                        <form action="{{route('balance.topup.cancel',['topup'=>$item])}}" method="POST">
                                            @csrf @method('DELETE')
                                            <button class="badge badge-danger" type="submit">Cancel</button>
                                        </form>
                                        @break
                                        @case('Waiting Confirmation')
                                        <a href="{{asset($item->payment_proof)}}" target="_blank"
                                            class="badge badge-secondary text-white">Check Proof</a>
                                        <br>
                                        <a href="{{route('balance.topup.uploadForm',['topup'=>$item])}}"
                                            class="badge badge-info text-white">Re-upload Proof</a>
                                        @break
                                        @default
                                        @endswitch
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$topup->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection