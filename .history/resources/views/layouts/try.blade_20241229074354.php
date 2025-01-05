<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Icons (Font Awesome or other icon libraries) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Vite: Compile and load app styles and scripts -->
    <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->

    <!-- Optional: Add external or custom icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Scripts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>


<body>
@if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        {{-- Display success messages --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="margin-inline: 35px;">Buddha Books</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class=" navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav  my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Category
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('authorlist')}}" >Authors</a></li>
                            <li><a class="dropdown-item" href="{{route('publisherlist')}}">Publishers</a></li>
                            <li><a class="dropdown-item" href="#">Users</a></li>
                            <li><a class="dropdown-item" href="#">Borrow</a></li>
                            <li><a class="dropdown-item" href="{{route('genrelist')}}">Genre</a></li>
                            <li><a class="dropdown-item" href="{{route('allbooklist')}}">Book</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Genre
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href={{route('list')}}>All Books</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            @foreach ($genres as $genre)
                                 <li><a class="dropdown-item" href="{{route('booklist',$genre->id)}}">{{$genre->name}}</a></li> 

                                <!-- <li><a class="dropdown-item">{{$genre->name}}</a></li> -->

                            @endforeach

                            <!-- <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Comedy</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">aa</a></li>
                            <li>
                                @if (auth()->check())
                                    <a class="dropdown-item" href="#">{{ auth()->user()->name }}</a>
                                @endif
                            </li> -->
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link enabled" aria-enabled="true">Contact us</a>
                    </li>
                    <form class="d-flex" role="search">
                        <input class="form-control search_bar me-2" type="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </ul>


                <li class="nav-item dropdown dropstart profil" style="">
                    <button class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown" type=""
                        aria-expanded="false"><i class="bi bi-person-circle"></i> 
                        @auth
                            {{ auth()->user()->name }}
                        @else
                            User
                        @endauth
    

                    </button>

                    <ul class="dropdown-menu user-drop-list">
                        @guest
                            
                            
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                            <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
                        @endguest
                        @auth
                            <li><a class="dropdown-item" href={{route('')}}>Profile</a></li>
                            <li><a class="dropdown-item" href="#">Browing History</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>

                            </li>
                            <!-- <li><a class="dropdown-item" href="#">Logout</a></li> -->
                        @endauth
                    </ul>
                </li>
            </div>
        </div>
    </nav>

    <main>
        @yield("hom-body")
    </main>

    <footer>
        <div class="foot ">
            <div class="addrs">
                <h4>Address</h1>
                    <li>NAMI College</li>
                    <li>Baneshor, Kathmandu</li>
                    <li>Minbhawan Marg</li>

            </div>
            <div class="working-hr">
                <h4>Working Hours</h4>
                <li>Sunday-Friday: 10:30-05:00 </li>
            </div>
            <div class="contat">
                <h4>Contact us</h4>
                <li>Email: buddhabooks@gmail.com</li>
                <li>Telephone: 01-10101010</li>
                <li class="social">
                    <i class="bi bi-facebook"></i>
                    <i class="bi bi-instagram"></i>
                    <i class="bi bi-linkedin"></i>
                </li>
            </div>

        </div>
    </footer>
</body>

<style>
    /* Global Reset and Common Styles */
    /* Global Reset and Common Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        list-style: none;
        font-family: 'Nunito', sans-serif;
    }

    /* Navbar Styles */
    .navbar {
        padding: 1rem 0;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
    }

    .navbar-collapse {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar-nav {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    /* Dropdown Styles */
    .dropdown-menu {
        padding: 0.5rem 0;
        border: 1px solid rgba(0, 0, 0, 0.1);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        min-width: 180px;
    }

    .dropdown-menu .dropdown-item {
        padding: 0.7rem 1.5rem;
        color: #34495e;
        transition: all 0.2s ease;
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #f8f9fa;
        color: #3498db;
    }

    .dropdown-divider {
        margin: 0.5rem 0;
        border-color: #e0e0e0;
    }

    /* Genre Dropdown Specific */
    .nav-item.dropdown {
        position: relative;
    }

    .nav-item.dropdown .dropdown-menu {
        margin-top: 0.5rem;
    }

    .nav-link.dropdown-toggle::after {
        margin-left: 0.5rem;
    }

    /* User Dropdown Specific */
    .profil {
        margin-left: 1rem;
        list-style: none;
        display: flex;
        align-items: center;
    }

    .user-drop-list {
        right: 0;
        left: auto;
        min-width: 200px;
    }

    .user-drop-list .dropdown-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Fix for the search form alignment */
    .navbar-nav .d-flex {
        margin-left: 1rem;
    }

    .navbar-brand {
        font-size: 1.8rem;
        font-weight: bold;
        color: #2c3e50;
        transition: color 0.3s ease;
        margin-right: 2rem;
    }

    .navbar-brand:hover {
        color: #3498db;
    }

    .nav-link {
        color: #34495e;
        font-weight: 600;
        padding: 0.5rem 1rem;
        transition: color 0.3s ease;
        white-space: nowrap;
    }

    .nav-link:hover {
        color: #3498db;
    }

    .nav-link.active {
        color: #3498db;
    }

    /* Search Bar Styles */
    .search_bar {
        min-width: 300px;
        padding: 0.5rem 1rem;
        border: 2px solid #e0e0e0;
        border-radius: 20px;
        transition: border-color 0.3s ease;
    }

    .search_bar:focus {
        outline: none;
        border-color: #3498db;
    }

    .btn-outline-success {
        border-radius: 20px;
        padding: 0.5rem 1.5rem;
        border: 2px solid #2ecc71;
        color: #2ecc71;
        transition: all 0.3s ease;
    }

    .btn-outline-success:hover {
        background-color: #2ecc71;
        color: white;
    }

    /* Logout Button Styles */
    .user-drop-list form button {
        width: 100%;
        text-align: left;
        background: none;
        border: none;
        padding: 0.7rem 1.5rem;
        color: #34495e;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .user-drop-list form button:hover {
        background-color: #f8f9fa;
        color: #3498db;
    }

    /* Footer Styles */
    footer {
        background-color: #2c3e50;
        color: white;
        padding: 3rem 0;
        margin-top: 3rem;
    }

    .foot {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .foot h4 {
        font-size: 1.4rem;
        margin-bottom: 1.5rem;
        color: #3498db;
    }

    .foot li {
        margin-bottom: 1rem;
        color: #ecf0f1;
        transition: color 0.3s ease;
    }

    .foot li:hover {
        color: #3498db;
    }

    .social {
        display: flex;
        gap: 1rem;
        margin-top: 1.5rem;
    }

    .social i {
        font-size: 1.5rem;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .social i:hover {
        color: #3498db;
    }

    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .navbar-collapse {
            flex-direction: column;
            align-items: flex-start;
        }

        .navbar-nav {
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
        }

        .search_bar {
            min-width: 200px;
        }

        .navbar-nav .d-flex {
            margin: 1rem 0;
            width: 100%;
        }

        .profil {
            margin: 1rem 0;
        }

        .dropdown-menu {
            position: static !important;
            width: 100%;
            margin-top: 0 !important;
            box-shadow: none;
            border: none;
            background-color: #f8f9fa;
        }
    }

    /* Bootstrap Overrides */
    .navbar-toggler {
        border: none;
        padding: 0.5rem;
    }

    .navbar-toggler:focus {
        box-shadow: none;
        outline: none;
    }

    /* Container adjustments */
    .container-fluid {
        max-width: 1400px;
        margin: 0 auto;
    }
</style>

</html>