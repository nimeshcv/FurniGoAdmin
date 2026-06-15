@include('adminnavbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
   <!-- //import bootstrap -->
</head>
<body>
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
    
        @if($message=Session::get('success'))
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
            @endif
            <section class="section">
                <div class="card">
                    <div class="card-header">
                <h2>Update Product</h2>
            
                    </div>
                    <div class="card-body">
        <form method="post" action="{{route('furnitures.update',$product->_id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="productName">Product Name:</label>
                <input type="text" class="form-control" id="productName" placeholder="Enter product name" name="product_name" value="{{$product->productname}}">
                <span class="mb-3 text-danger">@error('product_name')
                {{$message}}
                @enderror</span>
            </div>
            <div class="form-group">
                <label for="productPrice">Price:</label>
                <input type="number" class="form-control" id="productPrice" placeholder="Enter product price" name="price" value="{{$product->price}}">
                <span class="mb-3 text-danger">@error('price')
                {{$message}}
                  
                @enderror</span>
            </div>
            <div class="form-group">
                <label for="productCategory">Category:</label>
                <select class="form-control" id="productCategory" name="category">
                    <option>select Category</option>
                    @foreach($category as $item)

                    
                     @if (strcmp($item->cat_name,$product->category)==0)
                        <option selected value="{{$item->cat_name}}">{{$item->cat_name}}</option>
                    @endif
                    <option value="{{$item->cat_name}}">{{$item->cat_name}}</option>
                    @endforeach
                </select>
                <span class="mb-3 text-danger">@error('category')
                    {{$message}}
               
                @enderror</span>
            </div>
            <div class="form-group">
                <label for="productDescription">Description:</label>
                <textarea class="form-control" id="productDescription" placeholder="Enter product description" name="desc">{{$product->desc}}</textarea>
                <span class="mb-3 text-danger">@error('desc')
                    {{$message}}
              
                @enderror</span>
            </div>
            <div class="form-group">
                <label for="productDescription">Primary Material:</label>
                <input type="text" class="form-control" id="productDescription" placeholder="Enter primary Material" name="primary_material" value="{{$product->primary_material}}"/>
                <span class="mb-3 text-danger">@error('primary_material')
                    {{$message}}

                @enderror</span>
            </div>
            <div class="form-group">
                <label for="productDescription">Dimension:</label>
                <input type="text" class="form-control" id="productDescription" placeholder="Enter product dimension" name="dimension" value="{{$product->dimension}}"/>
                <span class="mb-3 text-danger">@error('dimension')
                    {{$message}}

                @enderror</span>
            </div>

            <div class="form-group">
                <label for="productDescription">Weight:</label>
                <input type="text" class="form-control" id="productDescription" placeholder="Enter product weight" name="weight" value="{{$product->weight}}"/>
                <span class="mb-3 text-danger">@error('weight')
                    {{$message}}

                @enderror</span>
            </div>

            <div class="form-group">
                <label for="productDescription">Specification:</label>
                <input type="text" class="form-control" id="productDescription" placeholder="Enter product specification" name="specification" value="{{$product->specification}}"/>
                <span class="mb-3 text-danger">@error('specification')
                    {{$message}}

                @enderror</span>
            </div>
            <div class="form-group">
                <label for="productImage">Product Image1:</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="productImage" name="pic1">
                    <label class="custom-file-label" for="productImage">Choose image</label>
                </div>
            </div>
            <div class="form-group">
                <label for="productImage">Product Image2:</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="productImage" name="pic2">
                    <label class="custom-file-label" for="productImage">Choose image</label>
                </div>
            </div>
            <div class="form-group">
                <label for="productImage">Product Image3:</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="productImage" name="pic3">
                    <label class="custom-file-label" for="productImage">Choose image</label>
                </div>
            </div>
            <button type="submit" class="btn submit-btn">Submit</button>
        </form>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>