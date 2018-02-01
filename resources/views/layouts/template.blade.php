<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>{{ (isset($title))? $title: config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ config('app.url') }}">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/zabuto_calendar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/gritter/css/jquery.gritter.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lineicons/style.css') }}">    
    
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style-responsive.css') }}" rel="stylesheet">

    <script src="{{ asset('assets/js/chart-master/Chart.js') }}"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="/" class="logo"><b>{{ config('app.name') }}</b></a>
            <!--logo end-->
            
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                <li><a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();
                  localStorage.removeItem('token')">Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            	</ul>
            </div>
        </header>

      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="{{ url('assets/img/logo.jpg') }}" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">{{ Auth::user()->nama }}</h5>
                    
                  @if(Auth()->user()->status == 'admin')
                  <li>
                      <a href="{{ route('produk') }}">
                          <i class="fa fa-desktop"></i>
                          <span>Produk</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('pesanan') }}">
                          <i class="fa fa-desktop"></i>
                          <span>Pemesanan</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('pelanggan') }}">
                          <i class="fa fa-desktop"></i>
                          <span>Pelanggan</span>
                      </a>
                  </li>
                  @endif
              	  	
                  @if(Auth()->user()->status == 'marketing')
                  <li>
                      <a href="{{ route('pegawai') }}">
                          <i class="fa fa-desktop"></i>
                          <span>Pengguna</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('pelanggan') }}">
                          <i class="fa fa-desktop"></i>
                          <span>Pelanggan</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Pemasaran</span>
                      </a>
                      <ul class="sub">
                          <li>
                              <a href="{{ route('kriteria-daerah-pemasaran') }}">
                                  <i class="fa fa-desktop"></i>
                                  <span>Kriteria</span>
                              </a>
                          </li>
                          <li>
                            <a href="{{ route('calon-daerah-pemasaran') }}">
                              <i class="fa fa-desktop"></i>
                              <span>Calon Daerah </span>
                            </a>
                          </li>
                          <li>
                            <a href="{{ route('perhitungan-pemasaran') }}">
                               <i class="fa fa-desktop"></i>
                              <span>Rekomendasi </span>
                            </a>
                          </li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Distributor</span>
                      </a>
                      <ul class="sub">
                          <li>
                              <a href="{{ route('kriteria-distributor') }}">
                                <i class="fa fa-desktop"></i>
                                <span>Kriteria</span>
                              </a>
                          </li>
                          <li>
                            <a href="{{ route('distributor') }}">
                              <i class="fa fa-desktop"></i>
                              <span>Daftar Distributor</span> 
                            </a>
                          </li>
                          <li>
                            <a href="{{ route('calon-distributor') }}">
                              <i class="fa fa-desktop"></i>
                              <span>Calon Distributor</span> 
                            </a>
                          </li>
                          <li><a href="{{ route('perhitungan-distributor') }}">
                            <i class="fa fa-desktop"></i>
                            <span>Rekomendasi </span>
                          </a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="{{ route('pesanan') }}">
                          <i class="fa fa-desktop"></i>
                          <span>Pemesanan</span>
                      </a>
                  </li>
                  @endif

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>

      <section id="main-content" style="min-height: 617px">
          <section class="wrapper">
            @yield('content')
          </section>
      </section>

      <footer class="site-footer">
          <div class="text-center">
              2017 - {{ config('app.name') }}
              <a href="#main-content" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>

  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-1.8.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('assets/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery.sparkline.js') }}"></script>


    <!--common script for all pages-->
    <script src="{{ asset('assets/js/common-scripts.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('assets/js/gritter/js/jquery.gritter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/gritter-conf.js') }}"></script>

    <!--script for this page-->
    <script src="{{ asset('assets/js/sparkline-chart.js') }}"></script>    
	  <script src="{{ asset('assets/js/zabuto_calendar.js') }}"></script>
  
    @stack('script')
  </body>
</html>
