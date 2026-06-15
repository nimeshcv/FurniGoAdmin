@include('adminnavbar')
<style>
    /* Custom Styles */
    body {
        background-color: #f4f4f4;
    }
    .container {
        background-color: #fff;
        padding: 30px;
        border-radius: 5px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        margin-top: 0%;
    }
    h1 {
        color: #333;
    }
    .form-group {
        margin-bottom: 20px;
    }
    label {
        /* font-weight: bold; */
    }
    input[type="text"], input[type="number"], select, textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }
    textarea {
        height: 150px;
    }
    .custom-file-label {
        overflow: hidden;
        white-space: nowrap;
    }
    .custom-file-input {
        cursor: pointer;
    }
    .submit-btn {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .submit-btn:hover {
        background-color: #0056b3;
    }
</style>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h3>Add Store</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('store.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3 w-50">
                    <label class="" style="font-size: 15px; margin-bottom: -20px;" for="storeName">Store name:</label>
                    <input type="text" name="store_name" class="form-control" placeholder="Enter Store name" value="{{ old('store_name') }}">
                    <span class="text-danger">@error('store_name') {{ $message }} @enderror</span>
                </div>

                <div class="mb-3 w-50">
                    <label class="" style="font-size: 15px; margin-bottom: -20px;" for="storeName">Mobile no:</label>
                    <input type="text" name="store_mobileno" class="form-control" placeholder="Enter Store Contact No" value="{{ old('store_mobileno') }}">
                    <span class="text-danger">@error('store_mobileno') {{ $message }} @enderror</span>
                </div>

                <div class="mb-3 w-50">
                    <label class="" style="font-size: 15px; margin-bottom: -20px;" for="storeName">Store image:</label>
                    <input type="file" name="store_pic" class="form-control">
                    <span class="text-danger">@error('store_pic') {{ $message }} @enderror</span>
                </div>

                <div class="mb-3 w-50">
                    <label class="" style="font-size: 15px; margin-bottom: -20px;" for="storeName">Store Address:</label>
                    <textarea name="store_address" class="form-control" placeholder="Enter Address">{{ old('store_address') }}</textarea>
                    <span class="text-danger">@error('store_address') {{ $message }} @enderror</span>
                </div>

                <div class="mb-3 w-50">
                    <label class="" style="font-size: 15px; margin-bottom: -20px;" for="storeName">Store Pincode:</label>
                    <input type="text" name="store_pincode" class="form-control" placeholder="Enter Store Pincode" value="{{ old('store_pincode') }}">
                    <span class="text-danger">@error('store_pincode') {{ $message }} @enderror</span>
                </div>

                <button type="submit" class="btn btn-outline-primary mt-3">Add Store</button>
            </form>
        </div>
    </div>
</section>

@include('adminfooter')
