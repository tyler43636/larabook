<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Larabook</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>{{ link_to_route('users', 'Browse Users') }}</li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if($currentUser)
                <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img class="nav-gravatar" src="{{$currentUser->present()->gravatar()}}" alt="{{$currentUser->username}}">
                        {{ $currentUser->username }}<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>{{ link_to_route('profile', 'My Profile', $currentUser->username) }}</li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li>{{ link_to_route('logout', 'Logout') }}</li>
                    </ul>
                </li>
                @else
                <li>{{ link_to_route('register', 'Sign Up') }}</li>
                <li>{{ link_to_route('login', 'Login') }}</li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>