@extends('layouts.app', [
'namePage' => 'Our Company',
'class' => 'login-page sidebar-mini ',
'activePage' => 'our-company',
'backgroundImage' => asset('assets') . "/img/bg-main.jpg",
])

@section('content')

<div class="bg-skewed bg-about">
  <div class="content">
    <p class="h2 text-white font-weight-bold text-capitalize">About Us</p>
  </div>
</div>
<div class="container mt-5">
  <div class="d-flex flex-wrap">
    <div class="flex-grow-1 col-12 col-md-6 order-1 order-md-1">
      <img src="{{ asset('assets') }}/img/favicon.jpg" alt="Card image cap">
    </div>
    <div class="order-2 order-md-2 col-12 col-md-6 ps-2">
      <p class="h3">{{ config('app.name') }}</p>
      <p>{{ config('app.name') }} is a full vehicle servicing company that specializes in bringing back the feelings that made you buy your car.
        <br>
        <br>
        Started by Noah Danso in his backyard in 2005. {{ config('app.name') }} has grown from an attempt by a struggling one-man business to make car detailing more than it is perceived in the world to a group of ever evolving professionals headed by himself with a love for everything detailing.
        <br>
      </p>

      <div class="mt-5">
        <div class="d-flex mt-4">
          <div class="flex-shrink-0">
          </div>
          <div class="flex-grow-1 px-3 ms-3">
            <span class="text-capitalize font-weight-bold" style="font-size: 1.1rem">Our Services</span>
            <br>
            <ol style="list-style-type: square;">
              <li class="font-weight-bold">Retail</li>
              <span>Choose from our collection of detailing services to uplift your vehicle</span>
              <li class="font-weight-bold">Customization</li>
              <span>Let's tailor any of our existing pieces to your unique tastes</span>
              <li class="font-weight-bold">Bespoke</li>
              <span>Speak to us to fabricate a unique piece just for you</span>
            </ol>
          </div>
        </div>

        <div class="d-flex mt-4">
          <div class="flex-shrink-0">
          </div>
          <div class="flex-grow-1 px-3 ms-3">
            <span class="text-capitalize font-weight-bold" style="font-size: 1.1rem">our slogan</span>
            <br>
            <span>Clean, Correct & Protect</span>
          </div>
        </div>

        <div class="d-flex mt-4">
          <div class="flex-shrink-0">
          </div>
          <div class="flex-grow-1 px-3 ms-3">
            <span class="text-capitalize font-weight-bold" style="font-size: 1.1rem">our vision</span>
            <br>
            <span>Our goal is to become a world-class car detailing company that provides quality crafted services all over the world</span>
          </div>
        </div>

        <div class="d-flex mt-4">
          <div class="flex-shrink-0">
          </div>
          <div class="flex-grow-1 px-3 ms-3">
            <span class="text-capitalize font-weight-bold" style="font-size: 1.1rem">Core Values</span>
            <br>
            <ol class="text-capitalize" style="list-style-type: square;">
              <li>Teamwork</li>
              <li>Integrity</li>
              <li>Discipline</li>
              <li>Excellence</li>
              <li>People Centered</li>
            </ol>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="mt-5 p-5 register-page section-image cover-dark text-white" style="min-height: 50vh;  background-image: url('{{ asset('assets') }}/img/bg-main.jpg');">
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


@endsection