<x-laravel-ui-adminlte::adminlte-layout>
       {{-- <link rel="stylesheet" href="{{ asset('../../css/app.css') }}"> --}}
       <link rel="stylesheet" href="{{ asset('css/app.css') }}">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
       <link rel="stylesheet" href="{{ asset('select2\select2.min.css') }}">
       
       {{-- <link rel="stylesheet" href="{{ asset('') }}"> --}}

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Main Header -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                </ul>
       
                
               
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown mt-2">
                        <p class="navulnk dropdown-toggle cursor-pointer" data-toggle="dropdown" href="#">
                            <i class="fas fa-globe text-lg"></i>
                            {{__('Pages-text.language')}}
                        </p>
                        <span class="caret mt-1"></span>
                    
                        <div class="dropdown-menu dropdown-menu-right">
                           
                                <a class="dropdown-item" href="{{ route('localization', ['locale' => 'fr']) }}">French <img src="{{asset('imgs/fr.png')}}" alt="French Flag" class="flag-icon"></a>
                                
                                                 
                            <div class="dropdown-divider"></div>
                           
                                <a class="dropdown-item" href="{{ route('localization', ['locale' => 'en']) }}">English<img src="{{asset('imgs/england2.png')}}" alt="English Flag" class="flag-icon"></a>
                                
                            
                        </div>
                    </li>
                    
                    
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                                class="user-image img-circle elevation-2" alt="User Image">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary">
                                <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                                    class="img-circle elevation-2" alt="User Image">
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="{{route('profile.profileEdit')}}" class="btn btn-default btn-flat">Profile</a>
                                <a href="#" class="btn btn-default btn-flat float-right"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sign out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>


            </nav>

            <!-- Left side column. contains the logo and sidebar -->
            @include('layouts.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>

            <!-- Main Footer -->
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Prototype</b>
                </div>
                <strong>Copyright 2023 & 2024 <a href="https://solicode.co"> Solicoders</a>.</strong> {{ __('Pages-text.All rights')}}
                reserved.
            </footer>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-fJnA8t1pJ5USb+3J6Dk/46NfRSzAKFVN9ZsvHhI+uIWXDQCTu6qtmj1bOclzgXP2" crossorigin="anonymous"></script>
</x-laravel-ui-adminlte::adminlte-layout>
