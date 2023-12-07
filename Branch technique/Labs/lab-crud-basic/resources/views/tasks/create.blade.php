@extends('welcome')
@section('section')
<div class="content-wrapper">
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ajoute task</h3>
                    </div>
                    <form method="post" action="{{route('tasks.store')}}">
                        @csrf 
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input name="title" type="text" class="form-control"
                                    id="" placeholder="Enter title">
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <input name="description" type="text" class="form-control"
                                    id="" placeholder="Description">
                            </div>

                            <label for="">Project</label>
                            <select name="projectsid" class="form-control">
                                <option selected>-- Select Project --</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="card-footer">
                            <a href="" class="btn btn-default">Cancel</a>
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
