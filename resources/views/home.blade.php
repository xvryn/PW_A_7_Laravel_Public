<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <style>
    body{
      background-color: #ddd;
      font-family: "Poppins", sans-serif;
    }

    .navbar{
        background-color: rgba(31, 31, 31, 1);
    }

    .navbar-brand, .nav-link {
        color: #ddd;
    }

    .nav-link:hover, .navbar-brand:hover {
        color: #f5f5f5;
    }

    .carousel-item img{
        max-height: 700px;
        width: 100%;
        object-fit: cover;
    }

    .judulText{
        color: #000;
        font-size: 2em;
        font-weight: 300;

        span{
            color: #000;
            font-weight: 700;
            font-size: 1.5em;
        }
    }

    .about{
        padding: 80px 0 80px;
        min-height: 60vh;

        .row{
            position: relative;
            width: 100%;
            display: flex;
            flex: 0 0 50%;
            padding: 15px;
            justify-content: 100px;
            margin-top: 100px;

            &:nth-child(even){
                flex-direction: row-reverse;
            }
            .col50{
                position: relative;
                width: 48%;

                .imgBx{
                    position: relative;
                    height: 100%;
                    
                    img{
                        object-fit: cover;
                        width: 100%;
                        position: absolute;
                        height: 100%;
                    }
                }

                .imgBx2{
                    position: relative;
                    height: 100%;
                    
                    img{
                        object-fit: cover;
                        width: 100%;
                        position: absolute;
                        height: 100%;
                    }
                }
            }
        }
    }

    .section-title{
        text-align: center;
        margin-top: 40px;
        font-size: 2rem;
        color: #000;
        font-weight: bold;
    }

    .service-card{
        text-align: center;
        padding: 20px;
    }

    .service-card img{
        width: 100%;
        max-width: 300px;
        height: auto;
        margin-bottom: 10px;
    }

    .location{
        text-align: center;
        margin: 40px 0;
    }

    .location img{
        max-width: 100%;
        height: auto;
    }

    .contact-info{
        text-align: center;
        margin: 20px 0;
    }

    .contact-info p{
        font-size: 1.2rem;
    }

    h3, p{
        color: #000;
    }

    .layanan{
        padding: 80px 0 80px;
        min-height: 100vh;

        .container{
            .judul{
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }

            .menu{
                justify-content: center;
                align-items: center;
                display: grid;
                gap: 20px;
                width: 100%;
                grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));

                &:hover{
                    .row{
                        .card{
                            opacity: 0.2;
                        }
                    }
                }

                .row{
                    background: #ddd;
                    position: relative;
                    display: flex;
                    flex-direction: row;
                    justify-content: center;
                    align-items: center;

                    .card{
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: center;
                        position: relative;
                        background-color: #ddd;
                        border-style: none;
                        margin: 20px;
                        transition: .5s;

                        &:hover{
                            opacity: 1;
                        }

                        .card-img-top {
                            object-fit: cover;
                            height: 250px;
                            border-radius: 5px;
                        }
                    }
                }
            }
        }
    }

    .contact{
        min-height: 100vh;

        .judul{
            text-align: center;
        }

        .box{
            margin: 50px 0 0;
            display: flex;
            flex: 0 0 50%;
            padding: 15px;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;

            .contactForm{
                border-radius: 10px;
                padding: 40px;
                background: rgba(31, 31, 31, 0.9);
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);;
                width: 45%;

                h3{
                    color: white;
                    font-size: 1.2em;
                    margin-bottom: 20px;
                    font-weight: 500;
                }

                .inputBox{
                    position: relative;
                    width: 100%;
                    margin-bottom: 20px;

                    input, textarea{
                        width: 100%;
                        background: #ddd;
                        border-radius: 5px;
                        border: 1px solid black;
                        padding: 10px;
                        color: black;
                        outline: none;
                        font-size: 16px;
                        font-weight: 300;
                        resize: none;
                    }

                    input[type="submit"]{
                        font-size: 1em;
                        color: white;
                        background: #000;
                        display: inline-block;
                        text-transform: uppercase;
                        text-decoration: none;
                        letter-spacing: 2px;
                        transition: .5s;
                        max-width: 100px;
                        font-weight: 500;
                        border: none;
                        cursor: pointer;
                    }
                }
            }

            .map{
                position: center;
                align-items: center;
                padding: 25px;
                height: 414px;
                width: 50%;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
                background: rgba(31, 31, 31, 0.9);
                border-radius: 10px;

                iframe{
                    width: 100%;
                    height: 355px;
                    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
                    border: 0;
                    border-radius: 5px;
                }
            }

            .icon-container{
                margin-top: 50px;
                width: 100%;
                color: white;
                background:  rgba(31, 31, 31, 0.9);
                position: relative;
                box-shadow: black;
                border-radius: 10px;
                display: flex;
                flex-direction: row;
                justify-content: space-around;
                padding: 10px 100px 10px 15px;

                .icons{
                    margin: 5px;
                    position: relative;
                    text-align: center;

                    span{
                        font-size: 1rem;
                        font-weight: 600; 
                    }

                    p{
                        color: white;
                        font-size: 1rem;
                        justify-content: space-around;
                        align-items: center;
                    }
                }
            }
        }
    }

    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease-out, transform 0.5s ease-out;
    }

    .fade-in.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .card {
        transition: transform 0.3s;
    }

    .card:hover {
        transform: scale(1.05);
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
                <a class="navbar-brand" href="{{ url('/home')}}" style="font-weight: bold;"><img src="{{asset('images/logo.png')}}" style="height: 40px;">Atma Laundry</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" style="" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#layanan">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        @if (Auth::check()) 
                            <a class="nav-link" href="{{ url('/dashboardUser') }}">Dashboard</a>
                        @else
                            <a class="nav-link" href="{{ url('/login') }}">Login</a>
                        @endif
                    </li>
                </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div id="carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('images/gambar1.jpg')}}" class="d-block w-100" alt="gambar1">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('images/gambar2.jpg')}}" class="d-block w-100" alt="gambar2">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('images/gambar3.jpg')}}" class="d-block w-100" alt="gambar3">
                </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <section class="about" id="about">
            <div class="container">
                <div class="row">
                    <div class="col50">
                        <div class="judulText" data-aos="fade-down">
                            <span>A</span>bout Us
                        </div>
                        <p data-aos="fade-down">Atma Laundry didirikan dengan satu tujuan memberikan layanan laundry yang cepat, berkualitas, dan terjangkau bagi setiap pelanggan. Kami memulai bisnis ini dengan semangat untuk membantu masyarakat dalam menghemat waktu dan tenaga mereka, sambil tetap menjaga pakaian mereka dalam kondisi terbaik. Sejak awal berdiri, Atma Laundry telah berkomitmen untuk menyediakan layanan yang dapat diandalkan dengan harga yang kompetitif, didukung oleh tenaga kerja profesional yang berpengalaman.</p>
                    </div>
                    <div class="col50" data-aos="fade-down">
                        <div class="imgBx">
                            <img src="{{asset('images/about1.jpg')}}" style="border-radius: 20px;">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col50">
                        <div class="judulText" data-aos="fade-down">
                                <span>F</span>or Customer
                            </div>
                            <p data-aos="fade-down">Dengan mengutamakan kualitas dan kepuasan pelanggan, kami menggunakan peralatan modern serta bahan pencuci yang ramah lingkungan. Kami percaya bahwa pakaian yang bersih dan rapi bukan hanya soal penampilan, tetapi juga mencerminkan kenyamanan dan rasa percaya diri.</p>
                        </div>
                    <div class="col50" data-aos="fade-down">
                        <div class="imgBx2">
                            <img src="{{asset('images/about2.jpg')}}" style="border-radius: 20px;">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="layanan" id="layanan">
            <div class="container">
                <div class="judul">
                    <h2 class="judulText" data-aos="fade-up-left"><span>L</span>ayanan Kami</h2>
                    <p data-aos="fade-up-right">Atma Laundry menyediakan berbagai layanan yang dirancang untuk memenuhi kebutuhan kebersihan pakaian Anda.</p>
                </div>

                <div class="menu">
                    <div class="row" data-aos="flip-up">
                        <div class="container py-5">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="card card-custom">
                                        <img src="{{asset('images/jasa.jpg')}}" class="card-img-top" alt="Service Image 1">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Jasa</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card card-custom">
                                        <img src="{{asset('images/barang.jpg')}}" class="card-img-top" alt="Service Image 2">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Barang</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <section class="contact">
            <div class="contact" id="contact">
                <div class="container">
                    <div class="judul">
                        <h2 class="judulText" data-aos="flip-left"><span>C</span>ontact Us</h2>
                        <p data-aos="flip-left">Silahkan Hubungi Kami untuk Pertanyaan dan Kesulitan yang Kalian Hadapi.</p>
                    </div>

                    <div class="box">
                        <form method="POST" action="/home" class="contactForm" enctype="multipart/form-data" data-aos="zoom-in-right">
                            @csrf
                            <h3>Kirim Keluhan</h3>
                            <div class="inputBox">
                                <input type="text" name="nama" placeholder="Nama" required>
                            </div>
                            <div class="inputBox">
                                <input type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="inputBox">
                                <textarea name="keluhan" placeholder="Keluhan" required></textarea>
                            </div>
                            <div class="inputBox">
                                <button type="submit" class="btn btn-send" style="background-color: white;">Kirim</button>
                            </div>
                            
                            @if (session('success'))
                                <div class="toast align-items-center border-0" id="notif">
                                    <div class="d-flex">
                                        <div class="toast-body">
                                            <i class="nav-icon bi bi-check"></i>
                                            {{ session('success') }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="toast align-items-center border-0 mt-3" id="notif">
                                    <div class="d-flex">
                                        <div class="toast-body">
                                            <i class="nav-icon bi bi-x">Keluhan gagal terkirim. Coba lagi.</i>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </form>

                        <div class="map" data-aos="zoom-in-left">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.0981281682966!2d110.41612909999999!3d-7.779419499999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59f1fb2f2b45%3A0x20986e2fe9c79cdd!2sUniversitas%20Atma%20Jaya%20Yogyakarta%20-%20Kampus%203%20Gedung%20Bonaventura%20Babarsari!5e0!3m2!1sid!2sid!4v1729397605039!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                        <div class="icon-container" data-aos="zoom-in">
                            <div class="icons">
                                <span>Address </span>
                                <p>Jl. Manggis Raya 33, Yogyakarta 55582</p>
                            </div>
                            <div class="icons">
                                <span>Instagram</span>
                                <p><i class="bi bi-instagram"></i> atmalaundry</p>
                            </div>
                            <div class="icons">
                                <span>Whatsapp</span>
                                <p><i class="bi bi-whatsapp"></i> 08123456789</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
      <p class="text-center mt-5">© 2024 Atma Laundry. All rights reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        AOS.init({
            duration: 800,
        })
    </script>
    <script>
        function createToast() {
            const toast = document.querySelector('.toast');
            new bootstrap.Toast(toast).show();
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const notif = document.getElementById('notif');
            if (notif) {
                notif.style.display = 'block';
                setTimeout(() => {
                    notif.style.display = 'none';
                }, 3000);
            }
        });
    </script>
  </body>
</html>