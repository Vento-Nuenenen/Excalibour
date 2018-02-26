<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            {{-- Collapsed Hamburger --}}
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">{!! trans('titles.toggleNav') !!}</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            {{-- Branding Image --}}
            <a class="navbar-brand" href="{{ url('/') }}">
                {!! config('app.name', Lang::get('titles.app')) !!}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            {{-- Left Side Of Navbar --}}
            <ul class="nav navbar-nav">
                @role('admin')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Administration <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li {{ Request::is('auswertung/exer1') ? 'class=active' : null }}>{!! HTML::link(url('/auswertung/exer1'), 'Auswertung 1. Exer') !!}</li>
                            <li {{ Request::is('auswertung/exer2') ? 'class=active' : null }}>{!! HTML::link(url('/auswertung/exer2'), 'Auswertung 2. Exer') !!}</li>
                            <li {{ Request::is('users', 'users/' . Auth::user()->id, 'users/' . Auth::user()->id . '/edit') ? 'class=active' : null }}>{!! HTML::link(url('/users'), Lang::get('titles.adminUserList')) !!}</li>
                            <li {{ Request::is('users/create') ? 'class=active' : null }}>{!! HTML::link(url('/users/create'), Lang::get('titles.adminNewUser')) !!}</li>
                            <li {{ Request::is('import/user') ? 'class=active' : null }}>{!! HTML::link(url('/import/user'), 'Benutzer importieren') !!}</li>
                            <li {{ Request::is('groups') ? 'class=active' : null }}>{!! HTML::link(url('/groups/'), 'Gruppen verwalten') !!}</li>
                        </ul>
                    </li>
                @endrole

                @role('admin|user')
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Management <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li {{ Request::is('tn/points') ? 'class=active' : null }}>{!! HTML::link(url('/tn/points'), 'Punkte vergeben') !!}</li>
                            <li {{ Request::is('print/certificate') ? 'class=active' : null }}>{!! HTML::link(url('/print/certificate'), 'Exer Gratulation export') !!}</li>
                        </ul>
                    </li>
                @endrole
            </ul>

            {{-- Right Side Of Navbar --}}
            <ul class="nav navbar-nav navbar-right">
                {{-- Authentication Links --}}
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">{!! trans('titles.login') !!}</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

                            @if ((Auth::User()->profile) && Auth::user()->profile->avatar_status == 1)
                                <img src="{{ Auth::user()->profile->avatar }}" alt="{{ Auth::user()->scoutname }}" class="user-avatar-nav">
                            @else
                                <div class="user-avatar-nav"></div>
                            @endif

                            {{ Auth::user()->scoutname ? Auth::user()->scoutname : Auth::user()->first_name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li {{ Request::is('profile/'.Auth::user()->id, 'profile/'.Auth::user()->id . '/edit') ? 'class=active' : null }}>
                                {!! HTML::link(url('/profile/'.Auth::user()->id), trans('titles.profile')) !!}
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {!! trans('titles.logout') !!}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
