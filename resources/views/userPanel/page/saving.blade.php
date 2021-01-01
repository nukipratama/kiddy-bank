@extends('userPanel.template.app',[
'title'=>'Saving'
])
@section('content')
<div class="container h-100 p-4 my-2">
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block w-100">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow roundedCorner border-0">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card bg-primary border-0 uploadProofOverlay">
                            <h4 class="h4 text-white font-weight-bold m-0 p-0">Saving</h4>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-top text-center">
                    <form class="pt-2 " method="POST" action="{{route('saving.add')}}">
                        @csrf
                        <h4 class="font-weight-bold">Balance<br>Rp {{number_format($balance->cash , 0, ',', '.')}}</h4>
                        <p class="font-weight-bold mb-1">How much do you want to save?</p>
                        <div class="form-group row justify-content-center">
                            <div class="col-md-12">
                                <input id="amount" type="number"
                                    class="roundedCorner form-control bg-light @error('amount') is-invalid @enderror"
                                    name="amount" required>
                                @error('amount')
                                <span class="invalid-feedback px-2" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-md-8">
                                <button type="submit"
                                    class="btn btn-primary w-100 text-white font-weight-bold roundedCorner">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection