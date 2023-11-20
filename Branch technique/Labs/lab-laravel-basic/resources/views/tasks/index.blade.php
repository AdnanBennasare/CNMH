@extends('welcome')
@section('section')

<div class="content-wrapper" style="min-height: 1302.4px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List des Projet</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <a href="{{route('tasks.create')}}" class="btn btn-sm btn-primary">Ajouter tâche</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header col-md-12">
                            <div class="d-flex justify-content-between">
                                <div class="form-group">
                                    <select class="form-control">
                                        <option selected>-- Select Project --</option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->name }}">{{ $project->name }}</option>
                                        @endforeach
                                    </select>
                                </div>   
                                <div class="">
                                    <input type="text" name="table_search" class="form-control"
                                        placeholder="Search">                               
                                </div>                                        
                        </div>                          
                        </div>
                        @include('tasks.tasksTable')
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



@endsection


