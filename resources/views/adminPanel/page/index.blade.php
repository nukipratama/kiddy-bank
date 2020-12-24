@extends('adminPanel.template.layout',[
'title'=>'Home'
])
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <h1 class="h1 text-center">Welcome to Admin Kiddy Bank</h1>
        <img src="{{asset('img/illustration/illustration_treasure_svg.svg')}}" class="img-fluid">
    </div>
</div>
@endsection