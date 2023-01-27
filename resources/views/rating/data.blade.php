<span id="fetchedRatingCount" class="d-none">{{ count($rating) }}</span>

@forelse($rating as $review)
<div class="my-2 col-12 @auth @if($review->user->id == auth()->user()->id) order-1 @else order-2 @endif @endauth">
  <span class="font-weight-bold text-capitalize">{{ $review->user->name }}</span>
  <br>
  @for($i = 1; $i <= $review->rate; $i++)
   <i class="fa-solid fa-star" aria-hidden="true"></i>
   @endfor

   @for($i = 1; $i <= 5 - $review->rate; $i++)
    <i class="fa-regular fa-star"></i>
    @endfor
    <p class="mt-1">{{ $review->review }}</p>
    @auth
    @if($review->user->id == auth()->user()->id)
    <div class="{{ $activePage == 'manage-item' ? 'd-none' : '' }}">
    <a href="" type="button"  data-id="{{ $review->id }}" class="deleteReview text-primary">
      <i class="fa-solid fa-trash"></i>
    </a>

    <a href="" type="button"  data-toggle="modal" data-target="#postReviewModal" class="text-primary text-capitalize">
      <i class="fa fa-pencil-alt pl-4"></i>
    </a>
  </div>
    @endif
    @endauth

    <p class="text-muted">{{ $review->updated_at->diffForHumans() }}</p>
  </div>
  @empty
  <p class="text-capitalize text-primary text-center">no reviews
  </p>
  @endforelse