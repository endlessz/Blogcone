<nav class="navbar navbar-primary navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Blogcone') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                
                <li>
                    <a class="{{ Request::is("/") ? "active" : "" }}" 
                       href="{{ url("/") }}">Home</a>
                </li>

                @if (Auth::guest())
                    <li>
                        <a class="{{ Request::is("login") ? "active" : "" }}" 
                           href="{{ url('/login') }}">Login</a>
                    </li>
                    <li>
                        <a class="{{ Request::is("register") ? "active" : "" }}" 
                           href="{{ url('/register') }}">Register</a>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/posts/create')}}">Create Content</a>
                            </li>
                            <li>
                                <a href="{{ url('/posts')}}">My Posts</a>
                            </li>
                            <li class="divider"></li>
                            @if (Auth::user()->role_id === config('roles.admin'))
                                <li>
                                    <a href="{{ url('/admin') }}">Admin</a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ url('/users/'. Auth::user()->id .'/account') }}">My Account</a>
                            </li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>