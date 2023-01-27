<div class="form-row">    
    <div class="form-group col-md-4">
        <label for="name">Category <span class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Name" value="{{ isset($titles)? $titles->name : old('name') }}">
        @if ($errors->has('name'))
        <span class="invalid-feedback" style="display: block;" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>
</div>

    <div class="mt-2">
        <button type="submit" class="btn btn-primary btn-round btn-lg btn-block mt-2 mb-3 col-md-12" id="send_form">
            Save
        </button>
    </div>
</div>
</div>



