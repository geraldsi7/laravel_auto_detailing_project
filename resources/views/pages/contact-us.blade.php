@extends('layouts.app', [
'namePage' => 'Our Company',
'class' => 'login-page sidebar-mini ',
'activePage' => 'contact-us',
'backgroundImage' => asset('assets') . "/img/bg-main.jpg",
])

@section('content')

<div class="bg-skewed bg-testimonials">
    <div class="content">
        <p class="h2 text-white font-weight-bold text-capitalize">Contact Us</p>
        <p class="text-white">Let’s perfect and protect your vehicle! Please use the form below to contact us.</p>
    </div>
</div>
<div class="container" style="margin-top: 10em;">
    <p class="h5 text-center">Let’s begin</p>
    <div class="mt-3 col-md-9 mx-auto">

        <form class="form-horizontal" id="upload_form" enctype="multipart/form-data">
            @csrf
            <div class="my-3">
                <label>Contact Info <span class="text-danger">*</span></label>
                <div class="form-row">
                    <div class="col">
                        <input type="text" id="first_name" name="first_name" class="form-control py-3 rounded-0" placeholder="First Name" autofocus>
                        <span class="first_name_error font-weight-bold invalid-feedback" style="display: block;" role="alert"></span>
                    </div>
                    <div class="col">
                        <input type="text" id="last_name" name="last_name" class="form-control py-3 rounded-0" placeholder="Last Name">
                        <span class="last_name_error font-weight-bold invalid-feedback" style="display: block;" role="alert"></span>
                    </div>
                </div>
            </div>

            <div class="my-3">
                <label>Vehicle Details <span class="text-danger">*</span></label>
                <div class="form-row">
                    <div class="col">
                        <input type="text" id="year" name="year" class="form-control py-3 rounded-0" placeholder="Year">
                        <span class="year_error font-weight-bold invalid-feedback" style="display: block;" role="alert"></span>
                    </div>
                    <div class="col">
                        <input type="text" id="make" name="make" class="form-control py-3 rounded-0" placeholder="Make">
                        <span class="make_error font-weight-bold invalid-feedback" style="display: block;" role="alert"></span>
                    </div>
                    <div class="col">
                        <input type="text" id="model" name="model" class="form-control py-3 rounded-0" placeholder="Model">
                        <span class="model_error font-weight-bold invalid-feedback" style="display: block;" role="alert"></span>
                    </div>
                    <div class="col">
                        <select class="form-control py-3 rounded-0" name="type" id="type">
                            <option value="" disabled selected>-- Type --</option>
                            <option value="Convertible">Convertible</option>
                            <option value="Coupe">Coupe</option>
                            <option value="Hatchback">Hatchback</option>
                            <option value="Jeep">Jeep</option>
                            <option value="SUV">SUV</option>
                            <option value="Sedan">Sedan</option>
                            <option value="Truck">Truck</option>
                            <option value="Van">Van</option>
                            <option value="Wagon">Wagon</option>
                        </select>
                        <span class="type_error font-weight-bold invalid-feedback" style="display: block;" role="alert"></span>
                    </div>
                </div>
            </div>

            <div class="my-3">
                <label>Contact Details <span class="text-danger">*</span></label>
                <div class="form-row">
                    <div class="col">
                        <input type="text" id="email" name="email" class="form-control py-3 rounded-0" placeholder="Email">
                        <span class="email_error font-weight-bold invalid-feedback" style="display: block;" role="alert"></span>
                    </div>
                    <div class="col">
                        <input type="text" id="phone_number" name="phone_number" class="form-control py-3 rounded-0" placeholder="Phone Number">
                        <span class="phone_number_error font-weight-bold invalid-feedback" style="display: block;" role="alert"></span>
                    </div>
                </div>
            </div>

            <div class="my-3">
                <label>Description <span class="text-danger">*</span></label>
                <div class="form-row">
                    <div class="col">
                        <textarea id="description" name="description" class="form-control py-3 rounded-0" placeholder="Tell us how we may perfect and protect your vehicle..."></textarea>
                    </div>
                    <span class="description_error font-weight-bold invalid-feedback" style="display: block;" role="alert"></span>
                </div>
            </div>

            <div class="my-3">
                <button id="submit_btn" class="btn btn-primary rounded-0">Submit</button>
            </div>
        </form>

    </div>
</div>

<script>
    $(document).on('submit', '#upload_form', function(e) {
        $('#submit_btn').prop('disabled', true);

        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "{{ route('cart.store') }}",
            data: $(this).serialize(),
            success: function(response) {
                $('#upload_form :input').removeClass('is-invalid');

                $('#upload_form .invalid-feedback').text("");

                if (response.status == 0) {
                    toastr.error(response.msg);
                    $.each(response.error, function(prefix, val) {
                        prefix = prefix.replace('.', '_');
                        $('#' + prefix).addClass('is-invalid');
                        $('.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    toastr.success(response.msg);

                    $('#upload_form :input').removeClass('is-invalid');

                    $('#upload_form .invalid-feedback').text("");

                    $('#upload_form')[0].reset();
                }

                $('#submit_btn').prop('disabled', false);
            }
        });
    });
</script>

@endsection