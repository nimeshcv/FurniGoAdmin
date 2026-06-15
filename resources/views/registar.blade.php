<!doctype html>
<html >
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('sidebarstyle.css')}}" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Bricolage+Grotesque:opsz@10..48&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Philosopher:wght@700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-PRrgQVJ8NNHGieOA1grGdCTIt4h21CzJs6SnWH4YMQ6G5F5+IEzOHz67L4SQaF0o" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="newLogin.css">
    <title>Register</title>
  </head>
  <body>

<div class="container" id="Signbox">
  <div class="row">
    <div class="col-6">
      <img src="/login-bg1.jpg" alt="" style="object-fit: fill" height="600px" width="300px">
    </div>
    <div class="col-6">
      <form method="POST" action="/register" enctype="multipart/form-data">
        @csrf
        <h2 class="fw-bold text-center mt-3">Sign Up Now!!!</h2><hr>
            <input type="text" name="username" value="{{old('username')}}"
            class="form-control" placeholder="Enter Username"/>
            <span class="mb-3 text-danger">@error('username')
                {{$message}}
            @enderror</span>

            <input type="password" name="password"
            class="form-control mt-3" placeholder="Enter Password"/>
            <span class="mb-3 text-danger">@error('password')
            {{$message}}
            @enderror</span>

            <input type="password" name="conf_password"
            class="form-control mt-3" placeholder="Enter Confirm Password"/>
            <span class="mb-3 text-danger">
                @error('conf_password')
                                    {{$message}}
                                @enderror
            </span>

            <input type="email" name="email" value="{{old('email')}}"
            class="form-control mt-3" placeholder="Enter Email"/>
            <span class="mb-3 text-danger">@error('email')
                {{$message}}

            @enderror</span>


            <input type="text" name="phone" value="{{old('phone')}}"
            class="form-control mt-3 my-3" placeholder="Enter Contact"/>
            <span class="mb-3 text-danger">@error('phone')
                {{$message}}

            @enderror</span>
            <p class="text-white">Address</p>
            <textarea class="form-control " name="address" value="{{old('address')}}" cols="5"
            ></textarea>
            <span class="mb-3 text-danger">@error('address')
                {{$message}}

            @enderror</span>

            <select class="form-select mt-3" name="city" >
                <option value="">Please Select your city</option>
                <option value="Surat">Surat</option>
                <option value="Baroda">Baroda</option>
                <option value="Mumbai">Mumbai</option>
                <option value="Ahemdabad">Ahemdabad</option>
                <option value="Anand">Anand</option>
            </select>
            <span class="mb-3 text-danger">@error('city')
                {{$message}}
            @enderror</span>
            <button type="submit" name="btnsubmit" class="btn btn-secondary">Sign Up</button>
            <p class="text-light text-center"><a href="/login">Login Here</a> </p>
    </form>
    </div>
  </div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    -->
  </body>
</html>