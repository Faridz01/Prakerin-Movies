<header class="header">
    <div class="container">
        <div class="header-area">
            <div class="logo">
                <a href="index-2.html"><img src="{{ asset('front/img/logo.png') }}" alt="logo" /></a>
            </div>
            <div class="header-right">
                <form action="#">
                    <select>
                        <option value="Movies">Movies</option>
                        <option value="Movies">Movies</option>
                        <option value="Movies">Movies</option>
                    </select>
                    <input type="text"/>
                    <button><i class="icofont icofont-search"></i></button>
                </form>
                <ul>
                    <li><a href="#">Welcome Guest!</a></li>
                    <li><a class="login-popup" href="#">Login</a></li>
                </ul>
            </div>
            <div class="menu-area">
                <div class="responsive-menu"></div>
                <div class="mainmenu">
                    <ul id="primary-menu">
                        <li><a class="active" href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/movies') }}">Movies</a></li>
                        <li><a href="celebrities.html">CelebritiesList</a></li>
                        <li><a href="top-movies.html">Top Movies</a></li>
                        <li><a href="blog.html">News</a></li>
                        {{-- <li><a href="#">Pages <i class="icofont icofont-simple-down"></i></a>
                            <ul>
                                <li><a href="blog-details.html">Blog Details</a></li>
                                <li><a href="movie-details.html">Movie Details</a></li>
                            </ul>
                        </li> --}}
                        {{-- <li><a class="theme-btn" href="#"><i class="icofont icofont-ticket"></i> Tickets</a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="login-area">
    <div class="login-box">
        <a href="#"><i class="icofont icofont-close"></i></a>
        <h2>LOGIN</h2>
        <form action="#">
            <h6>USERNAME OR EMAIL ADDRESS</h6>
            <input type="text" />
            <h6>PASSWORD</h6>
            <input type="text" />
            <div class="login-remember">
                <input type="checkbox" />
                <span>Remember Me</span>
            </div>
            <div class="login-signup">
                <span>SIGNUP</span>
            </div>
            <a href="#" class="theme-btn">LOG IN</a>
            <span>Or Via Social</span>
            <div class="login-social">
                <a href="#"><i class="icofont icofont-social-facebook"></i></a>
                <a href="#"><i class="icofont icofont-social-twitter"></i></a>
                <a href="#"><i class="icofont icofont-social-linkedin"></i></a>
                <a href="#"><i class="icofont icofont-social-google-plus"></i></a>
                <a href="#"><i class="icofont icofont-camera"></i></a>
            </div>
        </form>

    </div>
</div>
