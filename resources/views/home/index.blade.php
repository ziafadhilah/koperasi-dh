<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Home</title>
</head>
<style>
    body {
        height: 100vh;
        background-image: url("{{asset('/images/gambar-dh.jpg')}}");
        background-repeat: no-repeat;
        background-size: 100%;
    }

    .container {
        height: 100%;
    }

    /* Color of the links BEFORE scroll */
    .navbar-scroll .nav-link,
    .navbar-scroll .navbar-toggler-icon {
        color: #fff;
    }

    /* Color of the links AFTER scroll */
    .navbar-scrolled .nav-link,
    .navbar-scrolled .navbar-toggler-icon {
        color: #4f4f4f;
    }

    /* Color of the navbar AFTER scroll */
    .navbar-scrolled {
        background-color: #fff;
    }

    /* An optional height of the navbar AFTER scroll */
    .navbar.navbar-scroll.navbar-scrolled {
        padding-top: 5px;
        padding-bottom: 5px;
    }

    @media screen {
        body {
            height: 100vh;
            background-image: url("{{asset('/images/gambar-dh.jpg')}}");
            background-repeat: no-repeat;
            background-size: 100%;
        }

        .container {
            height: 100%;
        }

        /* Color of the links BEFORE scroll */
        .navbar-scroll .nav-link,
        .navbar-scroll .navbar-toggler-icon {
            color: #fff;
        }

        /* Color of the links AFTER scroll */
        .navbar-scrolled .nav-link,
        .navbar-scrolled .navbar-toggler-icon {
            color: #4f4f4f;
        }

        /* Color of the navbar AFTER scroll */
        .navbar-scrolled {
            background-color: #fff;
        }

        /* An optional height of the navbar AFTER scroll */
        .navbar.navbar-scroll.navbar-scrolled {
            padding-top: 5px;
            padding-bottom: 5px;
        }
    }
</style>

<body>
    <!--Main Navigation-->
    <header>
        <!-- Animated navbar-->
        <nav class="navbar navbar-expand-lg fixed-top navbar-scroll">
            <div class="container">
                <button class="navbar-toggler ps-0" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon d-flex justify-content-start align-items-center">
                        <i class="fas fa-bars"></i>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarExample01">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" aria-current="page" href="{{url('/login')}}"><i class="fa fa-user"></i> Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Animated navbar -->

        <!-- Background image -->
        <div id="intro" class="bg-image">
            <div class="mask text-white" style="background-color: rgba(0, 0, 0, 0.8);">
                <div class="container d-flex align-items-center text-center h-100">
                    <div>
                        <h1 class="mb-5">&nbsp;</h1>
                        <p>
                            <img src="{{URL::asset('images/logoDH.png')}}" alt="">
                        </p>
                        <p>
                            Perguruan Darul Hikam, sejak pendiriannya tahun 1966, mengemban misi membangun character, attitude, behaviour, dan personality, yang dalam terminologi Islam, semua itu disebut pembangunan AKHLAK. Misi pendidikan ini secara formal kami jadikan tagline sekolah Darul Hikam yakni MEMBANGUN SISWA BERAKHLAK DAN BERPRESTASI.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Background image -->
    </header>
    <!--Main Navigation-->

</body>

</html>