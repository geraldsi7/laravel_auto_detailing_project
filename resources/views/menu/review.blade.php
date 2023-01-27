@extends('layouts.app', [
'namePage' => 'Item',
'class' => 'sidebar-mini',
'activePage' => 'manage-item',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">{{ $items->title }}</h4>
        </div>

        @php

        $avg = number_format($rating->where('services_id', $items->id)->average('rate'),1);


        $cus = count($rating->where('services_id', $items->id));

        $half = $avg - floor($avg);

        $rem = 5 - $avg;

        if($cus > 1){



          $star5percent = round($star5count / $cus * 100);



          $star4percent = round($star4count / $cus * 100);



          $star3percent = round($star3count / $cus * 100);



          $star2percent = round($star2count / $cus * 100);


          $star1percent = round($star1count / $cus * 100);

        }

        $star5count = count($rating->where('services_id', $items->id)->where('rate', 5));

        $star4count = count($rating->where('services_id', $items->id)->where('rate', 4));

        $star3count = count($rating->where('services_id', $items->id)->where('rate', 3));

        $star2count = count($rating->where('services_id', $items->id)->where('rate', 2));

        $star1count = count($rating->where('services_id', $items->id)->where('rate', 1));


        @endphp

        <div class="card-body">
          <div class="row">
            <div class="col-4 col-lg-4 text-center">
              <span class="text-primary h3 font-weight-bold">{{ $avg }} / 5.0</span>
              <br>
              <span class="text-primary">@include('layouts.rating')</span>
              <br>
              <b class="font-weight-bold text-capitalize">
                @if($cus > 0)
                {{ number_format($cus) }}
                @if($cus > 1)
                reviews
                @else
                review
                @endif
                @endif
              </b>         
            </div>

            <div class="col-8 col-lg-5">
              <div class="row">
                @for($i = 5; $i >= 1; $i--)
                <div class="col-3 col-md-2 col-lg-2 text-right">
                 <b>{{ $i }}</b> <i class="fa fa-star text-primary"></i>
               </div>
               <div class="col-6 col-md-7 col-lg-7">
                 <div class="progress">
                  <div class="progress-bar bg-primary" role="progressbar"
                  @if($cus == 0)
                  style="width: 0%"
                  aria-valuenow="0"
                  @else
                  @if($i == 5) style="width: {{ $star5percent }}%"
                  aria-valuenow="{{ $star5percent }}"
                  @elseif($i == 4) style="width: {{ $star4percent }}%"
                  aria-valuenow="{{ $star4percent }}"
                  @elseif($i == 3) style="width: {{ $star3percent }}%"
                  aria-valuenow="{{ $star3percent }}"
                  @elseif($i == 2) style="width: {{ $star2percent }}%"
                  aria-valuenow="{{ $star2percent }}"
                  @elseif($i == 1) style="width: {{ $star1percent }}%"
                  aria-valuenow="{{ $star1percent }}" 
                  @endif
                  @endif
                  aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="col-3 col-md-3 col-lg-3 text-left">
               <b class=""> 
                @if($i == 5)
                {{ number_format($star5count) }}
                @elseif($i == 4)
                {{ number_format($star4count) }}
                @elseif($i == 3)
                {{ number_format($star3count) }}
                @elseif($i == 2)
                {{ number_format($star2count) }}
                @elseif($i == 1)
                {{ number_format($star1count) }}
                @endif
              </b>
            </div>
            @endfor
          </div>
        </div>
      </div>
      <hr>
      <div class="col-12 mt-5">
        @if($cus >= 1)
        @foreach($review as $reviews)
          <b class="text-capitalize font-weight-bold">{{ $reviews->user->name }}</b>
          <br>
          @for($i = 1; $i <= $reviews->rate; $i++)
            <i class="fa fa-star" aria-hidden="true"></i>
            @endfor
            @for($i = 1; $i <= 5 - $reviews->rate; $i++)
              <i class="far fa-star"></i>
              @endfor
              <p>{{ $reviews->review }}</p>
              <p class="text-muted">{{ $reviews->updated_at->diffForHumans() }}</p>

              <hr>
            @endforeach
            @else
            <div class="text-center">
              <p class="h4 text-muted">No review</p>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>



@endsection