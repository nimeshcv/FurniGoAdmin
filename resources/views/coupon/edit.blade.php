@include('adminnavbar')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
   <!-- //import bootstrap -->

<section class="section">
    <div class="card">
        <div class="card-header">
    <h3>Update Coupon</h3>

        </div>
        <div class="card-body">

    <form action="{{route('coupon.update',$coupon->_id)}}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <input type="text" name="c_code" value="{{$coupon->c_code}}" class="form-control w-50 mt-3"
        placeholder="Enter Coupon code">

        <textarea type="text" name="c_desc" class="form-control w-50 mt-3"
        placeholder="Enter Coupon description">{{$coupon->c_desc}}</textarea>

        <input type="text" name="c_discount" value="{{$coupon->c_discount}}" class="form-control w-50 mt-3"
        placeholder="Enter Coupon Discount percentage">

        <input type="text" name="c_max_amt" value="{{$coupon->c_max_amt}}" class="form-control w-50 mt-3"
        placeholder="Enter Max amount ">

        <div class="mt-3 ms-1">
            <label for="exampleInputEmail1" class="form-label">Coupon Pic:</label></div>
        <input type="file" name="c_pic"  class="form-control w-50 ">

        <div class="form-check form-switch mt-3">
            @if ($coupon->status)
            <input class="form-check-input" type="checkbox" name="status" role="switch" id="flexSwitchCheckChecked" checked> <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                
            @else
            <input class="form-check-input" type="checkbox" name="status" role="switch" id="flexSwitchCheckChecked" > <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                
            @endif
        </div>
        <button type="submit" class="btn btn-outline-primary ">Submit</button>

    </form>

</div>
    </div>
</section>



@include('adminfooter')
