@extends('welcome')
@section('section')
<div class="content-wrapper" style="min-height: 1302.4px;">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
    
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">edit task</h3>
                        </div>
                        <form method="Post" action="{{route('tasks.update', $task->id)}}">
                            @csrf 
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input name="name" type="text" class="form-control"
                                        id="" placeholder="Enter Name" value="{{$task->name}}">
                                </div>
    
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <input name="description" type="text" class="form-control"
                                        id="" placeholder="Description" value="{{$task->description}}">
                                </div>
    
                                <label for="">Project</label>
                                <select name="projectsid" class="form-control">
                                    <option>-- Select Project --</option>
                                    <option selected value="{{ $selectedproject->id }}">{{$selectedproject->name}}</option>
                                    @foreach ($projects as $project)
                                    @if ($project->id !== $selectedproject->id) 
                                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
    
                            </div>
    
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">edit project</button>
                                <a href="" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
    
                </div>
            </div>
        </div>
    
    </section>
    </div>
@endsection
