
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav mt-1">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-lg"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="bi bi-person-circle text-lg"></i>
        {{ Auth::user()->name }}
      </a>
      <div class="dropdown-menu dropdown-menu dropdown-menu-right">
        <a href="{{ route('projects.profileEdit') }}" class="dropdown-item">
          {{ __('Pages-text.Profile') }}
        </a>
        <div class="dropdown-divider"></div>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="dropdown-item">{{ __('Pages-text.Log out') }}</button>
        </form>
      </div>
    </li>


  <!-- Messages Dropdown Menu -->
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="bi bi-globe text-lg"></i>
      {{__('Pages-text.language')}}
    </a>
    <div class="dropdown-menu dropdown-menu dropdown-menu-right">
      <a class="dropdown-item" href="{{ route('localization', ['locale' => 'fr']) }}">Français</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="{{ route('localization', ['locale' => 'en']) }}">English</a>
    </div>
  </li>

    {{-- full screen --}}
    <li class="nav-item mt-1">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt text-lg"></i>
      </a>
    </li>

  </ul>
</nav>
<!-- /.navbar -->



