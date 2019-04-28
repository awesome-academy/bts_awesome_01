<header class="header">
    <!-- Top Bar -->
    <div class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-row">
                    <div class="phone">+45 345 3324 56789</div>
                    <div class="social">
                        <ul class="social_list">
                            <li class="social_list_item"><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            <li class="social_list_item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li class="social_list_item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li class="social_list_item"><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                            <li class="social_list_item"><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                            <li class="social_list_item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <div class="user_box ml-auto">
                        @if (Auth::user())
                            <div class="user_box_register user_box_link"><a href="{{ route('logout') }}">logOut</a></div>
                            @else
                            <div class="user_box_login user_box_link"><a href="{{ route('login') }}">login</a></div>
                            <div class="user_box_register user_box_link"><a href="{{ route('register') }}">register</a></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="main_nav">
        <div class="container">
            <div class="row">
                <div class="col main_nav_col d-flex flex-row align-items-center justify-content-start">
                    <div class="logo_container">
                        <div class="logo">
                            <a href="#"><img src="dist/img/logo.png" alt="">travelix</a>
                        </div>
                    </div>
                    <div class="main_nav_container ml-auto">
                        <ul class="main_nav_list">
                            <li class="main_nav_item"><a href="#">home</a></li>
                            <li class="main_nav_item"><a href="about.html">about us</a></li>
                            <li class="main_nav_item"><a href="offers.html">offers</a></li>
                            <li class="main_nav_item"><a href="blog.html">news</a></li>
                            <li class="main_nav_item"><a href="contact.html">contact</a></li>
                        </ul>
                    </div>
                    <div class="content_search ml-lg-0 ml-auto">
                        <svg version="1.1" id="Layer_1" x="0px" y="0px" width="17px" height="17px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">  
                                <i class="fa fa-search"></i>
                        </svg>
                    </div>
                    <form id="search_form" class="search_form bez_1">
                        <input type="search" class="search_content_input bez_1">
                    </form>
                    <div class="hamburger">
                        <i class="fa fa-bars trans_200"></i>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
