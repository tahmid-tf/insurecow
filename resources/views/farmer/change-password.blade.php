@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 p-5">
        <div class="col-lg-6" style="margin: auto">
          <div class="card login-card p-5 h-100">
            <div class="card-body">
              @if ($message = Session::get('password_success'))
                <p class="p-welcome-text mb-5 alert alert-success">{{ $message }}</p>
                <!-- <div class="alert alert-success alert-block">
                    <strong>Password must contain at least 1 letter, 1 number, and 1 symbol. Minimum length is 8 characters.</strong>
                </div> -->
              @endif
              @if ($message = Session::get('password_failed'))
                <p class="p-welcome-text mb-5 alert alert-danger">{{ $message }}</p>
              @endif
              <form action="{{ route('farmer.password.update') }}" method="POST">
                @csrf  
              <!--User Name-->
                <div class="mb-4">
                  <label for="username" class="form-label">Old Password: </label>
                  <input type="password" class="form-control input-form" placeholder="Enter Old Password" required="required" name="current_password">
                </div>

                <!--User Password-->
                <div class="mb-4">
                  <label for="password" class="form-label">New Password: </label>
                  <input type="password" class="form-control input-form" id="password" placeholder="Enter New Password" required="required" name="new_password">
                </div>

                <!--User Password-->
                <div class="mb-4">
                  <label for="password" class="form-label">Confirm Password: </label>
                  <input type="password" class="form-control input-form" id="password" placeholder="Confirm New Password" required="required" name="verify_password">
                </div>

                <!--Log In Button-->
                <button type="submit" class="btn register-button mb-4">
                    Save
                </button>
                <a type="submit" class="btn btn-default mb-4">
                    Cancel
                </a>

              </form>
              <hr class="hr-style">
            </div>
          </div>
        </div>
        </div>
    </div>
</div>
@endsection