<!DOCTYPE html>
<html>
<head>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


	<!--JQuery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!--JS propio-->
	<script type="text/javascript" src="/js/script.js"></script>
	
	<!--Bootstrap-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">

	<!--Font Awesome (iconos)-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/_all-skins.min.css')}}">

    <style type="text/css">
    	.sidebar li a{
    		color:white;
    	}

    </style>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

	<header class="main-header" style="background: #3c8dbc;">

    <!-- Logo -->
    <a href="#" class="logo" style="background-color: #367fa9">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>AD</b>V</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="color: white;"><b>ADVentas</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class=""><i class="fas fa-bars"></i></span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                
                <p>
                  www.incanatoit.com - Desarrollando Software
                  <small>www.youtube.com/jcarlosad7</small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Cerrar</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>

    </nav>
  </header>

	 <!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar" style="background-color: #222d32;">
	<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
		  <!-- Sidebar user panel -->
		            
		  <!-- sidebar menu: : style can be found in sidebar.less -->
		  <ul class="sidebar-menu">
		    <li class="header"></li>
		    
		    <li class="treeview">
		      <a href="#">
		        <i class="fa fa-laptop"></i>
		        <span>Almacén</span>
		        <i class="fa fa-angle-left pull-right"></i>
		      </a>
		      <ul class="treeview-menu">
		        <li><a href="almacen/articulo"><i class="fa fa-circle-o"></i> Artículos</a></li>
		        <li><a href="almacen/categoria"><i class="fa fa-circle-o"></i> Categorías</a></li>
		      </ul>
		    </li>
		    
		    <li class="treeview">
		      <a href="#">
		        <i class="fa fa-th"></i>
		        <span>Compras</span>
		         <i class="fa fa-angle-left pull-right"></i>
		      </a>
		      <ul class="treeview-menu">
		        <li><a href="compras/ingreso"><i class="fa fa-circle-o"></i> Ingresos</a></li>
		        <li><a href="compras/proveedor"><i class="fa fa-circle-o"></i> Proveedores</a></li>
		      </ul>
		    </li>
		    <li class="treeview">
		      <a href="#">
		        <i class="fa fa-shopping-cart"></i>
		        <span>Ventas</span>
		         <i class="fa fa-angle-left pull-right"></i>
		      </a>
		      <ul class="treeview-menu">
		        <li><a href="ventas/venta"><i class="fa fa-circle-o"></i> Ventas</a></li>
		        <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i> Clientes</a></li>
		      </ul>
		    </li>
		               
		    <li class="treeview">
		      <a href="#">
		        <i class="fa fa-folder"></i> <span>Acceso</span>
		        <i class="fa fa-angle-left pull-right"></i>
		      </a>
		      <ul class="treeview-menu">
		        <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Usuarios</a></li>
		        
		      </ul>
		    </li>
		     <li>
		      <a href="#">
		        <i class="fa fa-plus-square"></i> <span>Ayuda</span>
		        <small class="label pull-right bg-red">PDF</small>
		      </a>
		    </li>
		    <li>
		      <a href="#">
		        <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
		        <small class="label pull-right bg-yellow">IT</small>
		      </a>
		    </li>
		                
		  </ul>
		</section>
	<!-- /.sidebar -->
	</aside>

	<div class="container">
	  @yield('content')
	</div>
</body>
</html>