<div id="table-container" class="card-body table-responsive p-0">
                            <table class="table table-striped text-nowrap">
                                <thead>
                                    <tr>
                                        <th>title</th>
                                        <th>Description</th>  
                                        <th>project</th>                    
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">                     
                                        @foreach ($tasks as $task)    
                                    <tr>

                                        <td>{{$task->title}}</td>
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
                        <div class="float-right">
                            <div id="paginationContainer">                 
                                @if ($tasks->count() > 0)
                                <ul class="pagination m-0">
                                    @if ($tasks->onFirstPage())
                                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                            <span class="page-link" aria-hidden="true">«</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <button class="page-link" page-number="{{ $tasks->currentPage() - 1 }}" rel="prev"
                                                aria-label="@lang('pagination.previous')">«</button>
                                        </li>
                                    @endif
                        
                                    @for ($i = 1; $i <= $tasks->lastPage(); $i++)
                                        @if ($i == $tasks->currentPage())
                                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $i }}</span></li>
                                        @else
                                            <li class="page-item"><button class="page-link" page-number="{{ $i }}">{{ $i }}</button></li>
                                        @endif
                                    @endfor
                        
                                    @if ($tasks->hasMorePages())
                                        <li class="page-item">
                                            <button class="page-link" page-number="{{ $tasks->currentPage() + 1 }}" rel="next"
                                                aria-label="@lang('pagination.next')">»</button>
                                        </li>
                                    @else
                                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                            <span class="page-link" aria-hidden="true">»</span>
                                        </li>
                                    @endif
                                </ul>
                            @endif              
                            </div>
                        </div> 