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
                <div class="card-header title">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session($key ?? 'status'))
                    <p>{{ session($key ?? 'status') }}</p>
                    @endif

                    <p>{{ __('Before proceeding, an email is on its way to you. Please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, </p>
                    <form class="d-inline" method="POST" action="{{ route('verify.store') }}">
                        @csrf
                        <input type="hidden" name="email" value="{{ $user->email }}">
                        <button type="submit" class="btn btn-primary btn-round text-capitalize align-baseline">{{ __('click here to request another') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
