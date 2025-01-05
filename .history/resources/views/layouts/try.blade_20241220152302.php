<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap JS (necessary for dropdown and toggler functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">ALL Books</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Genre
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Comedy</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">aa</a></li>
                            <li>
                                @if (auth()->check())
                                    <a class="dropdown-item" href="#">{{ auth()->user()->name }}</a>
                                @endif
                            </li>

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
                        aria-expanded="false"><i class="bi bi-person-circle"></i> User

                    </button>

                    <ul class="dropdown-menu user-drop-list">
                        @guest
                            <li><a class="dropdown-item" href="#">Login</a></li>
                            <li><a class="dropdown-item" href="#">Register</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">aabb</a></li>
                        @endguest
                        @auth
                            <li><a class="dropdown-item" href="#">Profile</a></li>
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
                            <li><a class="dropdown-item" href="#">Logout</a></li>
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
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    background-color: #ffffff;
}

.navbar-brand {
    font-size: 1.8rem;
    font-weight: bold;
    color: #2c3e50;
    transition: color 0.3s ease;
}

.navbar-brand:hover {
    color: #3498db;
}

.nav-link {
    color: #34495e;
    font-weight: 600;
    padding: 0.5rem 1rem;
    transition: color 0.3s ease;
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

/* Profile Dropdown Styles */
.profil {
    margin-left: 2rem;
}

.user-drop-list {
    min-width: 200px;
    padding: 0.5rem 0;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.dropdown-item {
    padding: 0.7rem 1.5rem;
    color: #34495e;
    transition: background-color 0.3s ease;
}

.dropdown-item:hover {
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
@media (max-width: 768px) {
    .search_bar {
        min-width: 200px;
    }
    
    .foot {
        grid-template-columns: 1fr;
        text-align: center;
    }
    
    .social {
        justify-content: center;
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

.dropdown-divider {
    margin: 0.5rem 0;
    border-color: #e0e0e0;
}
</style>
</html>