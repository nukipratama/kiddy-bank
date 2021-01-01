@extends('userPanel.template.app',[
'title'=>'Tracking'
])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow roundedCorner border-0 h-100">
                <div class="card-title text-center pt-3 mb-0 pb-0">
                    <h3 class="font-weight-bold">Daily Tasks</h3>
                </div>
                {{$dailyTask->links()}}
                @foreach ($dailyTask as $item)
                <div class="card roundedCorner shadow border-0 mx-3 mb-3 p-3">
                    <div class="row m-0 align-items-center">
                        <div class="col-md-8">
                            <small>Day
                                {{($dailyTask ->currentpage()-1) * $dailyTask ->perpage() + $loop->index + 1}}</small>
                            <p class="font-weight-bold m-0">{{$item->task->title}}</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <h6 class="font-weight-bold text-{{$item->status ? 'success' : 'muted'}} m-0">
                                {{$item->status ? 'Completed' : 'Uncompleted'}}
                            </h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow roundedCorner border-0 h-100">
                <div class="card-title text-center pt-3 mb-0 pb-0">
                    <h3 class="font-weight-bold">Missions</h3>
                </div>
                @foreach ($mission as $item)
                <div class="card roundedCorner shadow border-0 mx-3 mb-3 p-3">
                    <div class="row m-0 align-items-center ">
                        <div class="col-md-8">
                            <p class="font-weight-bold m-0">{{$item->title}}</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <h6
                                class="font-weight-bold text-{{$item->status == 'Completed' ? 'success' : 'muted'}} m-0">
                                {{$item->status}}
                            </h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection