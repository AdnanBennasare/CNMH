@extends('layouts.app')
@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Pages-text.Create a Project') }}</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{ __('Pages-text.Add a Project') }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('projects.store')}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="Name">{{ __('Pages-text.Project Name') }}</label>
                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="Name" placeholder="{{ __('Pages-text.Enter Project Name') }}">
                    <div style="color:red">
                        @error("name")
                        {{$message}}
                        @enderror
                        </div>
                  </div>

                  <div class="form-group">
                    <label for="description">{{ __('Pages-text.Project Description') }}</label>
                    <input type="text" class="form-control" value="{{ old('description') }}" id="description" name="description" placeholder="{{ __('Pages-text.Enter Project Description') }}">
                    <div style="color:red">
                        @error("description")
                        {{$message}}
                        @enderror
                        </div>
                    
                  </div>
               

                  <div class="form-group">
                    <label for="start_date">{{ __('Pages-text.Start date') }}</label>
                    <input type="date" class="form-control" value="{{ old('start_date') }}" name="start_date" id="start_date">
                    <div style="color:red">
                        @error("start_date")
                        {{$message}}
                        @enderror
                        </div>
                  </div>

                  <div class="form-group">
                    <label for="end_date">{{ __('Pages-text.End date') }}</label>
                    <input type="date" class="form-control" value="{{ old('end_date') }}" name="end_date" id="end_date" >
                    <div style="color:red">
                      @error("end_date")
                      {{$message}}
                      @enderror
                      </div>
                  </div>
               
        
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{ __('Pages-text.Add a Project') }}</button>
           
                    <a href="{{route('projects.index')}}" type="submit" class="btn btn-secondary">{{ __('Pages-text.Cancel') }}</a>
  
                </div>
              </form>
            </div>
        </div>
    </div>
    </section>


            <!-- /.card -->

@endsection
