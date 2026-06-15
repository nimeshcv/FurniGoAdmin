@include('adminnavbar')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
   <!-- //import bootstrap -->
<section class="section">
    <div class="card">
        <div class="card-header">
    <h2>Add category</h2>

        </div>
        <div class="card-body">

    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data" >
        @csrf
        
        <input type="text" name="cat_name" value="{{old('cat_name')}}" class="form-control w-50"
        placeholder="Enter Category name">
        <div class="text-danger">
            @error('cat_name')
                {{$message}}                                    
            @enderror
        </div>

        <div class="mt-3 ms-1">
            <label for="exampleInputEmail1"  class="form-label">Category Pic:</label></div>
        <input type="file" name="cat_pic" value="{{old('cat_pic')}}" class="form-control w-50 ">
        <div class="text-danger">
            @error('cat_pic')
                {{$message}}                                    
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>

    </form>

</div>
    </div>
</section>



@include('adminfooter')
