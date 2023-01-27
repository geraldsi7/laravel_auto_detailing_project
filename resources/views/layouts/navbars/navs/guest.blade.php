<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top @if($activePage == 'login' || $activePage == 'register' || $activePage == 'reset-password') bg-transparent @else bg-white @endif">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      @if($activePage != 'login' && $activePage != 'register' && $activePage != 'reset-password')
      <a class="navbar-brand" href="{{ route('welcome') }}">
        <img src="{{ asset('assets') }}/img/logo.png" width="70">
      </a>
      @endif
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
    </button>
    

    <div class="collapse navbar-collapse justify-content-end" id="navigation">
     <ul class="navbar-nav">     
     <li class="nav-item @if ($activePage == 'services') active @endif">
      <a class="nav-link rounded-0" href="{{ route('services.index') }}"><i class="now-ui-icons ui-2_settings-90"></i> Detailing Services</a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link rounded-0  dropdown-toggle" id="categoryDropdown" data-toggle="dropdown" aria-expanded="false"><i class="now-ui-icons travel_info"></i>
         <p>
          <span>our company</span>
        </p>
      </a>
      <div class="dropdown-menu dropdown-menu-right text-uppercase" aria-labelledby="categoryDropdown">
        <a class="dropdown-item" href="{{ route('about.index') }}">about us</a>
        <a class="dropdown-item" href="{{ route('gallery.index') }}">gallery</a>
        <a class="dropdown-item" href="{{ route('testimonials.index') }}">testimonials</a>

      </div>

    </li>

    <li class="nav-item @if ($activePage == 'contact-us') active @endif">
      <a class="nav-link rounded-0" href="{{ route('contact.index') }}"><i class="now-ui-icons ui-1_send"></i> contact us</a>
    </li>
    <!--  <li class="nav-item @if ($activePage == 'category') active @endif"><a class="nav-link rounded-0" href="{{ route('cart.index') }}"><i class="now-ui-icons media-1_album"></i> gallery</a></li>
    -->
    @auth       
{{--
    <li class="nav-item">
      <a href="{{ route('cart.index') }}" class="nav-link rounded-0">
        <i class="now-ui-icons shopping_cart-simple"></i> 
        <span id="orderCounter">
          @if(auth()->user()->order->where('status', 'in-cart')->sum('qty') >= 1)
          {{ auth()->user()->order->where('status', 'in-cart')->sum('qty') }}
          @endif
        </span>
      </a>
    </li> 

--}}

    @if(auth()->user()->role == 'Admin' || auth()->user()->role == 'Receptionist')
    <li class="nav-item">
      <a href="{{ route('home') }}" class="nav-link rounded-0">
        <i class="now-ui-icons design_app"></i>
        Dashboard
      </a>
    </li> 
    @endif


    <li class="nav-item dropdown">
      <a class="nav-link rounded-0 dropdown-toggle" id="accountDropdown" data-toggle="dropdown" aria-expanded="false">
        <i class="now-ui-icons users_single-02"></i>
        <p>
          <span class="d-lg-none d-md-block">{{ __("Account") }}</span>
        </p>
      </a>
      <div class="dropdown-menu dropdown-menu-right text-uppercase" aria-labelledby="accountDropdown">
        <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __("Profile") }}</a>
        <!-- <a class="dropdown-item" href="{{ route('cart.history') }}">My Orders</a>

        <a class="dropdown-item" href="{{ route('wishlist.index') }}">My Wishlist</a>
-->

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
      </a>
    </div>
  </li>
  @endauth
  @guest
  <li class="nav-item @if ($activePage == 'login') active @endif ">
    <a href="{{ route('login') }}" class="nav-link rounded-0">
      <i class="now-ui-icons users_circle-08"></i> {{ __("Login") }}
    </a>
  </li>
  @endguest
</ul>
</div>
</div>
</nav>
<!-- End Navbar -->