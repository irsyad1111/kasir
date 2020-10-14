
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="" >
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Meta Responsive tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset ('style/assets/css/bootstrap.min.css') }}">
    <!--Custom style.css-->
    <link rel="stylesheet" href="{{ asset ('style/assets/css/quicksand.css') }}">
    <link rel="stylesheet" href="{{ asset ('style/assets/css/style.css') }}">
    <!--Font Awesome-->
    <link rel="stylesheet" href="{{ asset ('style/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('style/assets/css/fontawesome.css') }}">
    <!--Weather Icons-->
    <link rel="stylesheet" href="{{ asset ('style/assets/css/weather-icons.min.css') }}">
    <!--Chartist CSS-->
    <link rel="stylesheet" href="{{ asset ('style/assets/css/chartist.min.css') }}">
    <!--Bootstrap Calendar-->
    <link rel="stylesheet" href="{{ asset ('style/assets/js/calendar/bootstrap_calendar.css') }}">
    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset ('style/assets/css/dataTables.bootstrap4.min.css') }}">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>Bismillah</title>
  </head>
  <body>
    <!--Page loader-->
    <div class="loader-wrapper">
        <div class="loader-circle">
            <div class="loader-wave"></div>
        </div>
    </div>
    <!--Page loader-->

    <!--Page Wrapper-->

    <div class="container-fluid">

        <!--Header-->
        <div class="row header shadow-sm">

            <!--Logo-->
            <div class="col-sm-3 pl-0 text-center header-logo">
               <div class="bg-theme mr-3 pt-3 pb-2 mb-0">
                    <h3 class="logo"><a href="#" class="text-secondary logo"><i class="fa fa-rocket"></i> Bismillah<span class="small"></span></a></h3>
               </div>
            </div>
            <!--Logo-->

            <!--Header Menu-->
            <div class="col-sm-9 header-menu pt-2 pb-0">
                <div class="row">

                    <!--Menu Icons-->
                    <div class="col-sm-4 col-8 pl-0">
                        <!--Toggle sidebar-->
                        <span class="menu-icon" onclick="toggle_sidebar()">
                            <span id="sidebar-toggle-btn"></span>
                        </span>
                        <!--Toggle sidebar-->
                        <!--Notification icon-->
                        <span class="menu-icon">
                            <i class="fa fa-th-large"></i>
                        </span>
                    </div>
                    <!--Menu Icons-->
                </div>
            </div>
            <!--Header Menu-->
        </div>
        <!--Header-->

        <!--Main Content-->

        <div class="row main-content">
            <!--Sidebar left-->
            <div class="col-sm-3 col-xs-6 sidebar pl-0">
                <div class="inner-sidebar mr-3">
                    <!--Image Avatar-->
                    <div class="avatar text-center">
                        <img src="{{ asset('style/images/admin.jpg')}}" alt="" class="rounded-circle" />
                        <p><strong>Bismillah</strong></p>
                        <span class="text-primary small"><strong>Admin</strong></span>
                    </div>
                    <!--Image Avatar-->

                    <!--Sidebar Navigation Menu-->
                    <div class="sidebar-menu-container">
                        <ul class="sidebar-menu mt-4 mb-4">
                        <li class="parent">
                            <a href="{{ url ('dashboard')}}" class=""><i class="fa fa-puzzle-piece mr-3"></i>
                                <span class="none">Dashboard </span>
                            </a>
                        </li>
                        <li class="parent">
                            <a href="#" onclick="toggle_menu('produk'); return false" class=""><i class="fa fa-dashboard mr-3"> </i>
                                <span class="none">Produk <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                            </a>
                            <ul class="children" id="produk">
                                <li class="child"><a href="{{ url ('produk')}}" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Data Produk</a></li>
                                <li class="child"><a href="{{ url ('kategori')}}" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Kategori Produk</a></li>
                            </ul>
                        </li>
                        <li class="parent">
                            <a href="{{ url ('transaksi')}}" class=""><i class="fa fa-puzzle-piece mr-3"></i>
                                <span class="none">Transaksi </span>
                            </a>
                        </li>
                        <li class="parent">
                            <a href="{{ url ('indexstock')}}" class=""><i class="fa fa-puzzle-piece mr-3"></i>
                                <span class="none">Stock In </span>
                            </a>
                        </li>
                        <li class="parent">
                            <a href="" onclick="toggle_menu('laporan'); return false" class=""><i class="fa fa-list-ul"> </i>
                                <span class="none">Laporan <i class="fa fa-angle-down pull-right align-bottom"></i></span>
                            </a>
                            <ul class="children" id="laporan">
                                <li class="child"><a href="{{ url ('laporan')}}" class="ml-4"><i class="fa fa-angle-right mr-2"></i>Laporan Penjualan</a></li>
                            </ul>
                        </li>
                        </li>
                        </ul>
                    </div>
                    <!--Sidebar Naigation Menu-->
                </div>
            </div>
            <!--Sidebar left-->

            <!--Content right-->
            <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
        @yield('breadcrumbs')
        <div class="row mt-3">
            <div class="col-sm-12">
        @yield('content')
            </div>
        </div>
            <!-- //isi content -->
            </div>
        </div>

        <!--Main Content-->

    </div>

    <!--Page Wrapper-->

    <!-- Page JavaScript Files-->
    <script src="{{ asset ('style/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset ('style/assets/js/jquery-1.12.4.min.js') }}"></script>
    <!--Popper JS-->
    <script src="{{ asset ('style/assets/js/popper.min.js') }}"></script>
    <!--Bootstrap-->
    <script src="{{ asset ('style/assets/js/bootstrap.min.js') }}"></script>
    <!--Sweet alert JS-->
    <script src="{{ asset ('style/assets/js/sweetalert.js') }}"></script>
    <!--Progressbar JS-->
    <script src="{{ asset ('style/assets/js/progressbar.min.js') }}"></script>
    <!--Charts-->
    <!--Canvas JS-->
    <script src="{{ asset ('style/assets/js/charts/canvas.min.js') }}"></script>
    <!--easy pie chart-->
    <script src="{{ asset ('style/assets/js/jquery.easypiechart.min.js') }}"></script>
    <!--echarts chart-->
    <script src="{{ asset ('style/assets/js/charts/echarts.min.js') }}"></script>
    <!--Bootstrap Calendar JS-->
    <script src="{{ asset ('style/assets/js/calendar/bootstrap_calendar.js') }}"></script>
    <script src="{{ asset ('style/assets/js/calendar/demo.js') }}"></script>
    <!--Bootstrap Calendar-->

    <!--Custom Js Script-->
    <script src="{{ asset ('style/assets/js/custom.js') }}"></script>
    <!--Custom Js Script-->
    <!--Datatable-->
    <script src="{{ asset ('style/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset ('style/assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#example').DataTable();
    </script>
  </body>
</html>
