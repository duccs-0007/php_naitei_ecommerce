<!-- Start Header Area -->
<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="/">@lang('header.home')</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">@lang('header.shop')</a></li>
                        @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">@lang('header.login')</a>
                        </li>
                        @else
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('users.edit', Auth::user()) }}">@lang('header.profile')<span class="caret"></span></a></li>
                                <li class="nav-item"><a class="nav-link" href="#">@lang('header.tracking')</a></li>
                                <li class="nav-item"><a class="nav-link" href="#"  id="logout_btn_submit">
                                        {{ __('Logout') }}</a>
                                </li>
                                {!! Form::open(['method' => 'POST', 'route' => 'logout', 'id' => 'logout_form', 'class'
                                => 'd-none']) !!}
                                {!! Form::close() !!}
                            </ul>
                        </li>
                        @endguest
                        <li class="nav-item"><a class="nav-link" href="/contact">@lang('header.contact')</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item">
                            <a href="{{ route('cartIndex') }}" class="cart">
                                <span class="ti-bag"></span>
                                <p class="nav-link" id="totalQuantity">{{ Session::has('cart')?Session::get('cart')->totalQuantity:'' }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
            <nav class="navbar navbar-expand-lg navbar-light main_box alert alert-warning" role="alert">
                <div class="container" id="error_msg"></div>
            </nav>
        @if (session('status'))
            <nav class="navbar navbar-expand-lg navbar-light main_box alert alert-warning" role="alert">
                <div class="container" id="error_msg">
                    {{ session('status') }}
                </div>
            </nav>
        @endif
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container">
            <form class="d-flex justify-content-between">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
