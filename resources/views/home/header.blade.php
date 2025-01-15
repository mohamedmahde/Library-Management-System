<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{ url('home') }}" class="active">Home</a></li>
                        <li><a href="{{ url('explore') }}">Explore</a></li>
                        <li><a href="details.html">Item Details</a></li>
                        <li><a href="create.html">Create Yours</a></li>

                        @if (Route::has('login'))
                                @auth
                                <li>
                                    <a href="{{ url('book_history') }}">My Hestory</a>
                                </li>
                                <x-app-layout>
                                </x-app-layout>
                                @else
                                    <li><a href="{{ route('login') }}">Login</a></li>

                                    @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                    @endif
                                @endauth
                        @endif

                       
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
