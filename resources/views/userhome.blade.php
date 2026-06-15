@include('usernavbar')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('userhome.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Baskervville+SC&display=swap"
        rel="stylesheet">
        <style>
            .pname {
              text-overflow: ellipsis;
              overflow: hidden;
              white-space: nowrap;
          }
          </style>
</head>

<body>


    <div class=" bg-light my-5">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($banners as $item)
                    <div class="carousel-item @if ($loop->first) active @endif" data-bs-interval="5000">
                        <img src="{{ asset('images/' . $item->img) }}" class="d-block w-100 h-100" alt="...">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>




    <div class="container">
        <img class="img" src="c1.avif" alt="">
    </div>

    <section class="container">
        <div class="row mt-3">
            <div class="col-9">
                <h2 class="ms-4 fw-bold text-danger"  style="font-family: 'Baskervville SC';">Categories</h2>
            </div>
            <div class="col-3 text-end">
                <a class="btn btn-warning" href="/categoryAll">Show All <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row mt-3 scrolling-wrapper scrollmenu">
                @foreach ($clist as $c)
                    <div class="col-3 text-center">
                        <div class="card shadow-lg border-0"style="width: 300px;">
                            <div class="image-container">
                                <a href="/viewfurniture/{{ $c->id }}"><img src="/category/{{ $c->cat_pic }}"
                                        alt="Your Image" height="200" style="border-radius: 5%;"></a>
                                <div class="overlay">
                                    <!-- Content for the sliding panel goes here -->
                                    <p>{{ $c->cat_desc }}</p>
                                </div>
                            </div>
                            <div class="mt-3 cardbody text-center">
                                <h4>{{ $c->cat_name }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="container my-3">
        <div class="row mt-4">
            <h5 class="text-center text-success" >Care for furniture</h5>
            <hr>
        </div>
        <div class="row" style="height=100px;">
            <div class="col-6">
                <img src="a2.avif" class="img">
            </div>
            <div class="col-6">
                <img src="/2.avif" class="img">
            </div>
        </div>
    </div>

    <section class="container  mt-3">
        <div class="row mt-3">
            <div class="col-9">
                <h2 class="ms-4 text-danger fw-bold" style="font-family: 'Baskervville SC';">BestSeller</h2>
            </div>
            <div class="col-3 text-end">
                <a href="/viewfurnitureall" class="btn btn-warning">Show All  <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row scrolling-wrapper scrollmenu">
                @foreach ($blist as $s)
                    <div class="col-3">
                        <div class="card shadow-lg" style="width:300px; height:450px;">
                            <a href="/productdetail/{{$s->id}}">
                            <img src="/furniture/{{ $s->img }}" class="card-img-top" style="height: 250px;"/></a>
                            <div class="card-body">
                                <h4 class="card-title pname">{{ $s->productname }}</h4>
                                <p class="card-text">Price: ₹{{ $s->price }}</p>
                                <a href="/addedtocart/{{ $s->id }}" class="btn  btn-outline-success">Buy Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="container mt-3">
        <img src="emi-banner.jpg" alt="">
    </div>
    @include('footer')
</body>

</html>
