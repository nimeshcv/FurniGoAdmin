@include('adminnavbar')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
   <!-- //import bootstrap -->
<section class="section">
    <div class="card">
        <div class="card-header">
            <h3>Update Store Details</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('store.update', $store->_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3 w-50">
                    <input type="text" name="store_name" class="form-control" placeholder="Enter Store name" value="{{ old('store_name', $store->store_name) }}">
                    <span class="text-danger">@error('store_name') {{ $message }} @enderror</span>
                </div>

                <div class="mb-3 w-50">
                    <input type="text" name="store_mobileno" class="form-control" placeholder="Enter Store Contact No" value="{{ old('store_mobileno', $store->store_mobileno) }}">
                    <span class="text-danger">@error('store_mobileno') {{ $message }} @enderror</span>
                </div>

                <div class="mb-3 w-50">
                    <input type="file" name="store_pic" class="form-control">
                    <span class="text-danger">@error('store_pic') {{ $message }} @enderror</span>
                </div>

                <div class="mb-3 w-50">
                    <textarea name="store_address" class="form-control" placeholder="Enter Address">{{ old('store_address', $store->store_address) }}</textarea>
                    <span class="text-danger">@error('store_address') {{ $message }} @enderror</span>
                </div>

                <div class="mb-3 w-50">
                    <input type="text" name="store_pincode" class="form-control" placeholder="Enter Store Pincode" value="{{ old('store_pincode', $store->store_pincode) }}">
                    <span class="text-danger">@error('store_pincode') {{ $message }} @enderror</span>
                </div>

                <button type="submit" class="btn btn-outline-primary mt-3">Update Store</button>
            </form>
        </div>
    </div>
</section>

@include('adminfooter')
