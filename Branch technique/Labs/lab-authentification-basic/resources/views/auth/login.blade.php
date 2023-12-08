@extends('inscreptionPage')
@section('section')

<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>soli</b>coders</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{route('login')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" name="loginemail" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('loginemail')
          <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" name="loginpassword" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('loginpassword')
          <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="row">
    
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <p class="col-8">
            <a href="{{route('registerPage')}}" class="text-center">Register a new membership</a>
          </p>
          <!-- /.col -->
        </div>
      </form>

 
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

@endsection

