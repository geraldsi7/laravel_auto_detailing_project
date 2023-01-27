<div class="form-row">
    <div class="form-group col-md-4">
        <label for="name">Full Name <span class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Full Name" value="{{ isset($users->name)? $users->name : old('name') }}" readonly>
        @if ($errors->has('name'))
        <span class="invalid-feedback" style="display: block;" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group col-md-3">
        <label for="address">Email <span class="text-danger">*</span></label>
        <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" placeholder="Email" value="{{ isset($users->email)? $users->email : old('email') }}" readonly>
        @if ($errors->has('email'))
        <span class="invalid-feedback" style="display: block;" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>

        <div class="form-group col-md-4">
     <label for="type">Role <span class="text-danger">*</span></label>
     <select name="role" class="form-control {{ $errors->has('role') ? ' is-invalid' : '' }}" id="role">
       
        <option value="ssa" @if( isset($users->role) ) {{ $users->role === 'ssa' ? 'selected' : null }} @endif> Super System Admin</option>

        <option value="sa" @if( isset($users->role) ) {{ $users->role === 'sa' ? 'selected' : null }} @endif> System Admin</option>

        <option value="tutor" @if( isset($users->role) ) {{ $users->role === 'tutor' ? 'selected' : null }} @endif>
            @if($users->school->type->name == "University")
            Lecturer
            @else
            Teacher
        @endif</option>

        <option value="student" @if( isset($users->role) ) {{ $users->role === 'student' ? 'selected' : null }} @endif> Student</option>

        
    </select>
    @if ($errors->has('role'))
    <span class="invalid-feedback" style="display: block;" role="alert">
        <strong>{{ $errors->first('role') }}</strong>
    </span>
    @endif
</div>

    <div class="form-group col-md-4">
     <label for="type">Gender <span class="text-danger">*</span></label>
     <select name="gender" class="form-control {{ $errors->has('gender') ? ' is-invalid' : '' }}" id="gender">
        @if( !isset($users->gender) )
        <option value="" disabled selected>-- Select Gender --</option>
        @endif
        
        <option value="male" @if( isset($users->gender) ) {{ $users->gender === 'male' ? 'selected' : null }} @endif> Male</option>

        <option value="female" @if( isset($users->gender) ) {{ $users->gender === 'female' ? 'selected' : null }} @endif> Female</option>
    </select>
    @if ($errors->has('gender'))
    <span class="invalid-feedback" style="display: block;" role="alert">
        <strong>{{ $errors->first('gender') }}</strong>
    </span>
    @endif
</div>
</div>

@if(isset($users->role))
<div class="form-row">
    <div class="form-group col-md-4">
     <label for="type">Role <span class="text-danger">*</span></label>
     <select name="role" class="form-control {{ $errors->has('role') ? ' is-invalid' : '' }}" id="role">

        <option value="ssa" @if( isset($users->role) ) {{ $users->role === 'ssa' ? 'selected' : null }} @endif> Super System Admin</option>

        <option value="sa" @if( isset($users->role) ) {{ $users->role === 'sa' ? 'selected' : null }} @endif> System Admin</option>

        <option value="tutor" @if( isset($users->role) ) {{ $users->role === 'tutor' ? 'selected' : null }} @endif>
            @if($users->school->type->name == "University")
            Lecturer
            @else
            Teacher
        @endif</option>

        <option value="student" @if( isset($users->role) ) {{ $users->role === 'student' ? 'selected' : null }} @endif> Student</option>

        
    </select>
    @if ($errors->has('role'))
    <span class="invalid-feedback" style="display: block;" role="alert">
        <strong>{{ $errors->first('role') }}</strong>
    </span>
    @endif
</div>
</div>
@endif

<div class="form-row">


    <div class="form-group col-md-3">
        <label for="address">Phone Number <span class="text-danger">*</span></label>
        <input type="number" name="phone1" class="form-control {{ $errors->has('phone1') ? ' is-invalid' : '' }}" id="phone1" placeholder="Phone Number" value="{{ isset($users->phone1)? $users->phone1 : old('phone1') }}">
        @if ($errors->has('phone1'))
        <span class="invalid-feedback" style="display: block;" role="alert">
            <strong>{{ $errors->first('phone1') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group col-md-3">
        <label for="address">Phone Number </label>
        <input type="number" name="phone2" class="form-control {{ $errors->has('phone2') ? ' is-invalid' : '' }}" id="phone2" placeholder="Phone Number" value="{{ isset($users->phone2)? $users->phone2 : old('phone2') }}">
        @if ($errors->has('phone2'))
        <span class="invalid-feedback" style="display: block;" role="alert">
            <strong>{{ $errors->first('phone2') }}</strong>
        </span>
        @endif
    </div>
</div>
@if(!isset($users->photo))
<div class="col-md-5">
    <label for="photo">Photo <span class="text-danger">*</span></label>
    <br>
    <input class="form-control {{ $errors->has('photo') ? ' is-invalid' : '' }}" placeholder="Photo" type="file" name="photo" value="{{ isset($users->photo)? $users->photo : old('photo') }}" id="photo">
    @if ($errors->has('photo'))
    <span class="invalid-feedback" style="display: block;" role="alert">
        <strong>{{ $errors->first('photo') }}</strong>
    </span>
    @endif
</div>
@endif
<div class="mt-2">
    <button type="submit" class="btn btn-primary btn-round btn-lg btn-block mt-2 mb-3 col-md-12" id="send_form">
        Save
    </button>
</div>
</div>
</div>



