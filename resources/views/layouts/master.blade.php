
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf_token"content="{{csrf_token()}}">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/css/app.css">
  <link rel="icon" href="img/icon.png"
  type="image/icon type">
  <script>
        window.user = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'api_token' => (Auth::user()) ? Auth::user()->api_token : null
        ]) !!};
    </script>


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <a href="/" class="brand-link">
      <img src="img/logo.png" alt="AdminLTE Logo" 
           style="opacity: .8"> 
      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!--<div class="image">
          <img src="{{asset(Auth::user()->avatar)}}" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a href="#" class="d-block"> {{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


          <!--catalogue treeview -->

          <li class="nav-item has-treeview menu-close">
                 <a href="#" class="nav-link">
                  <i class="fas fa-users-cog"></i>
                   <p>
                     User
                     <i class="right fas fa-angle-left"></i>
                   </p>
                 </a>
                 <ul class="nav nav-treeview"style="padding-left:20px">
                   <li class="nav-item" >
                    <router-link to="/userprofile" class="nav-link">
                   <i class="fas fa-user"></i>
                       <p>User profile</p>
                     </router-link>
                   </li>
                   <li class="nav-item">
                     <router-link to="/usertype" class="nav-link">
                      <i class="fas fa-users"></i>
                       <p>User Type</p>
                     </router-link>
                   </li>


         </ul>
       </li>


          <li class="nav-item has-treeview menu-close">
                 <a href="#" class="nav-link">
                   <i class="fas fa-globe-asia"></i>
                   <p>
                     Address
                     <i class="right fas fa-angle-left"></i>
                   </p>
                 </a>
                 <ul class="nav nav-treeview"style="padding-left:20px">
                   <li class="nav-item">
                    <router-link to="/state" class="nav-link">
                   <i class="far fa-map"></i>
                       <p>State</p>
                     </router-link>
                   </li>
                   <li class="nav-item">
                     <router-link to="/district" class="nav-link">
                      <i class="fas fa-map-marker-alt"></i>
                       <p>District</p>
                     </router-link>
                   </li>
                   <li class="nav-item">
                     <router-link to="/municipality" class="nav-link">
                       <i class="fas fa-location-arrow"></i>
                       <p>municipality</p>
                     </router-link>
                 </li>
               <li class="nav-item">
                 <router-link to="/ward" class="nav-link">
                   <i class="fas fa-street-view"></i>
                   <p>ward</p>
                 </router-link>
           </li>
         </ul>
       </li>

       <li class="nav-item" >
         <router-link to="/post" class="nav-link">
          <i class="fas fa-landmark"></i>
           <p>Post</p>
         </router-link>
       </li>

       <li class="nav-item" >
         <router-link to="/propertytype" class="nav-link">
          <i class="fas fa-landmark"></i>
           <p>Property Type</p>
         </router-link>
       </li>

           <a class="nav-item" href="{{ route('logout') }}"style="padding-left:20px"
   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
   <i class="fas fa-sign-out-alt"></i>
    Logout
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
    {{ csrf_field() }}
</form>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
            <router-view></router-view>
          <vue-progress-bar></vue-progress-bar>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->
  <!-- REQUIRED SCRIPTS -->
  <script src="/js/app.js"></script>
  </body>
  </html>
