<div class="wrapper wrapper-full-page ">
	@include('layouts.navbars.navs.guest')
<div @if($activePage != 'welcome'  && $activePage != 'login' && $activePage != 'register' && $activePage != 'reset-password') style="margin-top: 5em;" @endif> 
		<div @if($activePage == 'welcome'  || $activePage == 'login' || $activePage == 'register' || $activePage == 'reset-password') class="full-page register-page section-image @if($activePage == 'login' || $activePage == 'register' || $activePage == 'reset-password') cover-dark  @endif" data-image="{{ $backgroundImage }}" @endif >
			@yield('content')
		</div>	
	</div>
</div>
@if($activePage == "welcome")
@yield('brief')
@endif
@if($activePage != "login" && $activePage != "register")
@include('layouts.footer')
@endif