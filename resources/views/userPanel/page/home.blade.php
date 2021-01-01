@extends('userPanel.template.app',[
'title'=>'Home'
])
@section('content')
<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col-md-10">
            <h2 class="font-weight-bold">Daily Task</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow roundedCorner border-0">
                {{-- day count --}}
                <div class="row justify-content-end">
                    <div class="col-md-4">
                        <div class="card bg-primary border-0 dayCountOverlay ">
                            <h4 class="h4 text-white font-weight-bold m-0 p-0">Day {{$task->dayCount}}</h4>
                        </div>
                    </div>
                </div>
                {{-- content --}}
                <div class="row justify-content-center align-items-top px-5">
                    <div class="col-md-8 py-3 px-5">
                        {{-- title --}}
                        <div class="row">
                            <h1 class="h1 font-weight-bold content-title">{{$task->title}}</h1>
                        </div>
                        {{-- paragraph --}}
                        <div class="row">
                            <p class="text-justify show-read-more">{{$task->article}}</p>
                        </div>
                        {{-- status --}}
                        <div class="row py-4">
                            @if (!$task->status)
                            <form action="{{route('task.complete',['userTask'=>$task->user_task_id])}}" method="POST"
                                id="formComplete">
                                @csrf
                                <p class="font-weight-bold" onclick="$('#formComplete').submit()"
                                    style="cursor:pointer;">
                                    Mark as <span class="text-success"><u>Completed</u></span>
                                </p>
                            </form>
                            @else
                            <form action="{{route('task.uncomplete',['userTask'=>$task->user_task_id])}}" method="POST"
                                id="formUncomplete">
                                @csrf
                                <p class="font-weight-bold" onclick="$('#formUncomplete').submit()"
                                    style="cursor:pointer;">
                                    Mark as <span class="text-muted"><u>Uncompleted</u></span>
                                </p>
                            </form>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4 py-3">
                        <img src="{{asset('img/illustration/illustration_credit card_svg.svg')}}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection