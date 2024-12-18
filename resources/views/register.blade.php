<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  </head>
  <style>
    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
        overflow: hidden;
    }

    .navbar {
        background-color: rgba(31, 31, 31, 0);
    }

    body {
        font-family: "Poppins", sans-serif;
        position: relative;
        z-index: 1;
    }

    #video-bg {
        position: fixed;
        top: 50%;
        left: 50%;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        z-index: -1;
        transform: translate(-50%, -50%);
        object-fit: cover;
    }

    .container {
        background-color: rgba(31, 31, 31, 0.9);
        margin: auto;
        margin-top: 30px;
        height: auto;
        width: 100%;
        max-width: 600px;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .form-floating {
        margin-bottom: 10px;
    }

    .password-toggle {
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .container {
            width: 90%;
            margin-top: 50px;
            padding: 20px;
        }
    }

    .btn-register {
        background-color: #000;
        color: white;
    }

    .btn-register:hover {
        background-color: #ddd;
    }

    #notif {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
        background-color: rgba(31, 31, 31, 1);
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
    }
  </style>
  <body id="htmlPage">
  <header>
        <nav class="navbar fixed-top navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/home')}}" style="font-weight: bold;"><img src="{{asset('images/logo.png')}}" style="height: 40px;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>

    <video autoplay muted loop id="video-bg" class="video-background">
        <source src="{{ asset('video/laundry.mp4') }}" type="video/mp4">
    </video>

    <main>
        <div class="container">
            <h1 class="text-center mt-3 display-4" style="font-weight: 600; color: white;">Registrasi Akun</h1>
            <p class="text-center lead pb-3" style="color: white;">Silahkan Daftar untuk Mengakses</p>

            <form method="POST" action="{{ route('register') }}" id="formAuth" enctype="multipart/form-data">
                @csrf
                <div class="form-floating">
                    <input type="text" class="form-control" id="inputNama" placeholder="Nama" name="nama"/>
                    <label for="inputNama">Nama Lengkap</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="inputTelepon" placeholder="Telp" name="telepon"/>
                    <label for="inputTelepon">Nomor Telepon</label>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" id="inputAlamat" placeholder="Alamat" name="alamat" style="height: 100px;"></textarea>
                    <label for="inputAlamat">Alamat</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username"/>
                    <label for="inputUsername">Username</label>
                </div>
                <div class="form-floating position-relative">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password"/>
                    <label for="inputPassword">Password</label>
                    <span class="password-toggle" onclick="togglePassword()">
                        <i class="bi bi-eye" aria-hidden="true"></i>
                    </span>
                </div>
                <div style="margin: auto; padding-top: 10px;">
                    <p><a style="color: white;">Sudah punya akun? </a><a href="/login" style="color: white; text-decoration: underline;"> Masuk</a></p>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-register mt-3" style="width: 300px;">Register</button>
                </div>
            </form>

            @if ($errors->any())
                <div class="toast align-items-center border-0 mt-3" id="notif">
                    <div class="d-flex">
                        <div class="toast-body">
                            <i class="nav-icon bi bi-x">Login gagal. Coba lagi.</i>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("inputPassword");
            var icon = document.querySelector(".password-toggle i");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove("bi-eye");
                icon.classList.add("bi-eye-slash");
            } else {
                passwordInput.type = "password";
                icon.classList.remove("bi-eye-slash");
                icon.classList.add("bi-eye");
            }
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const errorMessage = document.getElementById("errorMessage");

            if (errorMessage) {
                setTimeout(() => {
                    errorMessage.style.transition = "opacity 0.5s";
                    errorMessage.style.opacity = "0";

                    setTimeout(() => {
                        errorMessage.remove();
                    }, 500); 
                }, 3000);
            }
        });
    </script>
    <script>
        function createToast() {
            const toast = document.querySelector('.toast');
            new bootstrap.Toast(toast).show();
        }
    </script>
  </body>
</html>
