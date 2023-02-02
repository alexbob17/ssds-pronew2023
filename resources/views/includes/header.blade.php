<header class="main-header">
    <!-- Logo -->
    <div>
        <!-- <img src="{{ asset('../public/img/Claro-logo.png') }}" alt="logo ssd"> -->
        <!-- {!! link_to('/','SSD', ['class' => 'logo']) !!} -->
        <a class="logo" href="{{URL::to('/')}}"><img class="img-sidebar" src={{asset('../public/img/Claro-dash.png')}}
                alt="Logo"></a>
    </div>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <img src="{{ asset('../public/img/menu.png') }}" alt="">
            <!-- <span class="sr-only">Toggle navigation</span> -->
        </a>
        @if(Auth::check())
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('dist/img/user-160x160.png') }}" class="user-image" alt="User Image" />
                        <span class="hidden-xs">{{{ Auth::user()->username }}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <p>{{{ Auth::user()->first_name }}}
                                {{{ Auth::user()->last_name }}}<small>{{{ Auth::user()->organizational_area }}}</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                {!! link_to('cambiar_contrasena', 'Cambiar Contraseña', [ 'class' => 'btn-xs btn-flat
                                text-muted']) !!}
                            </div>
                            <div class="pull-right">
                                {!! link_to('logout','Cerrar Sesión', ['class' => 'btn btn-warning btn-flat']) !!}
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        @endif
    </nav>
</header>