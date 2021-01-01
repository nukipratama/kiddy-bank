@extends('adminPanel.template.layout',[
'title'=>'Detail Mission'
])
@section('content')
<div class="container mt-5">
    <div class="row p-2 align-items-center">
        <a href="{{route('admin.mission.index')}}" class="mr-auto">
            <h1 class="fas fa-arrow-left text-dark"></h1>
        </a>
        <h1 class="h1 mr-auto">{{$mission->title}}</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <img src="{{asset($mission->icon)}}" class="img-fluid">
        </div>
        <div class="col-md-4">
            <p class="p text-justify">
                <br><b>Amount :</b> {{$mission->amount}}
                <br><b>Reward :</b> {{$mission->reward}}
            </p>
        </div>
    </div>

</div>
@endsection