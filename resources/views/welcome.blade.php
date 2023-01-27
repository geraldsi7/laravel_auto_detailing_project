@extends('layouts.app', [
'namePage' => 'Welcome',
'class' => 'login-page sidebar-mini ',
'activePage' => 'welcome',
'backgroundImage' => asset('assets') . "/img/bg-main.jpg",
])

@section('content')
<div class="content">
  <div class="container">
    <div class="col-md-12 ml-auto me-auto">
      <div class="header bg-gradient-primary py-10 py-lg-2 pt-lg-12">
        <div class="container">
          <div class="header-body mb-7">
           <div class="bg-white py-5 pl-4 pr-5 d-none d-md-block col-md-6 col-lg-4">
            <p class="h2">Upgrade Your Car</p>
            <p>Master-grade service to bring back the feelings that made you buy your car.</p>
              <div>
                <a href="{{ route('contact.index') }}" type="button"  class="col-12 btn btn-primary text-white text-uppercase text-left py-3 pl-3 rounded-0"> book now</a>             
            </div>          
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4 ms-auto me-auto">
  </div>
</div>
</div>
@endsection
@section('brief')
@include('welcome_page')
@endsection

@push('js')
<script>
  $(document).ready(function() {
    demo.checkFullPageBackgroundImage();
  });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>

<script src="{{ asset('assets') }}/js/tinySlider/itemSlider.js"></script>

<script src="{{ asset('assets') }}/js/tinySlider/menuSlider.js"></script>

@endpush
