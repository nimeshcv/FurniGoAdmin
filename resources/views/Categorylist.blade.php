<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard | By Code Info</title>
  <link rel="stylesheet" href="{{asset('sidebarstyle.css')}}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <!-- SweetAlert2 Cdn Link -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  @include('adminnavbar')
 
  <div class="container my-5">

    @if($message=Session::get('success'))
    <div class="alert alert-info" role="alert">
        {{$message}}
    </div>
    @endif

    <a href="/add" class="btn btn-primary">Add Category</a>
    <div class="row justify-content-center mt-5">

      @foreach ($list as $c)
        <div class="col-4">
          <div class="card shadow-lg text-center">
            <img src="category/{{$c->cat_pic}}" class="card-img-top" alt="..." style="height:300px;">
            <div class="card-body">
              <h5 class="card-title">{{$c->cat_name}}</h5>
              <p class="card-text">{{$c->cat_desc}}</p>
              <a href="category/{{$c->id}}/update" class="btn btn-outline-warning me-3">Update</a>
              <a href="javascript:void(0)" class="btn btn-outline-danger" onclick="confirmDelete({{$c->id}})">Delete</a>
            </div>
          </div>
        </div>
      @endforeach 
    </div>

    {{$list->links()}}
  </div>

  <script>
    function confirmDelete(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = '/category/' + id + '/delete';
        }
      })
    }
  </script>
</body>
</html>
