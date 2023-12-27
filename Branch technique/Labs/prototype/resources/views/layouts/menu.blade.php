<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>

    <a href="{{ route('projects.index') }}" class="nav-link {{ Request::is('projects') ? 'active' : '' }} ml-1">
        <i class="fas fa-project-diagram "></i>
        <p class="ml-2">{{ __('Pages-text.Projects') }}</p>
    </a>

    <a href="{{ route('tasks.index') }}" class="nav-link {{ Request::is('tasks') ? 'active' : '' }} ml-1">
        <i class="fas fa-tasks"></i> <!-- Change the icon for tasks -->
        <p class="ml-2" >{{ __('Pages-text.Tasks') }}</p>
    </a>
@can('index-UserController')
    <a href="{{ route('members.index') }}" class="nav-link {{ Request::is('members') ? 'active' : '' }} ml-1">
        <i class="fas fa-users"></i> <!-- Change the icon for members -->
        <p class="ml-1">{{ __('Pages-text.Members') }}</p>
    </a>
    @endcan
</li>

