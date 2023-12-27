   <!-- Main content -->
   <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title"> <strong> {{ __('Pages-text.Delete Acount')}} </strong></h3>
            </div>
            <div class="card-body">
              {{ __('Pages-text.Delete Acount Text')}} 
              <x-input-error :messages="$errors->userDeletion->get('password')" />
            </div>

            <!-- /.card-header -->
            <!-- form start -->
     

     <div class="card-footer">
      <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#modal-default" >
        {{ __('Pages-text.Delete Acount')}}
            </button>
     </div>



          </div>
          <!-- /.card -->
          </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->


   






  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')

            <div class="modal-header">
                <h2 class="modal-title" id="confirmModalLabel">{{ __('Pages-text.Are you sure you want to delete your account?')}}</h2>
            </div>

            <div class="modal-body">
                <p class="mt-1 text-sm text-muted">
                  {{ __('Pages-text.Delete Acount Text')}}
                </p>

                <div class="mb-3">
                    <label for="password" class="form-label sr-only">{{ __('Pages-text.Password')}}</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('Pages-text.Password')}}">
                </div>

                <x-input-error :messages="$errors->userDeletion->get('password')" class="text-danger" />

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close" >{{ __('Pages-text.Cancel')}}</button>
                <button type="submit" class="btn btn-danger">{{ __('Pages-text.Delete Acount')}}</button>
            </div>
        </form>
    </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
