<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Requise</title>
    <link rel="icon" href="{{asset("dist\css\imgs\logoedges.png")}}" type="image/png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <x-language title="{{ __('Pages-text.language') }}" />


    <div class="text-center">
        <h1 class="mb-4">{{ __('Pages-text.log_in_Required') }}</h1>
        <p>{{ __('Pages-text.you need to log in')}}</p>
        @if (Route::has('login'))
            <div class="mt-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn text-black border border-dark">{{ __('Pages-text.Dashboard')}}</a>
                @else
                    <a href="{{ route('login') }}" class="btn text-black border border-dark">{{ __('Pages-text.Sign in')}}</a>                
                @endauth
            </div>
        @endif
    </div>
</div>

<!-- Bootstrap JS and Popper.js (required for Bootstrap's JavaScript) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
