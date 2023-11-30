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
                                <div class="">
                                    <input type="text" id="search-input" name="table_search" class="form-control"
                                        placeholder="Search">                               
                                </div>                                        
                        </div>                          
                        </div>
                        <div class="result-table">
                            @include('tasks.tasksTable')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function (){
    console.log('hey');
     function fetchData(page , searchValue){
      $.ajax({
        url : '/?page=' + page + '&searchValue=' + searchValue,
        success: function(data){
            console.log(data);
          $('.result-table').html('');
          $('.result-table').html(data);
        }
      });
     }

     $('body').on('click', '.pagination a', function(param){

      param.preventDefault();

      var page = $(this).attr('href').split('page=')[1];
      var searchValue = $('#search-input').val();
      console.log($(this).attr('href').split('page=')[1]);
      console.log($(this).attr('href').split('page='));

      fetchData(page, searchValue);

     });

     $('body').on('keyup' , '#search-input' ,  function (){
      var page = $('#page').val();
      var searchValue = $('#search-input').val();
      console.log(searchValue);
      fetchData(page , searchValue);
     });

     fetchData(1, '');
  });
</script>
@endsection


