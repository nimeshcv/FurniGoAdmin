<!DOCTYPE html>
<html lang="en">

@if(Session::has('user'))
    <!-- The content visible when the user is logged in -->
   
@else
    <script>
        window.location.href = "{{ url('/') }}";
    </script>
@endif

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin panel</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="/vendors/css/vendor.bundle.addons.css">
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  --}}
   <!-- //import bootstrap -->
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/css/style.css">
  
  <!-- endinject -->
  {{-- <link rel="shortcut icon" href="/images/favicon.png" /> --}}
</head>

<body>
  <div class="container-scroller" style="background-color: rgb(0, 0, 0)">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center"  style="background-color: rgb(221, 243, 251)">
        <a  class="navbar-brand brand-logo mt-4" >
          <img style="width: 180px; height: auto;" src="{{asset('images/Fur.png')}}" alt="logo" />
          {{-- <img style="width: 180px; height: auto;" src="/images/Fur.png" alt="logo" /> --}}
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img style="width: 50px; height:auto;" src="/images/logo.png" alt="logo" /> 
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
         
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
       
          {{-- <li class="nav-item dropdown d-none d-xl-inline-block"> --}}
            {{-- <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false"> --}}
              <span class="profile-text mr-2">Hello, Administrator! </span>
              {{-- <img class="img-xs rounded-circle" src="images/faces/face1.jpg" alt="Profile image"> --}}
              <img src="/images/faces-clipart/pic-1.png" style="width: 40px; height:auto;" alt="profile image">
            {{-- </a> --}}
          
          {{-- </li> --}}
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper" style="background-color: rgb(221, 243, 251)"x>
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" style="background-color: rgb(221, 243, 251)" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile me-3">
            <div class="nav-link"  style="background-color: rgb(221, 243, 251)">
              <div class="user-wrapper mt-5 " style="margin-bottom: 10px;">
                <div class="profile-image">
                  <h4><img src="/images/faces-clipart/pic-1.png" style="width: 40px; height:auto;" alt="profile image"></h4>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><h4>Administrator</h4></p>
                 
                </div>
              </div>
             
            </div>
          </li>
          <li class="nav-item " >
            <a class="nav-link" style="background-color: rgb(221, 243, 251)" href="/home">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title"><h6>Dashboard</h6></span>
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" style="background-color: rgb(221, 243, 251)" href="/banner">
              <i class="menu-icon mdi mdi-backup-restore"></i>
              <span class="menu-title"><h6>Banner</h6></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="background-color: rgb(221, 243, 251)" href="/category">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title"><h6>Categories</h6></span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link" style="background-color: rgb(221, 243, 251)" href="/coupon">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title"><h6>Coupon</h6></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="background-color: rgb(221, 243, 251)" href="/furnitures">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title"><h6>Furniture</h6></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="background-color: rgb(221, 243, 251)"  href="/task">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title"><h6>orders</h6></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="background-color: rgb(221, 243, 251)"  href="/user">
              <i class="menu-icon mdi mdi-sticker"></i>
              <span class="menu-title"><h6>User</h6></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="background-color: rgb(221, 243, 251)"  href="/store">
              <i class="menu-icon mdi mdi-sticker"></i>
              <span class="menu-title"><h6>store</h6></span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" style="background-color: rgb(221, 243, 251)"  href="/aboutus">
              <i class="menu-icon mdi mdi-sticker"></i>
              <span class="menu-title"><h6>About Us</h6></span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" style="background-color: rgb(221, 243, 251)" href="/logout">
              <i class="menu-icon mdi mdi-sticker"></i>
              <span class="menu-title"><h6>Logout</h6></span>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel" >
        <div class="content-wrapper " style="background-color: rgb(235, 235, 244)" >
