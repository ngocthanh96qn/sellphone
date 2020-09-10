
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href={{asset("admin/plugins/fontawesome-free/css/all.min.css")}}>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href={{asset("admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}>
  <!-- iCheck -->
  <link rel="stylesheet" href={{asset("admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}>
  <!-- JQVMap -->
  <link rel="stylesheet" href={{asset("admin/plugins/jqvmap/jqvmap.min.css")}}>
  <!-- Theme style -->
  <link rel="stylesheet" href={{asset("/admin/dist/css/adminlte.min.css")}}>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href={{asset("admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}>
  <!-- Daterange picker -->
  <link rel="stylesheet" href={{asset("admin/plugins/daterangepicker/daterangepicker.css")}}>
  <!-- summernote -->
  <link rel="stylesheet" href={{asset("admin/plugins/summernote/summernote-bs4.css")}}>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href={{asset("admin/css/style-admin.css")}}>

</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/admin/index') }}" class="nav-link">Home</a>
      </li>
    </ul>

    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     <!-- login and dk -->
      <li>
         <div  >
          <img src="{{asset("admin/dist/img/user2-160x160.jpg")}}" style="width: 40px; height: 40px" class="img-circle elevation-2" alt="User Image">
        </div>
      </li>
      <li class="nav-item dropdown">

        
        <div class="info">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->fullname }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('auth.logoutadmin') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Đăng Xuất
           </a>

          <form id="logout-form" action="{{ route('auth.logoutadmin') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>

        </div>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset("admin/dist/img/AdminLTELogo.png")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
      <span class="brand-text font-weight-light">ADMIN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Danh mục quản lí
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <?php  $role_user = Auth::user()->role_users->pluck('role_id')->toArray();?>
                  @if(in_array(1, $role_user))
                    <li class="nav-item ">
                      <a href="{{ url('/admin/role') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Quản lí phân quyền</p>
                      </a>
                    </li>
                  @endif
                  @if(in_array(2, $role_user))
                    <li class="nav-item">
                      <a href="{{ url('/admin/category') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Quản lí hãng sản xuất</p>
                      </a>
                    </li>
                  @endif
                  @if(in_array(3, $role_user))
                    <li class="nav-item">
                      <a href="{{ url('/admin/product') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Quản lí sản phẩm</p>
                      </a>
                    </li>
                  @endif
                  @if(in_array(4, $role_user))
                    <li class="nav-item">
                      <a href="{{ url('/admin/order') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Quản lí đơn hàng</p>
                      </a>
                    </li>
                  @endif
                  @if(in_array(5, $role_user))
                    <li class="nav-item">
                      <a href="{{ url('/admin/user') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Quản lý khách hàng</p>
                      </a>
                    </li>
                  @endif
                  @if(in_array(6, $role_user))
                    <li class="nav-item">
                      <a href="{{ url('/admin/userAuth') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Quản lí người phân quyền</p>
                      </a>
                    </li>
                  @endif
            </ul>
          </li>
                           
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

       
        @section('content')
        @show

        
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<!-- ./wrapper -->

<!-- jQuery -->

<script src={{asset("admin/plugins/jquery/jquery.min.js")}}></script>
<!-- jQuery UI 1.11.4 -->
<script src={{asset("admin/plugins/jquery-ui/jquery-ui.min.js")}}></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src={{asset("admin/plugins/bootstrap/js/bootstrap.bundle.min.js")}}></script>
<!-- ChartJS -->
<script src={{asset("admin/plugins/chart.js/Chart.min.js")}}></script>
<!-- Sparkline -->
<script src={{asset("admin/plugins/sparklines/sparkline.js")}}></script>
<!-- JQVMap -->
<script src={{asset("admin/plugins/jqvmap/jquery.vmap.min.js")}}></script>
<script src={{asset("admin/plugins/jqvmap/maps/jquery.vmap.usa.js")}}></script>
<!-- jQuery Knob Chart -->
<script src={{asset("admin/plugins/jquery-knob/jquery.knob.min.js")}}></script>
<!-- daterangepicker -->
<script src={{asset("admin/plugins/moment/moment.min.js")}}></script>
<script src={{asset("admin/plugins/daterangepicker/daterangepicker.js")}}></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src={{asset("admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}></script>
<!-- Summernote -->
<script src={{asset("admin/plugins/summernote/summernote-bs4.min.js")}}></script>
<!-- overlayScrollbars -->
<script src={{asset("admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}></script>
<!-- AdminLTE App -->
<script src={{asset("admin/dist/js/adminlte.js")}}></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src={{asset("admin/dist/js/pages/dashboard.js")}}></script>
<!-- AdminLTE for demo purposes -->
<script src={{asset("admin/dist/js/demo.js")}}></script>
<!-- my script -->
<script src={{asset("admin/js/myscript.js")}}></script>
</body>
</html>

