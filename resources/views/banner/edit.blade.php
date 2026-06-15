@include('adminnavbar')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
   <!-- //import bootstrap -->
   <section class="section">
    <div class="card">
        <div class="card-header">
    <h2>Update Banner</h2>

        </div>
        <div class="card-body">
            <form action="{{route('banner.update',$banner->id)}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Banner Pic:</label>
                  <input type="file" name="img" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                </div>
               
                <div class="form-check form-switch">
                  @if ($banner->status)
                    <input class="form-check-input" name="status" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                      
                  @else
                    <input class="form-check-input" name="status" type="checkbox" role="switch" id="flexSwitchCheckChecked" >
                      
                  @endif
                    <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                  </div>

                
                <button type="submit" class="btn btn-outline-primary mt-">Submit </button>
              </form>
              
        </div>
    </div>


</div>
