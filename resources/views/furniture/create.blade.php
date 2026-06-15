@include('adminnavbar')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
   <!-- //import bootstrap -->
   
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
            font-weight: bold;
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
</head>
<body>
    <section class="section">
        <div class="card">
            <div class="card-header">
        <h2>Add new Product</h2>
    
            </div>
            <div class="card-body">
        <form method="post" action="{{route('furnitures.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="productName">Product Name:</label>
                <input type="text" class="form-control" id="productName" placeholder="Enter product name" value="{{old('product_name')}}" name="product_name">
                <span class="mb-3 text-danger">@error('product_name')
                    {{$message}}
                    @enderror</span>
            </div>
            <div class="form-group">
                <label for="productPrice">Price:</label>
                <input type="number" class="form-control" id="productPrice" placeholder="Enter product price" value="{{old('price')}}" name="price">
                <span class="mb-3 text-danger">@error('price')
                {{$message}}
                  
                @enderror</span>
            </div>
            <div class="form-group">
                <label for="productCategory">Category:</label>
                <select class="form-control" id="productCategory"  name="category">
                    <option value="{{old('category')}}">Select Category</option>
                    @foreach($data as $item)
                    <option value="{{$item->cat_name}}">{{$item->cat_name}}</option>
                    @endforeach
                </select>
                <span class="mb-3 text-danger">@error('category')
                    {{$message}}
               
                @enderror</span>
            </div>
            <div class="form-group">
                <label for="productDescription">Description:</label>
                <input type="text" class="form-control" id="productDescription" placeholder="Enter product description" value="{{old('desc')}}" name="desc"></textarea>
                <span class="mb-3 text-danger">@error('desc')
                    {{$message}}

                @enderror</span>
            </div>
            <div class="form-group">
                <label for="productDescription">Primary Material:</label>
                <input type="text" class="form-control" id="productDescription" placeholder="Enter primary Material" value="{{old('primary_material')}}" name="primary_material"/>
                <span class="mb-3 text-danger">@error('primary_material')
                    {{$message}}

                @enderror</span>
            </div>
            <div class="form-group">
                <label for="productDescription">Dimension:</label>
                <input type="text" class="form-control" id="productDescription" placeholder="Enter product dimension" value="{{old('dimension')}}" name="dimension"/>
                <span class="mb-3 text-danger">@error('dimension')
                    {{$message}}

                @enderror</span>
            </div>

            <div class="form-group">
                <label for="productDescription">Weight:</label>
                <input type="text" class="form-control" id="productDescription" placeholder="Enter product weight" value="{{old('weight')}}" name="weight"/>
                <span class="mb-3 text-danger">@error('weight')
                    {{$message}}

                @enderror</span>
            </div>

            <div class="form-group">
                <label for="productDescription">Specification:</label>
                <input type="text" class="form-control" id="productDescription" placeholder="Enter product specification" value="{{old('specification')}}" name="specification"/>
                <span class="mb-3 text-danger">@error('specification')
                    {{$message}}

                @enderror</span>
            </div>


            <div class="form-group">
                <label for="productImage">Product Image1:</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="productImage" value="{{old('pic1')}}" name="pic1">
                    <label class="custom-file-label" for="productImage">Choose image</label>
                </div>
                <span class="mb-3 text-danger">@error('pic1')
                    {{$message}}

                @enderror</span>
            </div>
            <div class="form-group">
                <label for="productImage">Product Image2:</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="productImage" value="{{old('pic2')}}" name="pic2">
                    <label class="custom-file-label" for="productImage">Choose image</label>
                </div>
                <span class="mb-3 text-danger">@error('pic2')
                    {{$message}}

                @enderror</span>
            </div>
            <div class="form-group">
                <label for="productImage">Product Image3:</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="productImage" value="{{old('pic3')}}" name="pic3">
                    <label class="custom-file-label" for="productImage">Choose image</label>
                </div>
                <span class="mb-3 text-danger">@error('pic3')
                    {{$message}}

                @enderror</span>
            </div>
            <button type="submit" class="btn submit-btn">Submit</button>
        </form>
    </div>
</section>
    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>