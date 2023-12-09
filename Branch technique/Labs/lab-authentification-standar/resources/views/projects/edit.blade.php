@extends('mainPage')
@section('section')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>edit project</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <!-- general form elements -->
            <div class="col-md-12 card card-info">
              <div class="card-header">
                <h3 class="card-title">edit project {{ $project->name }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('projects.update', $project->id)}}">
                @csrf
                @method("PUT")
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">le nom Project</label>
                    <input type="text" class="form-control" value="{{ $project->name }}" name="name" id="name" placeholder="le nom Projet">
                    <div style="color:red">
                        @error("name")
                        {{$message}}
                        @enderror
                        </div>
                  </div>

                  <div class="form-group">
                    <label for="description">le nom description</label>
                    <input type="text" class="form-control" value="{{ $project->description }}" id="description" name="description" placeholder="description">
                    <div style="color:red">
                        @error("description")
                        {{$message}}
                        @enderror
                        </div>               
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info">edit projet</button>
           
                    <a href="{{route('projects.index')}}" type="submit" class="btn btn-secondary">Annuler</a>
  
                </div>
              </form>
            </div>
        </div>
    </div>
    </section>
</div>

            <!-- /.card -->

@endsection
