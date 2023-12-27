@extends('layouts.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Pages-text.Projects list') }}</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        @can('create-ProjectController')
                        <a href="{{route('projects.create')}}" class="btn btnAdd">{{ __('Pages-text.Create a Project') }}</a>
                        @endcan
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
                            <div class=" p-0">
                                <div class="input-group input-group-sm float-sm-right col-md-3 p-0">
                                    <input type="text" name="search" class="form-control float-right"
                                     id="searchInput" placeholder="{{ __('Pages-text.Search') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                   
                        <div id="resulthtml">
                            @include('projects.projectTablePartial')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>



$(document).ready(function() {
    $(document).on('click', '.delete-project', function () {
        var projectId = $(this).data('project-id');
        var projectName = $(this).data('project-name'); // Retrieve project name
        console.log(projectId);
        console.log(projectName); // Log the project name to verify

        var deleteUrl = "{{ route('projects.destroy', ':id') }}";
        deleteUrl = deleteUrl.replace(':id', projectId);
        console.log(deleteUrl);

        // Update modal content with the project name
        $('#modal-default .modal-body').html(`
    <div>
        {{ __('Pages-text.Are you sure you want to delete this project') }}
        <strong>"${projectName}"</strong>
        {{ __('Pages-text.Click delete to procced to delete this project') }}
    </div>
`);
        
        // Update form action URL



        $('#deleteForm').attr('action', deleteUrl);
    });
});


    // const tableContainer = $('#table-container');
    var searchQuery = '';
    const search = (query = '', page = 1) => {
        $.ajax('{{ route('projects.index') }}', {
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
        // console.log(html);
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
  
    
   

</script>