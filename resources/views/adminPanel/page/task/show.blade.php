@extends('adminPanel.template.layout',[
'title'=>'Detail Task'
])
@section('content')
<div class="container mt-5">
    <div class="row p-2 align-items-center">
        <a href="{{route('admin.task.index')}}" class="mr-auto">
            <h1 class="fas fa-arrow-left text-dark"></h1>
        </a>
        <h1 class="h1 mr-auto">{{$task->title}}</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <img src="{{asset($task->pic_url)}}" class="img-fluid">
        </div>
        <div class="col-md-4">
            <p class="p text-justify">
                <br><b>Created at :</b> {{$task->created_at->format('D, d-M-Y')}}
                <br><b>Article :</b> {{$task->article}}
            </p>
        </div>
    </div>

</div>
@endsection