@extends('adminPanel.template.layout',[
'title'=>'Topup'
])
@section('content')
<div class="container mt-5">
    <div class="row p-2 align-items-center">
        <h1 class="h1 mr-auto">Recent Topup</h1>
    </div>
    <div class="row justify-content-center">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Proof</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($topup as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->user->username}}</td>
                    <td>{{$item->amount}}</td>
                    <td>
                        <a href="{{asset($item->payment_proof)}}" target="_blank"
                            class="badge badge-info text-white">{{basename($item->payment_proof)}}</a>
                    </td>
                    <td>{{$item->created_at->format('d/m/Y')}}</td>
                    <td class="pt-0">
                        <form action="{{route('admin.topup.accept',['topup'=>$item])}}" method="POST">
                            @csrf @method('PUT')
                            <button class="badge badge-success text-white font-weight-bold"
                                type="submit">Accept</button>
                        </form>
                        <form action="{{route('admin.topup.decline',['topup'=>$item])}}" method="POST">
                            @csrf @method('PUT')
                            <button class="badge badge-danger text-white font-weight-bold"
                                type="submit">Decline</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{$user->links()}} --}}
    </div>
</div>
@endsection