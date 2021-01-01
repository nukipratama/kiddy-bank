@extends('adminPanel.template.layout',[
'title'=>'Voucher'
])
@section('content')
<div class="container mt-5">
    {{-- active --}}
    <div class="row p-2 align-items-center">
        <h1 class="h1 mr-auto">Active Voucher</h1>
        <div class="p-2">
            <a href="{{route('admin.voucher.claimed')}}">
                <button class="btn btn-secondary font-weight-bold p-2">Claimed Voucher</button>
            </a>
            <a href="{{route('admin.voucher.create')}}">
                <button class="btn btn-primary font-weight-bold p-2">Add Voucher</button>
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Reward</th>
                    <th scope="col">Price</th>
                    <th scope="col">Code</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($active as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->title}}</td>
                    <td>{{$item->reward}}</td>
                    <td>{{$item->price . $item->unit}}</td>
                    <td>{{$item->code}}</td>
                    <td>
                        <a href="{{route('admin.voucher.show',['voucher'=>$item])}}"><button
                                class="badge badge-primary">Detail</button></a>
                        <a href="{{route('admin.voucher.edit',['voucher'=>$item])}}"><button
                                class="badge badge-info">Edit</button></a>
                        <form action="{{route('admin.voucher.destroy',['voucher'=>$item])}}" method="POST">
                            @csrf @method('DELETE')
                            <button class="badge badge-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$active->links()}}
    </div>
</div>
@endsection