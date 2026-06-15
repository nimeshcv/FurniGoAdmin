@include('adminnavbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
        <div class="container justify-content-center align-content-center bg-light">
            @if($message=Session::get('success'))
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @endif
            <h1 class="display-3 text-center">Update Category </h1>
            <div class="row justify-content-center align-content-center">
                <div class="col-lg-8 ">
                    <form action="/category/{{$cat->id}}/edit" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="input-group">
                            
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                            <input type="text" class="form-control" placeholder="Category Name" aria-label="Username" aria-describedby="basic-addon1" name="cat_name" value="{{$cat->cat_name}}">
                        </div>
                        <span class="text-danger">@error('cat_name')
                            {{ $message }}
                        @enderror</span>

                        <div class="form-floating mt-4">
                            <textarea id="query" class="form-control" style="height: 180px;" placeholder="enter query" name="desc">{{$cat->cat_desc}}</textarea>
                            <label for="query">Category Description</label>
                        </div>
                        <span class="text-danger">@error('desc')
                            {{ $message }}
                        @enderror</span>

                        <div class="input-group mt-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-at"></i></span>
                            <input type="file" placeholder="e.g.mario" class="form-control" name="img">
                        </div>
                        <span class="text-danger">@error('img')
                            {{ $message }}
                        @enderror</span>
                        <div class="text-center">
                            <button class="btn btn-lg btn-primary mt-3">Submit</button>
                            <button class="btn btn-lg btn-danger mt-3">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>