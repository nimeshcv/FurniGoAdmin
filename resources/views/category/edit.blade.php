@include('adminnavbar')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
   <!-- //import bootstrap -->

<section class="section">
    <div class="card">
        <div class="card-header">
    <h2>Update Category</h2>

        </div>
        <div class="card-body">

    <form action="{{route('category.update',$category->_id)}}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <input type="text" name="cat_name" value="{{$category->cat_name}}" class="form-control w-50"
        placeholder="Enter Category name">
        <input type="file" name="cat_pic" class="form-control w-50 mt-3">

        <button type="submit" class="btn btn-primary mt-3">Submit</button>

    </form>

</div>
    </div>
</section>



@include('adminfooter')
