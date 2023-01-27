@extends('layouts.app',[
'namePage' => 'Verify Email',
'class' => 'login-page sidebar-mini ',
'activePage' => 'verify-email',
'backgroundImage' => asset('assets') . "/img/bg-main.jpg",
])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header title">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session($key ?? 'status'))
                    <p>{{ session($key ?? 'status') }}</p>
                    @endif

                    <p>{{ __('An email is on its way to you. Follow the instructions to reset your password') }}
                    {{ __('If you did not receive the email') }}, </p>
                    <form class="d-inline" method="POST" action="{{ route('password.reset.send') }}">
                        @csrf
                        <input type="hidden" name="email" value="{{ $user->email }}">
                        <button type="submit" class="btn btn-primary rounded-0 text-capitalize align-baseline">{{ __('click here to request another') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
