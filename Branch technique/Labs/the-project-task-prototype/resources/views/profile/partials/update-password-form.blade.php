   <!-- Main content -->
   <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title"> <strong>{{ __('Pages-text.Update the Password')}}</strong></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
     
                
    <form method="post" action="{{ route('password.update') }}" id="quickForm">
        @csrf
        @method('put')


              <div class="card-body">
                <p>{{ __('Pages-text.Make sure your account uses a long, random password to stay secure.')}}</p>


                <div class="form-group">
                  <label for="current_password">{{ __('Pages-text.Current Password')}}</label>
                  <input type="password" name="current_password" class="form-control" id="current_password" placeholder="{{ __('Pages-text.Current Password')}}" autocomplete="current-password">
                <x-input-error :messages="$errors->updatePassword->get('current_password')"  />
                </div>




                <div class="form-group">
                  <label for="password">{{ __('Pages-text.New Password')}}</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="{{ __('Pages-text.New Password')}}" autocomplete="new-password" >
                  <x-input-error :messages="$errors->updatePassword->get('password')" />

                </div>


        <div class="form-group">
            <label for="password_confirmation">{{ __('Pages-text.Password Confirmation')}}</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="{{ __('Pages-text.Password Confirmation')}}" autocomplete="new-password" >
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" />
          </div>

          <div class="flex items-center gap-4">

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-success"
                >{{ __('Saved.') }}</p>
            @endif
        </div>

         
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-success">{{ __('Pages-text.Update Password')}}</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
          </div>
        <!--/.col (left) -->
        <!-- right column -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->


