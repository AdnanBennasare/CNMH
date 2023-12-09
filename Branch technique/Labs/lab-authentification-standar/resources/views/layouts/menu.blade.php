<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
    <li class="nav-item">
        <a href="{{route('projects.index')}}" class="nav-link">
          <i class="nav-icon far fa-calendar-alt"></i>
          <p>
            projects
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('tasks.index')}}" class="nav-link">
          <i class="nav-icon far fa-calendar-alt"></i>
          <p>
            tasks
          </p>
        </a>
      </li>
</li>
