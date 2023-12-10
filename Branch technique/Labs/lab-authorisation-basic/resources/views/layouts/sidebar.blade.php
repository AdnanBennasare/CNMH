        <!-- aside -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light text-center">lab laravel basic</span>
                <div class="ml-2"><a href="{{route('logout')}}">Log out</a>
    
                    <h5 class="text-white">user : {{ Auth::user()->name }}</h5></div>
            
 
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{route('tasks.index')}}" class="nav-link ">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    taches
                                </p>
                            </a>
                        </li>
            
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
