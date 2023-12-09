@extends('mainPage')
@section('section')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">ajouter project</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->


        <div class="d-flex justify-content-center">
            <!-- general form elements -->
            <div class="col-md-12 card card-primary card-create">
              <div class="card-header">
                <h3 class="card-title">Ajouter project</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('projects.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                      <label for="name">le nom de project</label>
                      <input type="text" class="form-control" id="name" value="{{old("name")}}" name="name" placeholder="Enter name">
                      <div style="color:red">
                      @error("name")
                      {{$message}}
                      @enderror
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="description">la description de project</label>
                      <input type="text" class="form-control" id="description" value="{{old("description")}}" name="description" placeholder="Enter discription">
                      <div style="color:red">
                      @error("description")
                      {{$message}}
                      @enderror
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                    <div class="d-flex">
                        <div class="p-2">
                            <button type="submit" class="btn btn-primary">ajouter</button>
                        </div>

                        <div class="ml-auto p-2">
                            <a href="{{route('projects.index')}}" type="submit" class="btn btn-secondary">Annuler</a>
                        </div>
                      </div>
                </div>
              </form>
            </div>
            <!-- /.card -->



          </div>


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.control-sidebar -->

@endsection
