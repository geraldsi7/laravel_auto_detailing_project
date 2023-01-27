@extends('layouts.app', [
'namePage' => 'Our Company',
'class' => 'login-page sidebar-mini ',
'activePage' => 'testimonials',
'backgroundImage' => asset('assets') . "/img/bg-main.jpg",
])

@section('content')

<div class="bg-skewed bg-testimonials">
    <div class="content">
    <p class="h2 text-white font-weight-bold text-capitalize">Testimonials</p>
    <p class="text-white">Read detailing feedback from clients around the world!</p>
    </div>
</div>
<div class="container" style="margin-top: 10em;">
    <p class="h5 text-center">Testimonials</p>
    <div style="padding: 0 9em;">
        <p class="text-center">One of the best ways to judge a product or service is to receive feedback from those who have had direct experience with it. Here’s what clients of {{ config('app.name') }} are saying about the professionalism and quality of service they continue to receive.</p>
    </div>

    <div class="mt-5">
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>I will recommend my friends and family members to Amazing Car Wash & Mobile Auto  Detailing  after a skillful  job done and good explanation to me before.My jaguar xf is even  newer than  the day I  bought it from the dealership.Thanks , Noah</p>
                <footer class="blockquote-footer">Tom Watts</footer>
            </blockquote>
        </div>

        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>I called Noah for my black 2012 M6 BMW  for a full detailing, because I have scratches from a car wash I took my car. He explain what needs to be than and he was very knowledgeable to his craft, he took  almost 6 hours to complete the job but I didn't believe my eyes and my car even look newer than the day I bought it, it was worth calling him and surely will  recommend him to my friends and family members.</p>
                <footer class="blockquote-footer">Kwasi Osei</footer>
            </blockquote>
        </div>

        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>Noah detailed my old Toyota Corolla 95 car right before i sold it. The car looked amazing and brand new. It looked so impeccable, i almost didn't want to let the car go. It was my first car ever and i loved it even more after the detailing job. Noah is very professional, timely and patiently cleans and details every crevasse of the car. He treats every car like gold. Excellent service!!!!</p>
                <footer class="blockquote-footer">Katherine Mate-Kole</footer>
            </blockquote>
        </div>

        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>I was looking for a detail company to clean my car from a long trip from Columbus ohio  to Virginia with four kids in a van,hmmmmm  thank God I found Amazing car wash mobile auto detailing they made my day wow very skillful  detail they clean my car and make it  look like new van I will personally recommend them to any body  who want a good job done. Mr Noah  and his team job well done  I will come back to Virginia very soon thank you my kids are happy too.</p>
                <footer class="blockquote-footer">Faith Brew</footer>
            </blockquote>
        </div>

        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>He was on time and did his job very well. Car looked like new afterwards. He is very professional, serious about what his work. I will recommend him to anyone every time. Call him and you won't be disappointed.</p>
                <footer class="blockquote-footer">Daniel Adu-Brafo</footer>
            </blockquote>
        </div>

        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>My truck looked brand new. I got so many compliments.</p>
                <footer class="blockquote-footer">Marci Schattmann</footer>
            </blockquote>
        </div>

    </div>
</div>


@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>

<script src="{{ asset('assets') }}/js/tinySlider/itemSlider.js"></script>
@endpush