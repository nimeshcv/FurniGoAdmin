@include('adminnavbar')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
   <!-- //import bootstrap -->
<section class="section">
    <div class="card">
        <div class="card-header">
    <h3>Add Coupon</h3>

        </div>
        <div class="card-body">

    <form action="{{route('coupon.store')}}" method="POST" enctype="multipart/form-data" >
        @csrf
        <input type="text" name="c_code" value="{{old('c_code')}}" class="form-control w-50 mt-3"
        placeholder="Enter Coupon code">
        <div class="text-danger ml-2" style="font-weight: 400; font-size: 13px;">
            @error('c_code')
                {{$message}}                                    
            @enderror
        </div>

        <textarea type="text" name="c_desc" value="{{old('c_desc')}}" class="form-control w-50 mt-3"
        placeholder="Enter Coupon description"></textarea>
        <div class="text-danger ml-2" style="font-weight: 400; font-size: 13px;">
            @error('c_desc')
                {{$message}}                                    
            @enderror
        </div>

        <input type="text" name="c_discount" value="{{old('c_discount')}}" class="form-control w-50 mt-3"
        placeholder="Enter Coupon Discount percentage">
        <div class="text-danger ml-2" style="font-weight: 400; font-size: 13px;">
            @error('c_discount')
                {{$message}}                                    
            @enderror
        </div>

        <input type="text" name="c_max_amt" value="{{old('c_max_amt')}}" class="form-control w-50 mt-3"
        placeholder="Enter Max amount ">
        <div class="text-danger ml-2" style="font-weight: 400; font-size: 13px;">
            @error('c_max_amt')
                {{$message}}                                    
            @enderror
        </div>

        <div class="mt-3 ms-1">
            <label for="exampleInputEmail1" class="form-label">Coupon Pic:</label></div>
        <input type="file" name="c_pic" value="{{old('/images/c_pic')}}" class="form-control w-50 ">
        <div class="text-danger ml-2" style="font-weight: 400; font-size: 13px;">
            @error('c_pic')
                {{$message}}                                    
            @enderror
        </div>
            
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="status" role="switch" id="flexSwitchCheckChecked"  checked>
            <label class="form-check-label" for="flexSwitchCheckChecked"><h6 style="font-weight: 300;">Status</h6></label>
        </div>
    
        <button type="submit" class="btn btn-outline-primary mt-1">Submit</button>

    </form>

</div>
    </div>
</section>



{{-- @include('adminfooter') --}}
