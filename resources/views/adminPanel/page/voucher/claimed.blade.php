@extends('adminPanel.template.layout',[
'title'=>'Claimed Voucher'
])
@section('content')
<div class="container mt-5">
    <div class="row p-2 align-items-center">
        <a href="{{route('admin.voucher.index')}}" class="mr-auto">
            <h1 class="fas fa-arrow-left text-dark"></h1>
        </a>
        <h1 class="h1 mr-auto">Claimed Voucher</h1>
    </div>
    <div class="row justify-content-center">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Claimed By</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($claimed as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->title}}</td>
                    <td>{{$item->price . $item->unit}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>
                        <a href="{{route('admin.voucher.show',['voucher'=>$item])}}"><button
                                class="badge badge-primary">Detail</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$claimed->links()}}
    </div>
</div>
@endsection