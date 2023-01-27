@extends('layouts.app', [
'namePage' => 'Our Company',
'class' => 'login-page sidebar-mini ',
'activePage' => 'gallery',
'backgroundImage' => asset('assets') . "/img/bg-main.jpg",
])

@section('content')

<div class="bg-skewed bg-gallery">
    <div class="content">
        <p class="h2 text-white font-weight-bold text-capitalize">gallery</p>
    </div>
</div>
<div class="container" style="margin-top: 10em;">
    <p class="h5 text-center">Gallery</p>

    <div class="mt-5">
        @if(count($galleries) >= 1 )
        <div class="position-relative">
            <div class="control" id="item-slider-control">
                <div class="prev position-absolute">
                    <i class="fa-solid fa-angle-left"></i>
                </div>
                <div class="next position-absolute">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
            </div>
            <div class="item-slider">
                @foreach($galleries as $photo)
                <div style="height: 70vh;">
                    <a href="{{ asset('storage/img/gallery/' . $photo->file ) }}">
                        <img class="image-fill" src="{{ asset('storage/img/gallery/' . $photo->file ) }}" alt="Card image cap">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <p class="text-center">No photos</p>
        @endif
    </div>
</div>


@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>

<script src="{{ asset('assets') }}/js/tinySlider/itemSlider.js"></script>
@endpush