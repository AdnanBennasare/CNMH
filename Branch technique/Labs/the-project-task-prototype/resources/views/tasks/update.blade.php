@extends('dashboard')
@section('section')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ __('Pages-text.Modify Task') }}</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
              <h3 class="card-title">{{ __('Pages-text.Edit Task') }}</h3>
              </div>
              <!-- .card-header -->
              <!-- form start -->
              <form method="post" action="{{route('tasks.update', $task->id)}}">
                @csrf 
                @method("PUT")
                <div class="card-body">
                <input type="hidden" name="project_id" value="{{$task->Project_Id}}">
                  <div class="form-group">
                    <label for="title">{{ __('Pages-text.Task Title') }}</label>
                    <input type="text" class="form-control" value="{{$task->Title}}" name="title" id="title" placeholder="{{ __('Pages-text.Enter Task Title') }}">
                    <div style="color:red">
                        @error("title")
                        {{$message}}
                        @enderror
                        </div>
                  </div>

                  <div class="form-group">
                    <label for="description">{{ __('Pages-text.Task Description') }}</label>
                    <input type="text" class="form-control" value="{{$task->Description}}" id="description" name="description" placeholder="{{ __('Pages-text.Enter Task Description') }}">
                    <div style="color:red">
                        @error("description")
                        {{$message}}
                        @enderror
                        </div>                   
                  </div>
               
               
        
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">{{ __('Pages-text.Modify') }}</button>
           
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
