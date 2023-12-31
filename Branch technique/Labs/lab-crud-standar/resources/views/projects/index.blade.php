@extends('mainPage')
@section('section')

    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">les projets
                    </h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header   -->

    <!-- Main content -->
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
           
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header">
                  
                      {{-- Add new project button  --}}
            
                <div class="float-left">
                <a href="{{ route('projects.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
                </div>

                      {{-- search input  --}}
                      
                      <div class="input-group input-group-sm float-right search-container" style="width: 190px;">
                        <!-- SEARCH input -->
                        <input style="height: 35px;" type="text" name="search" id="searchInput" class="form-control" placeholder="Search">           
                    </div>
              
                </div>
                <div id="resulthtml">
                    @include('projects.projectsTable')
                </div>



              </div>
            </div>
        
              
    </section>
    <!-- /.content -->
</div>

@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>


$(document).ready(function() {
    $(document).on('click', '.delete-project', function () {
        console.log('hey');
        var projectId = $(this).data('project-id');
        var projectName = $(this).data('project-name'); // Retrieve project name
        console.log(projectId);
        console.log(projectName); // Log the project name to verify

        var deleteUrl = "{{ route('projects.destroy', ':id') }}";
        deleteUrl = deleteUrl.replace(':id', projectId);
        console.log(deleteUrl);


        $('#exampleModal .modal-body').html(`
    <div>
        Pages-text.Are you sure you want to delete this project
        <strong>"${projectName}"</strong>
        Pages-text.Click delete to procced to delete this project
    </div>
`);
    
$('#deleteForm').attr('action', deleteUrl);
    });
});

    const tableContainer = $('#table-container');
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
        console.log(html);
    } catch (error) {
        console.error('Error updating table:', error);
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
    console.log('hey')
        $('#searchInput').on('input', function() {
            searchQuery = $('#searchInput').val();
            console.log(searchQuery)
            search(searchQuery);
        });

        updatePaginationLinks();
    });
  
    
   

</script>
