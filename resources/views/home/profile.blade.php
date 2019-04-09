@if (Route::has('login'))
    @auth
        {{ Auth::user()->name }}
    @endauth
@endif
