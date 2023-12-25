@extends('layouts.app')
@section('content')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <h1>{{ __('Pages-text.Profile')}}</h1>
                </div>  
              </div>
            </div><!-- /.container-fluid -->
          </section>
 
  
                    @include('profile.partials.update-profile-information-form')
        
  
                    @include('profile.partials.update-password-form')
       

       
                    @include('profile.partials.delete-user-form')
    

@endsection