@extends('userPanel.template.app',[
'title'=>'Welcome'
])
@section('content')
<div class="container h-100">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <p class="h2 font-weight-bold d-inline">Personal Financial Helper for
                <p class="h2 text-secondary font-weight-bold d-inline">Kids</p>
            </p>
            <p class="p text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                Ipsum has been
                the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                and scrambled it to make a type specimen book.</p>
            <div class="row justify-content-center align-items-center p-3">
                <div class="col-md-6">
                    <a href="{{route('register')}}" class="btn btn-primary w-100 m-2 borderButton">Get Started</a>
                </div>
                <div class="col-md-6">
                    <a href="{{route('about')}}" class="btn btn-light w-100 m-2 borderButton">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <img src="{{asset('img/illustration/illustration_school_svg.svg')}}" class="img-fluid">
        </div>
    </div>
</div>
@endsection