<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>{{ config('app.name', 'Tasya Production') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ config('app.url_client') }}">
    <meta name="app-name" content="{{ config('app.name') }}">

    <!-- Bootstrap core CSS -->
    <link href="{{ url('assets/css/bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ url('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/style-responsive.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="root" >
    
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ url('assets/js/jquery.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ url('assets/js/jquery.dcjqaccordion.2.7.js') }}"></script>

    <script src="{{ url('js/client.js') }}"></script>

  </body>
</html>
