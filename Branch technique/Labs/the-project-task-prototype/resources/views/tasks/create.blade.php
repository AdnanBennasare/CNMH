@extends('dashboard')
@section('section')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Pages-text.Add task task To Project') }}</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
              <h3 class="card-title">{{ __('Pages-text.Create a task for Project') }} <strong>"{{$projectName}}"</strong>.</h3>
              </div>
              <!-- .card-header -->
              <!-- form start -->
              <form method="post" action="{{route('tasks.store')}}">
                @csrf
                <div class="card-body">
                    <input type="hidden" value="{{$projectId}}" name="project_id">
                  <div class="form-group">
                    <label for="title">{{ __('Pages-text.Task Title') }}</label>
                    <input type="text" class="form-control" value="{{ old('title') }}" name="title" id="title" placeholder="{{ __('Pages-text.Enter Task Title') }}">
                    <div style="color:red">
                        @error("title")
                        {{$message}}
                        @enderror
                        </div>
                  </div>

                  <div class="form-group">
                    <label for="description">{{ __('Pages-text.Task Description') }}</label>
                    <input type="text" class="form-control" value="{{ old('description') }}" id="description" name="description" placeholder="{{ __('Pages-text.Enter Task Description') }}">
                    <div style="color:red">
                        @error("description")
                        {{$message}}
                        @enderror
                        </div>                   
                  </div>
               
               
        
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success">{{ __('Pages-text.Create task') }}</button>
           
                    <a href="{{route('projects.index')}}" type="submit" class="btn btn-secondary">{{ __('Pages-text.Cancel') }}</a>
  
                </div>
              </form>
            </div>
        </div>
    </div>
    </section>
</div>

            <!-- /.card -->

@endsection
