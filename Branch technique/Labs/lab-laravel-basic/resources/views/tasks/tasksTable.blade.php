<div class="card-body table-responsive p-0">
                            <table class="table table-striped text-nowrap">
                                <thead>
                                    <tr>
                                        <th>name</th>
                                        <th>Description</th>  
                                        <th>project</th>                    
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">                     
                                        @foreach ($tasks as $task)    
                                    <tr>

                                        <td>{{$task->name}}</td>
                                        <td>{{$task->description}}</td>
                                        <th>{{$task->project_id}}</th>                    

                                        <td class="text-center" >
                                             
                                            <a href="{{route('tasks.edit', $task->id)}}" class="btn btn-sm btn-default"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                                    
                                        
                                                <form action="{{route('tasks.destroy', $task->id)}}" method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash">
                                                        </i>                              
                                                    </button>
                                                </form>
                                        </td>
                                    </tr>               
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            {{$tasks->links()}}
                        </div>