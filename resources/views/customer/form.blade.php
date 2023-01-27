<div class="form-row">
    <input type="hidden" name="id" value="{{ isset( $customer ) ? $customer->id : '' }}">

    <div class="form-group col-12">
        <label for="name">Name <span class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" value="{{ isset($customer) ? $customer->name : old('name') }}">
        <span class="name_error font-weight-bold invalid-feedback" style="display: block;" role="alert"></span>
    </div>   

    <div class="form-group col-12">
        <label for="email">Email <span class="text-danger">*</span></label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ isset($customer)? $customer->email : old('email') }}">
        <span class="email_error font-weight-bold invalid-feedback" style="display: block;" role="alert"></span>
    </div>

    <div class="form-group col-12">
        <label for="password">Password <span class="text-danger">*</span></label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        <span class="password_error font-weight-bold invalid-feedback" style="display: block;" role="alert"></span>
    </div>

    <div class="form-group col-12">
        <label for="password">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">
    </div>

</div>

<div class="mt-2">
    <button type="submit" class="btn btn-primary rounded-0 btn-lg btn-block mt-2 mb-3 col-12-md-12" {{ !isset( $customer ) ? 'disabled' : '' }} id="submit_form">
        Save
    </button>
</div>
</div>
</div>



