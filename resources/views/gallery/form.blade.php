    <input type="hidden" name="id" id="id" value="{{ isset($gallery)? $gallery->id : '' }}">
    <div class="row">
        <div class="col-7">
            <div id="imgContainer">
                <img src="" id="imgPreview">
            </div>
            <label for="photo">Photo <span class="text-danger">*</span></label>
            <input type="file" name="photo" class="form-control rounded-0" id="photo" placeholder="Image" accept="image/*">
            <span class="photo_error invalid-feedback" style="display: block;" role="alert"></span>
        </div>
    </div>

    <div class="mt-2">
        <button type="submit" class="btn btn-primary my-2 rounded-0" id="submit_form">
            Save
        </button>
    </div>