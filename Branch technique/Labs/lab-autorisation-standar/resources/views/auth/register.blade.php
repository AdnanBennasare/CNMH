@extends('inscreptionPage')
@section('section')
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>soli</b>coders</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Inscrire un nouveau membre
    </p>

      <form action="{{route('register')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          @error('name')
          <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
          <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
      <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password_confirmation')
          <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block mb-3">Register</button>
          </div>
          <div class="col-8">
            <a href="{{route('loginPage')}}" class="text-center">J’ai déjà une adhésion
            </a>
          </div>
         
          <!-- /.col -->
        </div>
      </form>

     
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
@endsection
