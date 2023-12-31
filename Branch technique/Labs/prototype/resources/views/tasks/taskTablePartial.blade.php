<div class="" id="tablecontainer">
    <div class="card-body p-0 table-data">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('Pages-text.Task Title') }}</th>
                    <th>{{ __('Pages-text.Task Description') }}</th>
                    <th>{{ __('Pages-text.Project Name') }}</th>
                    <th class="project-actions text-center">Actions</th>        
                </tr>
            </thead>
            <tbody id="tbodyresults">
                @forelse($tasks as $task)
<tr>
    <td>{{ $task->Title }}</td>
    <td>
        @php
            $words = explode(' ', $task->Description);
            $shortenedDescription = implode(' ', array_slice($words, 0, 4));
            $remainingWords = count($words) - 4;
        @endphp
    
        {{ $shortenedDescription }} @if ($remainingWords > 0) ... @endif
    </td>
    {{-- relation --}}
    <td>{{ $task->project->Name }}</td>   
    <td class="project-actions text-center">

        <a class="btn btn-primary btn-sm" href="{{route('tasks.show', $task->id)}}">
            <i class="fas fa-folder"></i>
        </a>

        @can('edit-TasksController')
        {{-- edit --}}
        <a class="btn btn-info btn-sm" href="{{route('tasks.edit', $task->id)}}">
            <i class="fas fa-pencil-alt"></i>    
        </a>
        @endcan
  
  
        @can('destroy-TasksController')
              
        <button type="button" class="btn btn-danger delete-task" data-toggle="modal" data-target="#modal-default" data-task-id="{{ $task->id }}" data-task-title="{{ $task->Title }}" >
            <i class="fa-solid fa-trash-can"></i>
                </button>
        @endcan

    </td>
</tr>
@empty
<tr class="text-center">
    <td colspan="4">
        {{ __('Pages-text.No Products found') }}
    </td>
</tr>
    

@endforelse
            </tbody>
        </table>
    </div>






<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteForm" style="display: inline-block;" action="" method="post">
                @csrf
                @method("DELETE")

                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">{{ __('Pages-text.Are you sure you want to delete this task') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                <div class="modal-body">
                   
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Pages-text.Cancel') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('Pages-text.Delete') }}</button>
                </div>
            </form>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>




    <div class="card-footer clearfix">
     
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
       
        <div class="float-left d-flex">
        @can('export-TasksController')

            <a href="{{ route('export.task') }}"  style="height: 38px;" class="btn text-black border border-dark">
                {{ __('Pages-text.Export') }} <i class="fa-solid fa-upload pl-2"></i>
            </a>
            @endcan
            @can('import-TasksController')
  
            
            <form action="{{ route('import.task') }}" class="pl-1" method="post" enctype="multipart/form-data" id="importForm">
                @csrf 
                <input type="file" name="tasks" id="formFileInputtasks" style="position: absolute; left: -9999px;">
                <button type="button" id="importbutton" class="btn text-black border border-dark">{{ __('Pages-text.Import') }} <i class="fa-solid fa-download pl-2"></i></button>
            </form>
            @endcan

            
        </div>  
        <script>
            $(document).ready(function() {
                $('#importbutton').click(function() {
                    $('#formFileInputtasks').click();
                });
            
                $('#formFileInputtasks').change(function() {
                    // Assuming you want to submit the form when a file is selected
                    $('#importForm').submit();
                });
            });
            </script>   
       
    </div>
</div>