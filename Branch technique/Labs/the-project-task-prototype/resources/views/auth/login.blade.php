@extends('InscreptionsPage')
 @section('section')
<div class="hold-transition login-page">

  <div class="login-box">
   <div class="login-logo">
     <a><b>Soli</b>coders</a>
   </div>
   <!-- /.login-logo -->
   <div class="card">
     <div class="card-body login-card-body">
       <p class="login-box-msg">{{ __('Pages-text.log in needed') }}</p>
 
       <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- email --}}
         <div class="input-group mb-3">
           <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('Pages-text.Email') }}" value="{{old('email')}}"  required autofocus autocomplete="username" />
                
           <div class="input-group-append">
             <div class="input-group-text">
               <span class="fas fa-envelope"></span>
             </div>
           </div>
             @if($errors->has('email'))
                   <div class="text-danger">
                      {{ $errors->first('email') }}
                  </div>
            @endif  
         </div>

{{-- password --}}
         <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Pages-text.Password') }}" required autocomplete="new-password" />
          

           <div class="input-group-append">
             <div class="input-group-text">
               <span class="fas fa-lock"></span>
             </div>
           </div>
           @if($errors->has('password'))
           <div class="text-danger">
              {{ $errors->first('password') }}
          </div>
          @endif 
         </div>


         <div class="row">
           <div class="col-8">
             <div class="icheck-primary">
               <input type="checkbox" id="remember">
               <label for="remember">
                {{ __('Pages-text.Remember Me') }}
                 
               </label>
             </div>
           </div>
           <!-- /.col -->
           <div class="col-4">
             <button type="submit" class="btn btn-primary">{{ __('Pages-text.Sign in') }}</button>
           </div>
           <!-- /.col -->
         </div>
       </form>
       <!-- /.social-auth-links -->
 
       <p class="mb-1 mt-2">
        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">{{ __('Pages-text.I forgot my password') }}</a>
        @endif
       </p>
     </div>
     <!-- /.login-card-body -->
   </div>
 </div>
 <div style="margin-left:18%;" class="mt-4">
  <x-language title="{{ __('Pages-text.language') }}" />
 </div>
</div>
@endsection



 