@include('usernavbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{asset('style.css')}}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js" integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
</head>
<body>
    <div class="row m-5">
        <div class="col-lg-12 col-md-12">
            <div class="ltn__shop-details-inner mb-60">
                <div class="row">
                    <div class="col-md-6">
                        <div class="ltn__shop-details-img-gallery">
                            <div class="ltn__shop-details-large-img">
                                <div class="single-large-img">
                                    <a href="/furniture/{{$product->img}}" data-rel="lightcase:myCollection">
                                        <img id="proimage" src="/furniture/{{$product->img}}"  alt="Image">
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="modal-product-info shop-details-info pl-0">
                            <div class="product-ratting">
                                <ul>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                    <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                </ul>
                            </div>
                            <h3>{{$product->productname}}</h3>
                            <div class="product-price">
                                <span>₹{{$product->price}}</span>
                                <del>₹{{200}}</del>
                            </div>
                            <div class="modal-product-meta ltn__product-details-menu-1">
                                <ul>
                                    <li>
                                        <strong><b>Primary Material:</b>  {{$product->primary_material}} </strong>

                                        <span class="badge position-static bg-dark rounded-0">SAVE </span>
                                    </li>
                                    <li>
                                        <strong><b>Description:</b>  {{$product->desc}} </strong>

                                    </li>
                                    <li>
                                        <strong><b>Weight:</b>  {{$product->weight}} </strong>

                                    </li>
                                    <li>
                                        <strong><b>Dimension:</b>  {{$product->dimension}} </strong>

                                    </li>
                                    <li>
                                        <strong><b>Specification:</b>  {{$product->specification}} </strong>

                                    </li>
                                </ul>
                            </div>
                            <div class="ltn__product-details-menu-2">
                                <ul>
                                   
                                    <li>
                                        <a href="/addedtocart/{{ $product->id }}" class="theme-btn-1 btn btn-danger" title="Add to Cart">
                                            <i class="fas fa-shopping-cart"></i>
                                            <span>ADD TO CART</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="ltn__product-details-menu-3">
                                <ul>
                                    <li>
                                        
                                    </li>
                                    <li>
                                        
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            <div class="ltn__social-media">
                                <ul>
                                    <li>Share:</li>
                                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                    
                                </ul>
                            </div>
                            <hr>
                            <div class="ltn__safe-checkout">
                                <h5>Guaranteed Safe Checkout</h5>
                                <img src="/images/11.png" alt="Payment Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
       
    </div>
</div>
</body>
</html>