<div class="dropdown">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{ $title }}
    </a>

    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="{{ route('localization', ['locale' => 'fr']) }}">Français</a>
        </li>
        <li>
            <a class="dropdown-item" href="{{ route('localization', ['locale' => 'en']) }}">English</a>
        </li>
    </ul>
</div>