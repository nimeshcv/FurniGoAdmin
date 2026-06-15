@include('adminnavbar')

{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  --}}
<!-- Import Bootstrap --> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
{{-- import fontAwesome cdn --}}

<head>
</head>
<body>
<section class="section">
  <div class="card">
      <div class="card-header">
          <h2>Users</h2>
      </div>
    <div class="">
    <div class="table-responsive">
    <table class="table table-striped header-expand table-bordered table-hover table-primary" id="table1">
      <thead class="table-primary text-start text-bold ">
          <tr>
            <th scope="col"><h5>Sr. no.</h5></th>
            <th scope="col"><h5>Name</h5></th>
            <th scope="col"><h5>email</h5></th>
            <th scope="col"><h5>phone</h5></th>
            <th scope="col"><h5>address</h5></th>
            <th scope="col"><h5>city</h5></th>
          </tr>
        </thead>
        <tbody class="text-start ">
        @foreach ($user as $u)
          <tr>
            <td><h6 style="font-weight: 300;">{{$loop->index + 1}}</h6></td>
            <td><h6 style="font-weight: 300;">{{$u->username}}</h6></td>
            <td><h6 style="font-weight: 300;">{{$u->email}}</h6></td>
            <td><h6 style="font-weight: 300;">{{$u->mobileno}}</h6></td>
            <td><h6 style="font-weight: 300;">{{$u->address}}</h6></td>
            <td><h6 style="font-weight: 300;">{{$u->city}}</h6></td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
  
      {{$user->links()}}
  </div>
</body>
