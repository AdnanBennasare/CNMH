@extends('layouts.app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ __('Pages-text.Tasks') }}</h1>
            </div>
            <div class="col-sm-6">
                <div class="float-sm-right">
                    <a href="./ajouter.html" class="btn btnAdd">Add New</a>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">

        
        @if(session('success'))
         <div class="alert alert-success">
        {{ session('success') }}
         </div>
           @endif  

           @if(session('error'))
           <div class="alert alert-danger">
          {{ session('error') }}
           </div>
           
             @endif 


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header col-md-12">

                        <div class="d-flex justify-content-between">
                                <div class=""> <!-- Set width for select element -->
                        <select id="filter_by_projects" class="js-example-basic-single" style="width:250px;" name="project">
                            <option value="">{{ __('Pages-text.All Projects') }}</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->Name }}">{{ $project->Name }}</option>
                            @endforeach
                        </select>                   
                            </div>


                            <div class="p-0">
                                <div class="input-group input-group-sm ">
                                    <input type="text" name="table_search" class="form-control"
                                        placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>



                       
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped text-nowrap">
                            <thead>
                                <tr>
                                    <th>Name task</th>
                                    <th>Name project</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>tache 1</td>
                                    <td>
                                        Project1
                                    </td>
                                    <td>11-7-2014</td>
                                    <td>11-7-2014</td>
                                    <td>
                                        <a href="./edit.html" class="btn btn-sm btn-default"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="button" class="btn btn-sm btn-danger"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </td>

                                </tr>
                                <tr>
                                    <td>tache 2</td>
                                    <td>
                                        Project1
                                    </td>
                                    <td>11-7-2014</td>
                                    <td>11-7-2014</td>
                                    <td>
                                        <a href="./edit.html" class="btn btn-sm btn-default"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="button" class="btn btn-sm btn-danger"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>tache 3</td>
                                    <td>
                                        Project1
                                    </td>
                                    <td>11-7-2014</td>
                                    <td>11-7-2014</td>
                                    <td>
                                        <a href="./edit.html" class="btn btn-sm btn-default"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <button type="button" class="btn btn-sm btn-danger"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-2">
                        <div class="d-flex align-items-center mb-2 ml-2 mt-2">
                            <button type="button" class="btn  btn-default btn-sm">
                                <i class="fa-solid fa-file-arrow-down"></i>
                                IMPORT</button>
                            <button type="button" class="btn  btn-default btn-sm mt-0 mx-2">
                                <i class="fa-solid fa-file-export"></i>
                                EXPORT</button>
                        </div>
                        <div class="">
                            <ul class="pagination  m-0 float-right mr-5">
                                <li class="page-item"><a class="page-link" href="#">«</a></li>
                                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>

@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
// In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});


$(document).ready(function() {
    $(document).on('click', '.delete-task', function () {
        var taskId = $(this).data('task-id');
        var taskName = $(this).data('task-title'); // Retrieve task name
        console.log(taskId);
        console.log(taskName); // Log the task name to verify

        var deleteUrl = "{{ route('tasks.destroy', ':id') }}";
        deleteUrl = deleteUrl.replace(':id', taskId);
        console.log(deleteUrl);

      
            $('#exampleModal .modal-body').html(`
            <div>
            {{ __('Pages-text.If you are sure you want to delete this task') }}
            <strong>"${taskName}"</strong>
            {{ __('Pages-text.click Delete to continue') }}
            </div>
            `);

        // Update form action URL
        $('#deleteForm').attr('action', deleteUrl);
    });
});



    const tableContainer = $('#table-container');
    var searchQuery = '';
    const search = (query = '', page = 1) => {
        $.ajax('{{ route('tasks.index') }}', {
            data: {
                query: query,
                page: page
            },
            success: (data) => updateTable(data)
        });
        history.pushState(null, null, '?query=' + query + '&page=' + page);
    };



const updateTable = (html) => {
    try {
        $('#resulthtml').html(html); // Target the tbody element and update its content
        updatePaginationLinks();
        console.log(html);
    } catch (error) {
        // console.error('Error updating table:', error);
    }
};


const updatePaginationLinks = () => {
    // console.log('updatePaginationLinks');

            $('button[page-number]').each(function() {
                $(this).on('click', function() {
                // console.log('click');

                    pageNumber = $(this).attr('page-number')
                    search(searchQuery, pageNumber)
                })
            })
        }
     

        
    $(document).ready(() => {
    // console.log('hey')
  
        $('#searchInput').on('input', function() {
            searchQuery = $('#searchInput').val();
            // searchQuery = $(this).val();
    console.log(searchQuery)

            search(searchQuery);
        });

        updatePaginationLinks();
        
    });

    $(document).ready(() => {
    // console.log('hey')
  
        $('#filter_by_projects').on('input', function() {
            searchQuery = $('#filter_by_projects').val();
            // searchQuery = $(this).val();
    console.log(searchQuery)

            search(searchQuery);
        });

        updatePaginationLinks();
        
    });
  
</script>


