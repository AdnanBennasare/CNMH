 
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>Description</th>                    
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>                     
                                        @foreach ($tasks as $task)    
                                    <tr>

                                        <td>{{$task->name}}</td>
                                        <td>{{$task->description}}</td>
                                        <td>
                                            <a href="././tache/index.html"
                                                class="btn btn-sm btn-primary">Preview
                                            </a>
                                        </td>
                                        <td>
                                            <a href="./edit.html" class="btn btn-sm btn-default"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>               
                                        @endforeach
                                </tbody>
                            </table>
                        </div>