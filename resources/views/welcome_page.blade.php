<div class="container mt-3">
  <div class="py-5 pl-0 col-12 d-md-none">
    <p class="h3">Upgrade Your Car</p>
    <p>Master-grade service to bring back the feelings that made you buy your car.</p>
    <div>
      <a href="{{ route('contact.index') }}" type="button" class="col-12 btn btn-primary text-white text-uppercase text-left py-3 pl-3 rounded-0"> book now</a>
    </div>
  </div>
</div>

<div class="d-flex justify-content-center mt-5">
  <img src="{{ asset('assets') }}/img/logo.png" width="100">
</div>

<div class="mt-5" style="padding: 0 9em;">
  <p class="text-center" style="font-size: medium;">
    The maintenance of your vehicle and its value is an ongoing process that keeps your car appealing from the inside out. {{ config('app.name') }} is a full service company that specializes in bringing back the feelings that made you buy your car.
  </p>
</div>



<!-- window tint -->
<div class="container mt-5 bg-white" id="window-tint">
  <div class="mb-3 col-12">
    <div class="row g-0">
      <div class="col-md-6 pl-0">
        <div class="py-5">
          <p class="text-uppercase">Clean, Correct & Protect</p>
          <p class="my-4 h2">What Is Auto Detailing?</p>
          <p class="mb-4 p-0" style="font-size: medium;">
            We'll say it's the systematic rejuvenation and protection of the various surfaces of a vehicle. 100 percent of both the interior and exterior which includes the Engine, Headlights, Wheels, and more, will look like new. The service takes between 4 to 6 hours depending upon the package you choose. We are a Mobile Service that comes to your place of convenience with water, electricity, and the availability of high-quality products to use on your vehicle.
            <br>
            <br>
            Everyday driving of your vehicle regardless of how old or new is tainted by nature. Regular maintenance of your vehicle is key to perseverance as wear and tear will devalue your car and take away from its appearance. Our goal is to satisfy our customers by making them happy through our service, which will keep them calling us back.
            <br>
            <br>
            Feel free and call us with any problems and questions about Auto Detailing. We service VA, D.C., and MD.
          </p>

          <a href="{{ route('services.index') }}" class="btn col-md-10 col-lg-6 btn-primary text-uppercase py-3 rounded-0"><span class="pull-left">browse services</span><i class="now-ui-icons arrows-1_minimal-right pull-right"></i>
          </a>
        </div>
      </div>
      <div class="col-md-6 col-lg-5">
        <div class="mt-5">
          @if(count($galleries) >= 1 )
          <div class="position-relative">
            <div class="control" id="menu-slider-control">
              <div class="prev position-absolute">
                <i class="fa-solid fa-angle-left"></i>
              </div>
              <div class="next position-absolute">
                <i class="fa-solid fa-angle-right"></i>
              </div>
            </div>
            <div class="menu-slider">
              @foreach($galleries as $photo)
              <div style="height: 70vh;">
                <a href="{{ asset('storage/img/gallery/' . $photo->file ) }}">
                  <img class="image-fill" src="{{ asset('storage/img/gallery/' . $photo->file ) }}" alt="Card image cap">
                </a>
              </div>
              @endforeach
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>


