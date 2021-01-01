@extends('adminPanel.template.layout',[
'title'=>'Users'
])
@section('content')
<div class="container mt-5">
    <div class="row p-2 align-items-center">
        <h1 class="h1 mr-auto">All Users</h1>
    </div>
    <div class="row justify-content-center">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Parent Phone</th>
                    <th scope="col">Join Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->username}}</td>
                    <td>{{$item->parent_phone}}</td>
                    <td>{{$item->created_at->format('D, d-M-Y')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$user->links()}}
    </div>
</div>
@endsection