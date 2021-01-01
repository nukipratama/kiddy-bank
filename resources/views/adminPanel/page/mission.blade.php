@extends('adminPanel.template.layout',[
'title'=>'Mission'
])
@section('content')
<div class="container mt-5">
    <div class="row p-2 align-items-center">
        <h1 class="h1 mr-auto">All Mission</h1>
        <div class="p-2">
            <a href="{{route('admin.mission.create')}}">
                <button class="btn btn-primary font-weight-bold p-2">Add Mission</button>
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Reward</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mission as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->title}}</td>
                    <td>{{$item->amount}}</td>
                    <td>{{$item->reward.' '.$item->unit}}</td>
                    <td>
                        <a href="{{route('admin.mission.show',['mission'=>$item])}}"><button
                                class="badge badge-primary">Detail</button></a>
                        <a href="{{route('admin.mission.edit',['mission'=>$item])}}"><button
                                class="badge badge-info">Edit</button></a>
                        <form action="{{route('admin.mission.destroy',['mission'=>$item])}}" method="POST">
                            @csrf @method('DELETE')
                            <button class="badge badge-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$mission->links()}}
    </div>
</div>
@endsection