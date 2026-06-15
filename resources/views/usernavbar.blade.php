<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('userhome.css')}}" />
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Bricolage+Grotesque:opsz@10..48&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Philosopher:wght@700&display=swap" rel="stylesheet">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <img src="/s.png" class="img-fluid" id="navimg">
          <a class="navbar-brand" id="brand" href="/">Fusion Studio</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active mx-4" aria-current="page" href="/">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-4" href="/viewfurnitureall">SHOP NOW</a>
              </li>

              

              <li class="nav-item">
                <a class="nav-link mx-4" href="/categoryAll">CATEGORY</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-4" href="/about">ABOUT US</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-4" href="/contact">CONTACT</a>
              </li>
              
              

            </ul>
            <form class="d-flex me-2" role="search" action="/search" method="POST">
              @csrf
              <input id="search" name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button id="search_btn" class="btn btn-outline-success" type="submit">Search</button>
            </form>

            @php
                if(Session::has('ccount')){
                  $cart_count=Session::get('ccount');
                }else{
                  $cart_count=0;
                }
            @endphp

            <a href="/myorder"> <i class="fa-solid fa-file-lines me-3" style="color: #01060e; font-size: x-large;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="My Orders"></i></a>


        <a href="/viewcart"><i class="fa-solid fa-cart-shopping me-2" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Cart" style="color: #02060d; font-size: x-large;"></i><span style="margin-left: -15px; font-size: 10px" class="badge text-bg-danger">{{$cart_count}}</span>
          <a href="/logout" class="ms-2"> <i class="fa-regular fa-user me-3" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="logout" style="color: #01060e; font-size: x-large;" data-bs-toggle="modal" data-bs-target="#exampleModal"></i></a>
         
          </a>

          </div>
        </div>
      </nav>
      <hr class="m-0 border border-3 border-dark">
      {{-- /////////// --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@if (Session::get('success'))
<script>
Swal.fire({
    
    text: "{{ Session::get('success') }}",
    showConfirmButton: false,
    timer: 2500
});
</script>

    
@endif