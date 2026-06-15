<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create An Account</title>
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
    <style>
        .form-control:focus {
            border-color: #a7a4a4 !important;
            box-shadow: 0 0 5px rgba(190, 190, 190, 0.5) !important;
            
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
            <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        
                        <div class="auto-form-wrapper">
                            <div class="log text-primary mb-3" ><h1 style="text-align: center;  font-family: oxygen,sans-serif; font-weight: 550; "> Welcome to FurniGo</h1></div>
                            <form action="/register" method="POST">
                                         {{-- debug will go through route(web.php) then admin-controller  --}}
                                @csrf
                                <div class="form-group ">
                                        <input type="text" name="username" class="form-control " style="padding: 15px; border-radius: 5px;"
                                            placeholder="Username">
                                        
                                    <div class="text-danger ml-2" style="font-weight: 350; font-size: 13px;">
                                        @error('username')
                                            {{$message}}                                    
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                        <input type="email"  name="email" class="form-control" placeholder="Email Address" style="padding: 15px; border-radius: 5px;">
                                        
                                    <div class="text-danger ml-2" style="font-weight: 350; font-size: 13px;">
                                        @error('email')
                                            {{$message}}                                    
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                        <input type="text" name="mobile_no" class="form-control"
                                            placeholder="Phone No" style="padding: 15px; border-radius: 5px;">
                                    <div class="text-danger ml-2" style="font-weight: 350; font-size: 13px;">
                                        @error('mobile_no')
                                            {{$message}}                                    
                                        @enderror
                                    </div>
                                </div>
                                   
                                <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password" style="padding: 15px; border-radius: 5px;">
                                        
                                    <div class="text-danger ml-2" style="font-weight: 350; font-size: 13px;">
                                        @error('password')
                                            {{$message}}                                    
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                        <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" style="padding: 15px; border-radius: 5px;" >
                                        
                                    <div class="text-danger ml-2" style="font-weight: 350; font-size: 13px;">
                                        @error('cpassword')
                                            {{$message}}                                    
                                        @enderror
                                    </div>
                                </div>
         
                                <div class="form-group">
                                        <select style="padding: 10px; border-radius: 5px; font-weight: 50; font-size: 15px; " name="sec_que" id=""
                                            class="form-select border-secondary  w-100">
                                            <option value="What is your surname?">What is your surname?</option>
                                            <option value="What is your Pet Name?">What is your Pet Name?</option>
                                            <option value="What is name of city you born?">What is name of city you
                                                born?</option>
                                            <option value="What is First school Name?">What is First school Name?
                                            </option>

                                        </select>

                                    
                                </div>
                                <div class="form-group">
                                        <input type="text" name="answer" class="form-control" placeholder="Answer" style="padding: 15px; border-radius: 5px;">
                                        
                               
                                    {{-- @error('answer')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                @enderror --}}
                                </div>


                                <div class="form-group d-flex ">
                                    <div class="form-check form-check-flat mt-0">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" checked> I agree to the
                                            terms
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary submit-btn btn-block">Submit</button>
                                </div>
                                <div class="text-block text-center my-3">
                                    <span class="text-small font-weight-semibold">Already have and account ?</span>
                                    <a href="/" class="text-black text-small">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/vendors/js/vendor.bundle.base.js"></script>
    <script src="/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="/js/off-canvas.js"></script>
    <script src="/js/misc.js"></script>
    <!-- endinject -->
</body>

</html>
