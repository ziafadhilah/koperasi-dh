<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link rel="shortcut icon" href="{{asset('img/.png')}}" type="image/x-icon">

    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <script src="{{asset('js/main.js')}}"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/js/tom-select.complete.min.js"></script> -->


    <title>@yield('title') : DARUL HIKAM</title>
</head>

<body>
    <!-- <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo">
                    <i class='bx bx-layer nav_logo-icon'></i>
                    <span class="nav_logo-name">KOPERASI DH</span></a>
                <div class="nav_list">
                    <a href="{{url('/')}}" class="nav_link active">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span>
                    </a>
                    <a href="{{url('/product-category')}}" class="nav_link active">
                        <i class='fa fa-list nav_icon'></i>
                        <span class="nav_name">Kategori</span>
                    </a>
                    <a href="{{url('/product')}}" class="nav_link active">
                        <i class='fa fa-box nav_icon'></i>
                        <span class="nav_name">Produk</span>
                    </a>
                    <a href="{{url('/central-sale')}}" class="nav_link active">
                        <i class="fa fa-share nav_icon"></i>
                        <span class="nav_name">Penjualan</span>
                    </a>
                    <a href="{{url('/central-purchase')}}" class="nav_link active">
                        <i class="fa fa-share nav_icon"></i>
                        <span class="nav_name">Pembelian</span>
                    </a>
                    <a href="#" class="nav_link active">
                        <i class="fa fa-dollar-sign nav_icon"></i>
                        <span class="nav_name">&nbsp;Pendapatan</span>
                    </a>
                    <a href="#" class="nav_link active">
                        <i class="fa fa-folder nav_icon"></i>
                        <span class="nav_name">Stock Opname</span>
                    </a>
                </div>
            </div>
            <a href="#" class="nav_link">
                <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">SignOut</span>
            </a>
        </nav>
    </div> -->
    <!--Container Main start-->
    <!-- <div class="height-100 bg-light">
        <h4>Main Components</h4>
    </div> -->
    <!--Container Main end-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{url('/product')}}">Darul Hikam</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{url('/product')}}">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{url('/product-category')}}">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{url('/central-sale')}}">Penjualan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{url('/central-purchases')}}">Pembelian</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    @yield('container')
    @yield('pagescript')
</body>

</html>