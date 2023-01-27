<div class="form-row">
    <div class="form-group col">
        <label for="name">Category <span class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ isset( $category ) ? $category->name : old('name') }}">
        <span class="name_error font-weight-bold invalid-feedback" style="display: block;" role="alert"></span>
    </div>
</div>

<input type="hidden" name="id" value="{{ isset( $category ) ? $category->id : '' }}">

<div class="mt-2">
    <button type="submit" class="btn btn-primary rounded-0 btn-lg btn-block mt-2 mb-3 col-md-12" {{ !isset( $category ) ? 'disabled' : '' }} id="submit_form">
        Save
    </button>
</div>


