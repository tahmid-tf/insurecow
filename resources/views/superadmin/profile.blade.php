@extends('layouts.main')

@section('content')
<!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800 text-center">Super Admin Profile</h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" placeholder="Enter Full Name" value="{{ Auth::user()->name }}">
                </div>
                <div class="mb-3">
                  <label class="form-label">Email address</label>
                  <input type="email" class="form-control" placeholder="Enter Email" value="{{ Auth::user()->email }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Website</label>
                    <input type="text" name="website" class="form-control" placeholder="Enter Personal Website Address" value="{{ old('website') }}">
                  </div>

                <div class="mb-3">
                    <label  class="form-label">About</label>
                    <input type="text"  name="about" class="form-control" placeholder="Enter About" value="{{ old('about') }}">
                  </div>
                  <div class="form-control">
                    <i class="fa fa-upload" aria-hidden="true"></i>
                   <input type="file" name="image">
                  </div><br>

                <button type="submit" class="btn btn-primary" style="background: #086343">Submit</button>
              </form>
        </div>
        <!-- /.container-fluid -->
    </div>
<!-- End of Main Content -->
@endsection
