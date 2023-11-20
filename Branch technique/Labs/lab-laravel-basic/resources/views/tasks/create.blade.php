@extends('welcome')
@section('section')
<div class="content-wrapper" style="min-height: 1302.4px;">

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ajoute task</h3>
                    </div>
                    <form method="Post" action="{{route('tasks.store')}}">
                        @csrf 
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input name="name" type="text" class="form-control"
                                    id="exampleInputEmail1" placeholder="Enter email">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <input name="description" type="text" class="form-control"
                                    id="exampleInputPassword1" placeholder="Description">
                            </div>

                            <select class="form-control">
                                <option selected>-- Select Project --</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->name }}">{{ $project->name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="card-footer">
                            <a href="./index.html" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-primary">ajouter project</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</section>
</div>

@endsection
