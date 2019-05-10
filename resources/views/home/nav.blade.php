<div class="menu">
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
                                        <a class="dropdown-item" href="{{route('user.show',Auth::user()->id)}}">
                                            Profile
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


        <div class="row">
            <div class="col-sm-12 contentmenu">

                <nav class="navbar navbar-expand-lg pl-0 pr-0 ">
                    <a class="navbar-brand travel" href="#"><i class="fas fa-plane"></i> <span> Travel </span>Tour</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end  menudown" >
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Pages</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Tour List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Destinations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Date & Pricing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Tour System</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Blog</a>
                            </li>

                            <li class="nav-item search">
                                <i class="fas fa-search"></i>
                            </li>
                        </ul>
                    </div>
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
