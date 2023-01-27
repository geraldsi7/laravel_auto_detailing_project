 @auth
 <center>
    @if(isset($user_rating))
    @for($i = 1; $i <= $user_rating->rate; $i++)
     <i class="fa-solid fa-star ms-2 text-primary submit_star h2" id="submit_star_{{ $i }}" data-rating="{{ $i }}"></i>
     @endfor
     @for($i = $user_rating->rate + 1; $i <= 5; $i++)
     <i class="fa-regular fa-star ms-2 text-primary submit_star h2" id="submit_star_{{ $i }}" data-rating="{{ $i }}"></i>
     @endfor
     @else
     @for($i = 1; $i <= 5; $i++)
     <i class="fa-regular fa-star ms-2 text-primary submit_star h2" id="submit_star_{{ $i }}" data-rating="{{ $i }}"></i>
     @endfor
     @endif
 </center>
 <input type="hidden" name="rate" id="rate" value="{{ isset($user_rating)? $user_rating->rate : old('rate') }}">
 <input type="hidden" name="services_id" value="{{ $item->id }}">
 <div class="form-group col-12">
    <textarea class="form-control {{ $errors->has('review') ? ' is-invalid' : '' }}" id="review" name="review" rows="5" placeholder="Write Review (optional)">{{ isset($user_rating->review)? $user_rating->review : old('review') }}</textarea>
    @if ($errors->has('review'))
    <span class="invalid-feedback" style="display: block;" role="alert">
        <strong>{{ $errors->first('review') }}</strong>
    </span>
    @endif
</div>

<div class="mt-2">
    <button type="submit" class="btn btn-primary rounded-0 btn-lg my-2 col-12" id="submit_form"  @if(!isset($user_rating)) disabled @endif>
        Post
    </button>
</div>

@endauth