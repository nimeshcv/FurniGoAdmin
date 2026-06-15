<span class="admin">
  @include('adminnavbar')

</span>
<div class="main">
  <style >
    @import url("https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css");
    .admin {
        all: unset;
    }

  </style>

{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  --}}
   <!-- //import bootstrap -->
   <section class="section">
    <div class="card">
        <div class="card-header">
    <h2>Add Banner</h2>

        </div>
        <div class="card-body">

            <form action="{{route('banner.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class=" ms-1">
                  <label for="exampleInputEmail1" class="form-label">Banner Pic:</label></div>
                  <input type="file" name="img" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <div class="text-danger">
                    @error('img')
                        {{$message}}                                    
                    @enderror
                </div>
                
               
                <div class="form-check form-switch">
                    <input class="form-check-input" name="status" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                    <label class="form-check-label" for="flexSwitchCheckChecked"><h6 style="font-weight: 300;">Status</h6></label>
                  </div>

                
                <button type="submit" class="btn btn-outline-primary">Submit</button>
              </form>
              
        </div>
    </div>


   </section>
     
</div>
   {{-- @include('adminfooter') --}}
