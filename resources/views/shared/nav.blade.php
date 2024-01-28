@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
    $dashboardRoute = Auth::check() ? route('dashboard') : null;
@endphp

<nav class="navbar navbar-expand navbar-light bg-light">
    <div class="nav navbar-nav">
        <a href="/" class="nav-item nav-link active">Home</a>
        <a class="nav-item nav-link" href="{{ route('products.index') }}">Products</a>
        @auth
            @if ($dashboardRoute)
                <a href="{{ $dashboardRoute }}" class="nav-item nav-link">Dashboard</a>
            @endif
            <a href="{{ route('logout') }}" class="nav-item nav-link">Logout</a>
        @else
            <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
            @endif
        @endauth
    </div>
</nav>
