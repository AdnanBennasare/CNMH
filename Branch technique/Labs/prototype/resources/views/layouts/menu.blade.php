<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>

    <a href="{{ route('projects.index') }}" class="nav-link {{ Request::is('projects') ? 'active' : '' }}">
        <i class="fas fa-project-diagram"></i>
        <p>projects</p>
    </a>

    <a href="{{ route('tasks.index') }}" class="nav-link {{ Request::is('tasks') ? 'active' : '' }}">
        <i class="fas fa-project-diagram"></i>
        <p>tasks</p>
    </a>
</li>