<!-- window tint -->
<div class="container mt-5 bg-white" id="window-tint">
  <div class="mb-3 col-12">
    <div class="row g-0">
      <div class="col-md-6 pl-0 order-md-2">
        <div class="py-5">
          <p class="text-uppercase">WHY CHOOSE US</p>
          <p class="my-4 h2">Incredible Services</p>
          <p class="mb-4 p-0" style="font-size: medium;">
            We Love to Work on Cars
            <br>
            <div class="d-flex justify-content-start align-items-center">
             <p>
              <span class="material-symbols-outlined" style="font-size: 2.8em;">
              emoji_objects
            </span> 
             </p>
            <p class="font-weight-bold h5">{{ date('Y') - 2005 }} Years of Experience</p>
            </div>
            <p style="font-size: medium;">Our business has been striving for many years to provide our clients the best quality service possible for full satisfaction. And they've shown their appreciation by coming back to us repeatedly.</p>
            <br>
            <div class="d-flex justify-content-start align-items-center">
             <p>
              <span class="material-symbols-outlined" style="font-size: 2.8em;">
              diamond
            </span> 
             </p>
            <p class="font-weight-bold h5">Best Quality Service</p>
            </div>
            <p style="font-size: medium;">Our team comes to work smiling and are happy to turn your car around. We have passion for auto  reconditioning and can educate you on how to take care of your vehicle.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-5 order-md-1">
        <div class="mt-5">
          <div style="height: 550px;">
            <img class="image-fill rounded-0" src="{{ asset('assets') }}/img/services/image/why.png" alt="Card image cap">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-5">
  <p class="h2 text-center">How We Work</p>
  <div class="mt-4">

    <div class="row">
      <div class="col-12 col-md-3">
        <div class="d-flex justify-content-center">
          <span class="material-symbols-outlined" style="font-size: 3em;">
            devices_other
          </span>
        </div>
        <h5 class="card-title font-weight-bold mt-4">1. Contact Us</h5>
        <p class="card-text">Call us or fill our online form for a pickup or drive up to our workshop and leave the car with us. We always go above and beyond!</p>
      </div>

      <div class="col-12 col-md-3">
        <div class="d-flex justify-content-center">
          <span class="material-symbols-outlined" style="font-size: 3em;">
            local_car_wash
          </span>
        </div>
        <h5 class="card-title font-weight-bold mt-4">2. Car Care System</h5>
        <p class="card-text">Using our state of the art Car Care Systems, we will service your vehicle and restore it to its former glory, exactly as it left the showroom!</p>
      </div>

      <div class="col-12 col-md-3">
        <div class="d-flex justify-content-center">
          <span class="material-symbols-outlined" style="font-size: 3em;">
            settings_suggest
          </span>
        </div>
        <h5 class="card-title font-weight-bold mt-4">3. Multiple Check Point</h5>
        <p class="card-text">We will attend to your car's needs and recommend our own Car Care System management template based on your service requirements.</p>
      </div>

      <div class="col-12 col-md-3">
        <div class="d-flex justify-content-center">
          <span class="material-symbols-outlined" style="font-size: 3em;">
            key
          </span>
        </div>
        <h5 class="card-title font-weight-bold mt-4">4. We Drop Anywhere</h5>
        <p class="card-text">Once the service is completed, we will deliver your car to your home or office of choice in the shortest amount of time!</p>
      </div>
    </div>
  </div>
</div>


<div class="container my-5">
  <p class="h2 text-center">Credit Cards We Accept</p>
  <div class="mt-4">

    <div class="row">
      <div class="col-3">
      <img src="{{ asset('assets') }}/img/cc/discover-it.png">
      </div>

      <div class="col-3">
      <img src="{{ asset('assets') }}/img/cc/mastercard.png">
      </div>

      <div class="col-3">
      <img src="{{ asset('assets') }}/img/cc/visa.png">
      </div>

      <div class="col-3">
      <img src="{{ asset('assets') }}/img/cc/ae.png">
      </div>
    </div>
  </div>
</div>

<div class="my-5 p-5 register-page section-image cover-dark text-white" style="min-height: 50vh;  background-image: url('{{ asset('assets') }}/img/bg-main.jpg');">
  <div class="container">
    <h2 class="text-capitalize text-center">keep calm & be our client</h2>
    <p class="text-center">Master-grade service to bring back the feelings that made you buy your car.</p>
    <center>

      <div class="counters mt-5">
        <div class="row">
          <div class="col">
            <span class="h1 font-weight-bold counter" data-target="{{ date('Y') - 2005 }}">
              0
            </span>
            <p>Years of Experience</p>
          </div>

          <div class="col">
            <span class="h1 font-weight-bold counter" data-target="1">
              0
            </span><span class="h1 font-weight-bold">.3K</span>
            <p>Happy Clients</p>
          </div>

          <div class="col">
            <span class="h1 font-weight-bold counter" data-target="4">
              0
            </span>
            <span class="h1 font-weight-bold">.3</span>
            <p>Client Reviews</p>
          </div>
        </div>
      </div>
  </div>
  </center>
</div>
