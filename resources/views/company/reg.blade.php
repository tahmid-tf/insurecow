@if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
          {{session()->get('message')}}
          </div>

        @endif
@extends('layouts.main')

@section('content')
<!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800 text-center"><u> Register Field Agent</u></h1>
    @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
            <form action="" method="post">
              @csrf
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Employee ID</label>
                    <input type="text" name="name" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Date Of Birth</label>
                    <input type="date" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control">
                  </div>
                <div class="mb-3">
                  <label class="form-label">Email address</label>
                  <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">NID</label>
                    <input type="text" name="nid" class="form-control">
                  </div>
                <div class="mb-3">
                  <label  class="form-label">Password</label>
                  <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label  class="form-label">Address</label>
                    <input type="text" name="adress" class="form-control">
                  </div>
                  
                <button type="submit" class="btn btn-primary form-control">Submit</button>
              </form>
        </div>
        <!-- /.container-fluid -->
    </div>
<!-- End of Main Content -->
@endsection