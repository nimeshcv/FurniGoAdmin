@include('usernavbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js" integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
    <style>
        .pname {
          text-overflow: ellipsis;
          overflow: hidden;
          white-space: nowrap;
      }
      </style>
</head>
<body>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-2 bg-dark text-light">
                    <h5 class="mt-5 display-6">Filter By </h5>
                    <hr class="m-0 border border-2 border-light">
                    
                    <p class="lead">Sort By Category:-</p>
                    @foreach ($cat as $s)
                    <a href="/viewfurniture/{{$s->id}}" class="btn btn-dark ms-3">{{$s->cat_name}}</a>
                    @endforeach
                </div>
                <div class="col-10">
                    <div class="container mt-2">
                        <img src="/c1.avif" alt="">
                    </div>
                    <h1 class="ms-3 mt-3">Products</h1>
                    <hr>
                    <div class="container">
                        <div class="row mt-4 g-3">

                        @foreach($datas as $c)
                                <div class="col-3">
                                    <div class="card shadow-lg" style="height:525px;">
                                        <a href="/productdetail/{{$c->id}}">
                                        <img src="/furniture/{{$c->img}}" style="height:350px;">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title pname" style="margin-top: -10px;">{{$c->productname}}</h5>
                                            <p class="text-secondary" style="margin-top: -5px;">{{$c->primary_material}}</p>
                                            <hr style="margin-top: -10px;">
                                            <h4 class="card-title fw-bold" style="margin-top: -10px;">Rs.{{$c->price}} </h4>
                                            <a href="/addedtocart/{{$c->id}}" class="btn btn-outline-danger me-3" style="width: 100%;">Add to Cart</a>
                                        </div>
                                    </div>  
                                </div>
                        @endforeach
                    </div>
                    {{$datas->links()}}

                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>