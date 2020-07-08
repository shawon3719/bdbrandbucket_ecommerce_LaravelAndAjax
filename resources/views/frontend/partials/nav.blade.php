<nav class="navbar sticky-top navbar-expand-lg navbar-dark " style="background: rgba(0, 20, 61, 0.91)">
    <div class="container">


        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{asset('images/logo.png')}}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{Route::is('index') ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('index') }}"><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{Route::is('products') ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('products') }}"><i class="fa fa-suitcase" aria-hidden="true"></i> Products</a>
                </li>
                <li class="nav-item {{Route::is('contact') ? 'active' : ''}}">
                    <a class="nav-link" href="{{ route('contact') }}"><i class="fa fa-address-book" aria-hidden="true"></i> Contact</a>
                </li>
                <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0" action="{!! route('search') !!}" method="get">
                        {{-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> --}}
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" placeholder="Search Products" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary search-icon-button" type="button"><i class="fa fa-search"></i></button>
                            </div>
                        </div>

                    </form>
                </li>

            </ul>
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link btn-cart-nav" href="{{ route('carts') }}">
                        <button class="btn btn-danger">
                            <span class="mt-1"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart</span>
                            <span class="badge badge-warning" id="totalItems">
                                {{App\Models\Cart::totalItems()}}
                            </span>
                        </button>
                    </a>
                </li>
                @guest
                    <li class="nav-item mt-2">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> {{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item mt-2">
                            <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> {{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">

                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="{{App\Helpers\ImageHelper::getUserImage(Auth::user()->id)}}" class="img rounded-circle" style="width: 40px">
                            {{ Auth::user()->first_name}} {{ Auth::user()->last_name}} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('user.dashboard') }}"><i class="fa fa-user" aria-hidden="true"></i> My Profile
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{ __('Logout') }}
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
<!-- End Navbar Part -->

