@include('usernavbar')
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Baskervville+SC&display=swap" rel="stylesheet">


<div class="container my-5">
    <h1 class="text-center" style="font-family: 'Baskervville SC';">Product - Categories</h1>

    <div class="row">
        @foreach ($category as $item)
            
        <div class="col-3">
            <div class="card text-center" >
                <img class="card-img-top" style="height: 300px;" src="{{ asset('category')}}/{{$item->cat_pic}}" alt="{{$item->cat_name}}">
                <div class="card-body">
                  <h5 class="card-title">{{$item->cat_name}}</h5>
                  <p class="card-text">{{$item->cat_desc}}</p>
                  <a href="/viewfurniture/{{$item->id}}" class="btn btn-warning">Show More...</a>
                </div>
              </div>
        </div>
        @endforeach

    </div>
</div>
@include('footer')