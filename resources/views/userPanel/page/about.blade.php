@extends('userPanel.template.app',[
'title'=>'About Us'
])
@section('content')
<div class="container h-100">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6 text-center">
            <img src="{{asset('img/illustration/illustration_father kids_svg.svg')}}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <p class="h2 font-weight-bold d-inline">About Us</p>
            <p class="p text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                Ipsum has been
                the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                and scrambled it to make a type specimen book.</p>
        </div>
    </div>
</div>
@endsection