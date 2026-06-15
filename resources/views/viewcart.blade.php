@include('usernavbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Add your custom styles here */
        .cart-item {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
        }

        .cart-item img {
            max-width: auto;
            max-height: 300px;
            margin-right: 20px;
        }

        .total {
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
        }

        .checkout-btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            margin-top: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    @if($message = Session::get('success'))
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div> 
    @endif
    <div class="container mt-5">
        <h2>Your Cart</h2>
        <div class="row">
            <div class="col-md-7">
                <div class="cart-item">
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($carts as $item)
                        @php
                            $total += $item->totalamt;
                        @endphp

                        <div class="row mt-3">
                            @foreach($product as $p)
                                @if($p->id == $item->pid)
                                    @break
                                @endif
                            @endforeach
                            <div class="col-6">
                                <img src="/furniture/{{$p->img}}" alt="Product 1">
                            </div>
                            <div class="col-6 mt-5">
                                <h4>{{$p->productname}}</h4>
                                <p>Description: {{$p->desc}}</p>
                                <p>Price: {{$p->price}}</p>
                                <div class="col">
                                    <a class="btn btn-warning" href="/update/{{$item->id}}/minus">-</a>
                                    <a href="#" class="btn btn-light">{{$item->quantity}}</a>
                                    <a class="btn btn-warning" href="/update/{{$item->id}}/plus">+</a>
                                </div>
                                <h6 class="text-danger">Total Amt: {{$item->totalamt}}</h6>
                                <a href="/cart/{{$item->id}}/delete" class="btn btn-danger">Remove</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-3 ms-5">
                <div class="total">
                    <h2 class="text-center">Personal Information</h2><hr>
                    @foreach ($user as $u)
                        <h5>Billed to: {{$u->username}}</h5>
                        <h5>Address: {{$u->address}}</h5>
                        <h5>City: {{$u->city}}</h5>
                        <h5>Mob.No: {{$u->phone}}</h5><hr>
                        <h4>Total: {{$total}}</h4>
                    @endforeach
                </div>
                <form id="payment-form" action="/cart/done" method="POST">
                    @csrf
                    <div class="form-check">
                        <input class="form-check-input" value="1" checked type="radio" name="payment" id="onlinePayment">
                        <label class="form-check-label" for="onlinePayment">
                          Online Payment
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="0" type="radio" name="payment" id="cod">
                        <label class="form-check-label" for="cod">
                          Cash On Delivery
                        </label>
                    </div>
                    <br>
                    <p class="text-danger fs-5">NOTE: For all delivery 50 ₹ extra delivery charges applied.</p>
                    <button class="btn btn-primary" type="submit" id="checkout-button">Checkout</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Popper.js and jQuery are required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

    <!-- Razorpay JS -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.getElementById('payment-form').addEventListener('submit', function(event) {
            var paymentMethod = document.querySelector('input[name="payment"]:checked').value;
            if (paymentMethod === '1') {
                event.preventDefault();
                var options = {
                    "key": "rzp_test_CYHZca8SbaXkXL",
                    "amount": "{{($total + 50) * 100}}",
                    "currency": "INR",
                    "name": "FUSION STUDIO",
                    "description": "Description of the payment",
                    "image": "https://your-company-logo-url.com/logo.png",
                    "prefill": {
                        "name": "Your Name",
                        "email": "you@example.com"
                    },
                    "theme": {
                        "color": "#F37254"
                    },
                    "handler": function (response){
                        var form = document.getElementById('payment-form');
                        form.appendChild(document.createElement('input')).setAttribute('type', 'hidden');
                        form.appendChild(document.createElement('input')).setAttribute('name', 'razorpay_payment_id');
                        form.appendChild(document.createElement('input')).setAttribute('value', response.razorpay_payment_id);
                        form.submit();
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
        });
    </script>
</body>
</html>
