@extends('userPanel.template.app',[
'title'=>'Home'
])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow roundedCorner border-0">
                {{-- day count --}}
                <div class="row justify-content-end">
                    <div class="col-md-4">
                        <div class="card bg-primary border-0 dayCountOverlay ">
                            <h4 class="h4 text-white font-weight-bold m-0 p-0">Day 1</h4>
                        </div>
                    </div>
                </div>
                {{-- content --}}
                <div class="row justify-content-center align-items-center px-5">
                    <div class="col-md-8 p-5">
                        {{-- title --}}
                        <div class="row">
                            <h1 class="h1 font-weight-bold content-title">Menabung itu apa sih?</h1>
                        </div>
                        {{-- paragraph --}}
                        <div class="row">
                            <p class="text-justify show-read-more">Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since
                                the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                                specimen book. It has survived not only five centuries, but also the leap into
                                electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                with the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                                with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                                piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard
                                McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of
                                the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through
                                the cites of the word in classical literature, discovered the undoubtable source. Lorem
                                Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The
                                Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the
                                theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum,
                                "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="{{asset('img/illustration/illustration_credit card_svg.svg')}}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection