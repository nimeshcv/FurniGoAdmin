@include('adminnavbar')
<html>
    <body>

<div class="main">
<style>
  .pname {
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
}
</style>


<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card" style="">
        <div class="card card-statistics">
            
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-cube text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                        <h4 class="mb-0 text-right" style="color: rgb(0, 145, 255)">Total Revenue</h4>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0 mt-4" style="color: rgb(0, 145, 255)">₹ {{ $data }}</h3>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div  class="card card-statistics">
            <a href="/banner">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-receipt text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                        {{-- <a href="/banner" class="mb-0 text-right"><h4>Banner</h4></a> --}}
                        <h4  class="mb-0 text-right">Banner</h4>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0 mt-4">{{$banner_count}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>


    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <a href="/list" class="mb-0 text-right">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-receipt text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                        {{-- <a href="/list" class="mb-0 text-right">Category</a> --}}
                        <h4 class="mb-0 text-right">Category</h4>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0 mt-4">{{$cat_count}}</h3>
                        </div>
                    </div>
                </div>

            </div>
            </a>
        </div>
    </div>



    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <a href="/furnitures">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-poll-box text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                        {{-- <a href="/furnitures" class="mb-0 text-right">Furniture</a> --}}
                        <h4  class="mb-0 text-right">Furniture</h4>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0 mt-4">{{$pr_count}}</h3>
                        </div>
                    </div>
                </div>

            </div>
            </a>
        </div>
    </div>

    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">

            <div class="card card-statistics">
                <a href="/user" >
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-account-location text-info icon-lg"></i>
                        </div>
                        <div class="float-right">
                            {{-- <a href="/user" class="mb-0 text-right">Users</a> --}}
                            <h4 class="mb-0 text-right">Users</h4>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0 mt-4">{{$user_count}}</h3>
                            </div>
                        </div>
                    </div>

                </div>
                </a>
            </div>
    </div>

    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">

        <div class="card card-statistics">
            <a href="/store" >
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-receipt text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                        {{-- <a href="/user" class="mb-0 text-right">Users</a> --}}
                        <h4 class="mb-0 text-right">Store</h4>
                        <div class="fluid-container">
                            {{-- <h3 class="font-weight-medium text-right mb-0 mt-4">{{$store_count}}</h3> --}}
                        </div>
                    </div>
                </div>

            </div>
            </a>
        </div>
</div>
</div>


   



    <section class="main-course my-5">
        {{-- <h2>BestSeller</h2>
        <hr> --}}
        <div class="container">
            <div class="row scrolling-wrapper scrollmenu">
                @foreach ($item as $s)
                    <div class="col-3">
                        <div class="card shadow-lg" >
                            <img src="/furniture/{{ $s->img }}" class="card-img-top" alt="..." height="175"
                                width="100">
                            <div class="card-body">
                                <h4  class="card-title pname">{{ $s->productname }}</h4>
                                <p class="card-text">Price: ₹{{ $s->price }}</p>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@if (Session::get('success'))
<script>

Swal.fire({
    
    icon: "success",
    title: "Success!",
    text: "{{ Session::get('success') }}",
    showConfirmButton: false,
    timer: 2500
  });
</script>

    
@endif


<script>
    function confirmDelete(event) {
        event.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.submit(); // Submit the form after confirmation
            }
        });
    }
</script>

{{-- /////////// --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@if (Session::get('success'))
<script>
Swal.fire({
    // icon: 'question',
    text: "{{ Session::get('success') }}",
    showConfirmButton: false,
    timer: 2500
});
</script>

    
@endif

<script src="/assets/vendors/simple-datatables/simple-datatables.js"></script>
<script>
</div>
</body>

</html>
