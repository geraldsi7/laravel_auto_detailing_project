@if($halfRating <= 0.4)
@for($i = 1; $i <= $roundedAvg; $i++)
<i class="fa-solid fa-star" aria-hidden="true"></i>
@endfor
@for($i = $roundedAvg; $i < 5; $i++)
<i class="fa-regular fa-star"></i>
@endfor
@else
@for($i = 1; $i <= $roundedAvg; $i++)
<i class="fa-solid fa-star" aria-hidden="true"></i>
@endfor          
<i class="fa-regular fa-star-half-stroke"></i>
@if($roundedAvg <= 4.5)
@for($i = 1; $i < $ratingRemainder; $i++)
<i class="fa-regular fa-star"></i>
@endfor
@endif
@endif
