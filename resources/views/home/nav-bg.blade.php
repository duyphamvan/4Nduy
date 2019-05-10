<div class="menu " style="background-color: #fff; height: 75px;border-bottom: 2px solid #d0d0d0;">
    <div class="container">
        <div class="row icon">
            <div class="col-sm-6 iconleft pl-0">
                <nav class="navbar navbar-expand-lg pl-0 justify-content-start ">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#"> <i class="fas fa-phone "> 1.820.3345.33</i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="far fa-envelope"> Contact@TravelTourWP.com</i></a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="col-sm-6 text-right iconright">
                <nav class="navbar navbar-expand-lg pr-0 justify-content-end ">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fab fa-flickr"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fab fa-google-plus-g"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> <i class="fab fa-flickr"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fab fa-twitter"></i></a>
                        </li>

                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/viewhome') }}">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                        {{--                                        <span class="caret"></span>--}}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right logout" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('showchangepassword') }}">
                                            Change Password
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-lock lock"></i><span>Login</span></a>
                                </li>
                                <li class="nav-item">
                                    @if (Route::has('register'))
                                        <a class="nav-link" href="{{ route('register') }}"> <i
                                                    class="fas fa-user user"></i><span>Sign up</span></a>
                                    @endif
                                </li>

                            @endauth
                        @endif

                    </ul>
                </nav>

            </div>
        </div>

    </div>

</div>
<style>
    .blue {
        transition: 1s;
        opacity: 0;
        visibility: hidden;
    }
</style>
