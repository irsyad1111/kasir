
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kasir CRUD</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset ('style/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('style/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('style/vendors/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset ('style/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('style/vendors/selectFX/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset ('style/vendors/jqvmap/dist/jqvmap.min.css') }}">
    <!-- table -->
    <link rel="stylesheet" href="{{ asset ('style/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('style/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('style/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">

    <!-- Choosen -->
    <link rel="stylesheet" href="{{ asset ('style/vendors/chosen/chosen.min.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>



    <link rel="stylesheet" href="{{ asset ('style/assets/css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{ asset ('style/images/logo.png') }}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{ asset ('style/images/logo2.png') }}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url ('dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Data Barang</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Produk</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ url ('produk')}}">Data Produk</a></li>
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{ url ('kategori')}}">Kategori Produk</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="{{ url ('transaksi')}}"> <i class="menu-icon fa fa-dashboard"></i>Transaksi </a>
                    </li>
                    <li class="active">
                        <a href="{{ url ('indexstock')}}"> <i class="menu-icon fa fa-dashboard"></i>Tambah Stock Produk</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
    @yield('breadcrumbs')

        <div class="content mt-3">

        @yield('content')


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="{{ asset ('style/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset ('style/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset ('style/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('style/assets/js/main.js') }}"></script>

    @yield('scriptjs')
    <script src="{{ asset ('style/vendors/chart.js/dist/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset ('style/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset ('style/assets/js/widgets.js') }}"></script>
    <script src="{{ asset ('style/vendors/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset ('style/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset ('style/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>

    <!-- table -->
    <script src="{{ asset ('style/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset ('style/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset ('style/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset ('style/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset ('style/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset ('style/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset ('style/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset ('style/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset ('style/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset ('style/vendors/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset ('style/assets/js/init-scripts/data-table/datatables-init.js') }}"></script>

    <!-- chosen -->
    <script src="{{ asset ('style/vendors/chosen/chosen.jquery.min.js') }}"></script>

    <script>
        document.getElementById('tanggal').valueAsDate = new Date();
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);


    </script>

</body>

</html>
