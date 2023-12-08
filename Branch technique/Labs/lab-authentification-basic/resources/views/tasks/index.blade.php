@extends('welcome')
@section('section')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List des taches</h1>
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
                                <div class="">
                                    <input type="text" id="searchInput" name="table_search" class="form-control"
                                        placeholder="Search">                               
                                </div>                                        
                        </div>                          
                        </div>
                        <div id="resulthtml">
                            @include('tasks.tasksTable')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>


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
                console.log('click');

                    pageNumber = $(this).attr('page-number')
                    search(searchQuery, pageNumber)
                })
            })
        }
     
        
    $(document).ready(() => {
    // console.log('hey')
  
        $('#searchInput').on('input', function() {
            searchQuery = $('#searchInput').val();
            searchQuery = $(this).val();
    console.log(searchQuery)

            search(searchQuery);
        });

        updatePaginationLinks();
        
    });

</script>




