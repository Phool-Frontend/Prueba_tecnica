<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Prueba Tecnica</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../public/img/favicon.ico">

    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css" rel="stylesheet"/>
    
    <!-- Istap css  -->
    <link rel="stylesheet" type="text/css" href="../public/css/estilo_istap.css">

    <!-- Toastr-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- WaidMe -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/waitme@1.19.0/waitMe.min.css" integrity="sha256-f4pKuDVe4fH+x/e/ZkA4CgDKOA5SuSlvCnB4BjMb4Ys=" crossorigin="anonymous">
    
  </head>
  <body class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Prueca</b>Tecnica</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>PhoolDx</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../public/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">Phool A. Herrera Condezo</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>

      

            <li class="treeview">
              <a href="#">
                <i class="fa fa-tasks"></i>
                <span>Escritorio</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <!-- <li><a href="graficos_estadisticos.php"><i class="fa fa-circle-o"></i> Graficos E.</a></li>
                <li><a href="personalizar_dash.php"><i class="fa fa-circle-o"></i> Personalizar Dash.</a></li> -->
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Asesor</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="asesor.php"><i class="fa fa-circle-o"></i> Crud asesor </a></li>
                <li><a href="total_cliente_x_asesor.php"><i class="fa fa-circle-o"></i>Total clientes x asesor</a></li>
              </ul>
            </li>
            
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Cliente</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="cliente.php"><i class="fa fa-circle-o"></i>Crud cliente</a></li>
                <!-- <li><a href="total_pedido_x_cliente.php"><i class="fa fa-circle-o"></i>Total pedido x cliente</a></li> -->
              </ul>
            </li>

            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Producto</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="producto.php"><i class="fa fa-circle-o"></i>Crud producto</a></li>
                <!-- <li><a href="total_pedido_x_cliente.php"><i class="fa fa-circle-o"></i>Total pedido x cliente</a></li> -->
              </ul>
            </li>


            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Pedido</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pedido.php"><i class="fa fa-circle-o"></i>Crud pedido</a></li>
                <li><a href="total_pedido_x_cliente.php"><i class="fa fa-circle-o"></i>Total pedido x cliente</a></li>
              </ul>
            </li>
            
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
