<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> --}}
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                                @endif
                            </li>
                        @else

                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                              </li>

                              <li class="nav-item">
                                  <a class="nav-link" href="/users">{{ __('Users') }}</a>
                              </li>

                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('users.index') }}">Manage Users</a>
                              </li>

                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a>
                              </li>

                             <li class="nav-item">
                                 <a class="nav-link" href="{{ route('products.index') }}">Manage Product</a>
                            </li>

                              <li class="nav-item">
                                  <a class="nav-link" href="/employees">{{ __('Employees') }}</a>
                              </li>

                              <li class="nav-item">
                                  <a class="nav-link" href="/pays">{{ __('Earning') }}</a>
                              </li>

                              <li class="nav-item">
                                  <a class="nav-link" href="/reports">{{ __('Report') }}</a>
                              </li>

                              <li class="nav-item">
                                  <a class="nav-link" href="/settings">{{ __('Settings') }}</a>
                              </li>

                          <li class="nav-item">
                              <a class="nav-link" href="/documentations">{{ __('Documentation') }}</a>
                          </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>