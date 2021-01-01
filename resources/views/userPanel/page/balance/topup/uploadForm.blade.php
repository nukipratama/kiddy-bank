@extends('userPanel.template.app',[
'title'=>'Upload'
])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow roundedCorner border-0">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card bg-primary border-0 uploadProofOverlay">
                            <h4 class="h4 text-white font-weight-bold m-0 p-0">Upload Payment Proof</h4>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-top">
                    <form class="pt-2 text-center" method="POST"
                        action="{{ route('balance.topup.upload',['topup'=>$topup]) }}" enctype="multipart/form-data">
                        @csrf
                        <h4 class="font-weight-bold">Rp {{number_format($topup->amount , 0, ',', '.')}}</h4>
                        <p class="font-weight-bold mb-1">Please upload your Proof of Payment to continue</p>
                        <div class="form-group row justify-content-center">
                            <div class="col-md-12">
                                <input id="payment_proof" type="file"
                                    class="form-control bg-light @error('payment_proof') is-invalid @enderror"
                                    name="payment_proof" accept="image/x-png,image/gif,image/jpeg" required>
                                @error('payment_proof')
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