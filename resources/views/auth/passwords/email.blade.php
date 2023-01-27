@extends('layouts.app', [
'namePage' => 'Reset Password',
'class' => 'login-page sidebar-mini ',
'activePage' => 'reset-password',
'backgroundImage' => asset('assets') . "/img/login-img.jpg",
])

@section('content')
<div class="content">
    <div class="container">
        <div class="col-md-4 ml-auto mr-auto">
            <form role="form" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="card card-login card-plain">
                    <div class="card-header ">
                        <div class="logo-container">
                            <img src="{{ asset('assets/img/favicon.png') }}" alt="">
                        </div>
                    </div>
                        <div class="card-body">
                            @if (session('status'))
                            <p class="text-white">
                                {{ session('status') }}
                            </p>
                            @endif
                        </div>
                        <div class="input-group no-border form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}">
                            <span class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="now-ui-icons ui-1_email-85"></i>
                                </div>
                            </span>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autocomplete="email" autofocus>
                        </div>
                        @error('email')
                        <span style="display:block;" class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="card-footer ">
                        <button type="submit" class="btn btn-primary col-12 rounded-0 btn-lg mb-3">{{ __('Send Password Reset Link') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@push('js')
<script>
    $(document).ready(function() {
        demo.checkFullPageBackgroundImage();
    });
</script>
@endpush