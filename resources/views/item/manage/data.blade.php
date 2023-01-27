@if(count($items) >= 1)
<div class="table-responsive">
  <form id="selectionForm">
    @csrf
    <input type="hidden" name="actions" id="actions">
    <table class="table">
      <thead class="text-primary">
        <th>
          <input type="checkbox" id="all_check">
        </th>
        <th colspan="2">
          Item
        </th>
        <th class="text-right">
          Price (GHS)
        </th>
        <th></th>
      </thead>                 
      <tbody>
        @foreach($items as $item)
        <tr>
          <td>
            <input type="checkbox" id="single_check" name="item[]" value="{{ $item->id }}">
          </td>
          <td>
           <div class="ms-1" style="height: 7vh; width: 7vh;">
            <img class="image-fill" src="{{ asset('assets') }}/img/items/photos/{{ $item->image1 }}" alt="Card image cap">
          </div>          
        </td>
        <td>
         <a href="{{ route('item.show', ['category' =>  $item->category->link, 'item' => $item->link, 'id' => $item->id ])  }}" class="text-primary text-capitalize">{{ $item->title }}</a>
       </td>
       <td class="text-right">{{ number_format($item->price, 2) }}</td>
       <td class="text-right">
        <a href="" type="button" class="text-capitalize text-primary h6 pr-4" data-toggle="modal" data-target="#rating{{ $item->id }}Modal"><i class="fa-solid fa-eye"></i>
        </a>

         <a href="" type="button" class="text-capitalize text-primary h6" id="editData" data-toggle="modal" data-target="#manageModal" data-option="edit" data-update="{{ route('item.manage.update', $item) }}" data-href="{{ $item->id }}"><i class="fa-solid fa-pencil" aria-hidden="true"></i>
         </a>
       </td>
     </tr>

     <!-- rating modal -->
     <div class="modal" id="rating{{ $item->id }}Modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="rateModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered ">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="text-muted modal-title text-capitalize">{{ $item->title }}</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            @php

            $rating = App\Models\Rating::where('services_id', $item->id)->latest()->get();

            $countRating = count($rating);

            $avg = $rating->average('rate');

            $roundedAvg = round($avg, 1);

            $halfRating = $roundedAvg - floor($roundedAvg);

            $ratingRemainder = 5 - $roundedAvg;

            @endphp

            <div class="row">
              <div class="col-4 col-md-3 col-lg-4 text-center">
                <span class="text-primary h3 font-weight-bold">@if($avg == 0) 0.0 @else {{ number_format($avg, 1) }} @endif / 5.0</span>
                <br>
                <span class="text-primary">@include('layouts.rating')</span>
                <br>
                <span class="font-weight-bold text-capitalize">
                  @if($countRating > 0)
                  {{ number_format($countRating) }}
                  @if($countRating > 1)
                  reviews
                  @else
                  review
                  @endif
                  @endif
                </span>    
              </div>

              <div class="col-8 col-md-9 col-lg-5">
                <div class="row">
                  @for($i = 5; $i >= 1; $i--)
                  <div class="col-3 col-md-2 text-right">
                    <span class="font-weight-bold">{{ $i }}</span> <i class="fa-solid fa-star text-primary"></i>
                  </div>

                  <div class="col-9 col-md-7">
                   <div class="progress rounded-0">
                    <div class="progress-bar bg-primary" role="progressbar"
                    @if($countRating == 0)
                    style="width: 0%"
                    aria-valuenow="0"
                    @else
                    style="width: {{ round( count($rating->where('rate', $i)) / $countRating * 100 ) }}%"
                    aria-valuenow="{{ round( count($rating->where('rate', $i)) / $countRating * 100 ) }}"

                    @endif
                    aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="col-3">
                  <span class="font-weight-bold"> 
                    {{ number_format(count($rating->where('rate', $i))) }}
                  </span>
                </div>
                @endfor
              </div>
            </div>
          </div>
          <hr>
          @include('rating.data', ['activePage' => 'manage-item'])
        </div>

        @endforeach
      </tbody>
    </table>
  </form>

</div>
@else
<p class="text-center">No data</p>
@endif
