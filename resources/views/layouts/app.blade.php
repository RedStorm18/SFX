<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SFXS CODING</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/temp.css" />
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div id="app">
        <div class="sidebar">
    <div class="logo-content">
        <div class="logo">
            <div class="names">ST. FRANCIS XAVIER STAR SHIPPING LINES INC. </div>
            </div>
            <i class='bx bx-menu' id="btn"></i>
            </div>
            <ul class="nav_list">
                    
                <li>
                    <a href="/home"><i class='bx bxs-cart-add' ></i>
                    <span class="links_name">ORDER</span>
                    </a>
                    <span class ="tooltip">ORDER</span>
                </li>

                <li>
                    <a href="/home/customer"><i class='bx bxs-store' ></i>
                    <span class="links_name">CUSTOMER</span>
                    </a>
                    <span class ="tooltip">CUSTOMER</span>
                </li>
                @if (session('status') == "Admin")
                <li>
                    <a href="receipt.php"><i class='bx bx-male-female'></i>
                    <span class="links_name">STAFF</span>
                    </a>
                    <span class ="tooltip">STAFF</span>
                </li>
                @endif

                <li>
                    <a href="/home/profile"><i class='bx bxs-cog bx-rotate-180' ></i>
                    <span class="links_name">PROFILE</span>
                    </a>
                    <span class ="tooltip">PROFILE</span>
                </li>
            </ul>
            <div class="profile_content">
                <div class="profile">
                    <div class="profile_detail">
                        <div class="name_job">
                            <div class="name"> {{Session::get('name')}} </div>
                        <div class="job"> {{Session::get('email')}}</div>
                        </div>
                    </div>
                    <i class='bx bx-log-out-circle' id ="logout"></i>
                
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
            </div>    
        </div>
        
    
     

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

<script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");
    let form = document.getElementById('logout-form');
    btn.onclick = function(){
        sidebar.classList.toggle("active");
    }
    let log = document.querySelector("#logout");
    log.onclick = function(){
        form.submit();
    }
   </script>