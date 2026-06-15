<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/images/favicon.png" />
  <style>.form-control:focus {
    border-color: #a7a4a4 !important;
    box-shadow: 0 0 5px rgba(190, 190, 190, 0.5) !important;
    
}</style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <div class="log text-primary" ><h1 style="text-align: center;  font-family: oxygen,sans-serif; font-weight: 550; "> Login </h2></div>
              <form action="/login" method="POST"> 
                        {{-- it will go through route(web.php) then admin-controller  --}}
                @csrf

                <div class="form-group m-0">
                  <label class="label mt-3 mb-1" >Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" style="padding: 15px; border-radius: 5px;">
                    </div>
                <div class="text-danger " style="font-weight: 300; font-size: 13px;">
                  @error('username')
                      {{$message}}                                    
                  @enderror
              </div>

                <div class="form-group m-0">
                  <label class="label mt-3 mb-1" >Password</label>
                  </div>
                  <input type="password" class="form-control" name="password" placeholder="*********" style="padding: 15px; border-radius: 5px;">
                <div class="text-danger" style="font-weight: 300; font-size: 13px;">
                  @error('password')
                      {{$message}}                                    
                  @enderror
              </div>

              <div class="form-group d-flex justify-content-between">
                <div class="form-check form-check-flat mt-2">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input color-setting:primary;" checked> Keep me signed in
                  </label>
                </div>
                {{-- <a href="/fpassword.php" class="text-small forgot-password text-black">Forgot Password</a> --}}
              </div>

                <div class="form-group mt-2">
                  <button class="btn btn-primary submit-btn btn-block">Login</button>
                </div>

                
               
                <div class="text-block text-center my-3">
                  <span class="text-small font-weight-semibold">Not a member ?</span>
                  <a href="/registero" class="text-black text-small">Create new account</a>
                </div>
              </form>
            </div>
            <ul class="auth-footer">
              <li>
                <a href="#">Conditions</a>
              </li>
              <li>
                <a href="#">Help</a>
              </li>
              <li>
                <a href="#">Terms</a>
              </li>
            </ul>
            <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  @if (Session::get('success'))
    
<script>
    Swal.fire({
  icon: "error",
  title: "Try Again...",
  text: "{{Session::get('success')}}",
  footer: '<a href="/forgot_pass">Forgot Password?</a>'

});
</script> 
@endif

  <script src="/vendors/js/vendor.bundle.base.js"></script>
  <script src="/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="/js/off-canvas.js"></script>
  <script src="/js/misc.js"></script>
  <!-- endinject -->

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
</body>

