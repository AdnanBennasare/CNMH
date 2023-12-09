@extends('mainPage')
@section('section')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>modify task</h1>
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
              <h3 class="card-title">edit</h3>
              </div>
              <!-- .card-header -->
              <!-- form start -->
              <form method="post" action="{{route('tasks.update', $task->id)}}">
                @csrf 
                @method("PUT")
                <div class="card-body">
                <input type="hidden" name="project_id" value="{{$task->project_id}}">
                  <div class="form-group">
                    <label for="title">Titre de tache</label>
                    <input type="text" class="form-control" value="{{$task->title}}" name="title" id="title" placeholder="entre le titre de tache">
                    <div style="color:red">
                        @error("title")
                        {{$message}}
                        @enderror
                        </div>
                  </div>

                  <div class="form-group">
                    <label for="description">Description de tache</label>
                    <input type="text" class="form-control" value="{{$task->description}}" id="description" name="description" placeholder="Entre Tache Description">
                    <div style="color:red">
                        @error("description")
                        {{$message}}
                        @enderror
                        </div>                   
                  </div>
               
               
        
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">modifie tache</button>
           
                    <a href="{{route('projects.index')}}" type="submit" class="btn btn-secondary">annuler</a>
  
                </div>
              </form>
            </div>
        </div>
    </div>
    </section>
</div>

            <!-- /.card -->

@endsection
