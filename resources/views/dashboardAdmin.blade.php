<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<style>
    body{
        font-family: "Poppins", sans-serif;
        margin: 0;
        padding: 0;
    }

    li{
        list-style: none;
    }

    a{
        text-decoration: none;
    }

    .main{
        min-height: 100vh;
        width: 100%;
        overflow: hidden;
        background-color: #ddd;
        color: white;
    }

    #sidebar{
        max-width: 264px;
        min-width: 264px;
        transition: all 0.35s ease-in-out;
        background-color: rgba(31, 31, 31, 1);
        display: flex;
        flex-direction: column;
    }

    #sidebar.collapsed{
        margin-left: -264px;
    }

    .toggler-btn{
        background-color: transparent;
        cursor: pointer;
        border: 0;
    }

    .toggler-btn i{
        font-size: 1.5rem;
        color: black;
        font-weight: bold;
    }

    .navbar{
        padding: 1.5rem 1.5rem;
    }

    .sidebar-nav{
        flex: 1 1 auto;
    }

    .sidebar-logo{
        padding: 1.5rem 1.5rem;
        text-align: center;
    }

    .sidebar-logo a{
        color: white;
        font-weight: 800;
        font-size: 1.25rem;
    }

    .sidebar-header{
        color: white;
        font-size: 75rem;
        padding: 1.5rem 1.5rem .375rem;
    }

    a.sidebar-link{
        padding: .625rem 1.625rem;
        color: white;
        position: relative;
        transition: all 0.35s;
        display: block;
    }

    a.sidebar-link:hover{
        background-color: #f9f6f630;
    }

    a.sidebar-footer:hover{
        background-color: #f9f6f630;
    }
</style>
<body>
    <div class="d-flex">
        <aside id="sidebar">
            <div class="sidebar-logo">
                <a href="{{ url('dashboardAdmin')}}"><img src="{{asset('images/logo.png')}}" style="height: 40px;">Atma Laundry</a>
            </div>
            <ul class="sidebar-nav p-0">
                <li class="sidebar-item">
                    <a href="{{ url('admin/dashAdmin')}}" class="sidebar-link">
                        <img style="height: 35px; width: 35px;" src="https://img.icons8.com/?size=100&id=1iF9PyJ2Thzo&format=png&color=FFFFFF">
                        <span>
                            Home
                        </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ url('jasa')}}" class="sidebar-link">
                        <img style="height: 35px; width: 35px;" src="https://img.icons8.com/?size=100&id=IYtCLmTFquBG&format=png&color=FFFFFF">
                        <span>
                            Jasa
                        </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ url('barang')}}" class="sidebar-link">
                        <img style="height: 35px; width: 35px;" src="https://img.icons8.com/?size=100&id=LCKQq59tYDM4&format=png&color=FFFFFF">
                        <span>
                            Barang
                        </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ url('admin/userAdmin')}}" class="sidebar-link">
                        <img style="height: 35px; width: 35px;" src="https://img.icons8.com/?size=100&id=22393&format=png&color=FFFFFF">
                        <span>
                            User
                        </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ url('admin/reviewAdmin')}}" class="sidebar-link">
                        <img style="height: 35px; width: 35px;" src="https://img.icons8.com/?size=100&id=ywULFSPkh4kI&format=png&color=FFFFFF">
                        <span>
                            Review
                        </span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: white; padding: 0; margin: 20px;">
                        <img style="height: 35px; width: 35px;" src="https://img.icons8.com/?size=100&id=BdksXmxLaK8r&format=png&color=FFFFFF">
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <div class="main">
            <nav class="navbar navbar-expand" style="background-color: rgba(31, 31, 31, 0.9);">
                <button class="toggler-btn" type="button">
                    <img style="height: 35px; width: 35px;" src="https://img.icons8.com/?size=100&id=36389&format=png&color=FFFFFF">
                </button>
            </nav>
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        const toggler = document.querySelector(".toggler-btn")
        toggler.addEventListener("click", function(){
            document.querySelector("#sidebar").classList.toggle("collapsed")
        })
    </script>
    <script>
        function createToast() {
            const toast = document.querySelector('.toast');
            new bootstrap.Toast(toast).show();
        }
    </script>
</body>
</html>