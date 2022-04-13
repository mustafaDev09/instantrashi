<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    .dropzone {
      	border: 2px dashed #028AF4 !important;
   }
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Admin | Dashboard - @yield('title')</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin_style/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('admin_style/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('admin_style/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('admin_style/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admin_style/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/admin_style/dist/css/multiform.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('admin_style/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('admin_style/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('admin_style/plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css"/>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
   <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
   {{-- <link rel="stylesheet" href="http://getbootstrap.com/2.3.2/assets/css/docs.css"> --}}
   <link rel="stylesheet" href="{{asset('admin_style/dist/css/bootstrap-tagsinput.css')}}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
   {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css"> --}}

   @stack('style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    
      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('admin_style/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
      </div>
    <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('admin.dashboard')}}" class="brand-link">
          <img src="{{asset('admin_style/dist/img/images.JFIF')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light ">Instant Rashi</span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{asset('admin_style/dist/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block ">Instant Rashi {{auth('admin')->user()->username}}</a>
              <ul class="m-auto">
               <li class="nav item  text-light">
                 <a href="{{route('admin.logout')}}">
                    Logout
                 </a>
                   </li>
              </ul>
            </div>
          </div>
          <!-- SidebarSearch Form -->
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="{{route('agent.index')}}" class="nav-link">
                  <i class="nav-icon far fa-circle nav-icon text-primary"></i>
                  <p class="text" >Agent</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('agent-balence-transfer')}}" class="nav-link">
                  <i class="nav-icon far fa-circle nav-icon text-danger"></i>
                  <p class="text" >Agent Balence Transfer</p>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
    
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
       
      <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div>
      </section>
      <!-- /.content-wrapper -->
   
    
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <div class="col-md-8">
      <footer class="main-footer container-fluid ">
       <strong>Copyright &copy; 2021-2030 <a href="{{route('admin.dashboard')}}">Instant Rashi</a>.</strong>
       All rights reserved.
       <div class="float-right d-none d-sm-inline-block ">
         <b>Version</b> 5.2.0
       </div>
     </footer>
    
    <!-- jQuery -->
    <script src="{{asset('admin_style/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('admin_style/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('admin_style/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('admin_style/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('admin_style/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('admin_style/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('admin_style/plugins/jqvmap/maps/jquery.vmap.usa.js')}}" ></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('admin_style/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('admin_style/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('admin_style/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('admin_style/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('admin_style/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('admin_style/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin_style/dist/js/adminlte.js')}}"></script>
    <script src="/admin_style/dist/js/multiform.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin_style/dist/js/demo.js')}}"></script>
    <link href="{{asset('css/themify-icons.css')}}" rel="stylesheet">
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('admin_style/dist/js/pages/dashboard.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="{{asset('admin_style/dist/js/bootstrap-tagsinput.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> 
     <script>    
  </script>
  <script>
$(document).ready(function(){    
      toastr.options.closeButton = true;
      @if (Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
      @endif
});
function destroy(url){
              $.ajax(
                  {
                      type: "POST",
                      url: url,
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      data: {
                          '_method': 'DELETE'
                      },
                      success: function (data) {
                          $('#dataTableBuilder').DataTable().ajax.reload();
                      }
                  }
              ).done(function (data) {
                  if(data.success){
                    toastr.info(  
                             'Deleted!',
                            data.message,
                            'success'); 
                  }else{
                        toastr.error(  
                             'Error!',
                            data.message,
                            'success'); 
                    }
              });
          }
  </script>
  @stack('script')
</body>
</html>
          
