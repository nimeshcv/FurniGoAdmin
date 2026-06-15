@include('adminnavbar')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
   <!-- //import bootstrap -->
<section class="section">
    <div class="card">
        <div class="card-header">
    <h3> Coupon Details </h3>


        </div>
        <div class="card-body">
            <img src="/images/{{$coupon->c_pic}}" height="200" width="400"/>
            <table class="mt-3">
                <tr>
                    <td><label for="">Coupon Code:</label></td>
                    <td><h6 class="ms-2">{{$coupon->c_code}}</h6></td>
                </tr>
                <tr>
                    <td><label for="">Description:</label></td>
                    <td><h6 class="ms-2">{{$coupon->c_desc}}</h6></td>
                </tr>
                <tr>
                    <td><label for="">Discount :</label></td>
                    <td><h6 class="ms-2">{{$coupon->c_discount}}</h6></td>
                </tr>
                <tr>
                    <td><label for="">Max Amount:</label></td>
                    <td><h6 class="ms-2">{{$coupon->c_max_amt}}</h6></td>
                </tr>
                </div>
                <p></p>
                <p></p>
                <p></p>
            </table>
            

            <a href="/coupon" class="btn btn-outline-primary">Back</a>
        </div>
    </div>

</section>

@include('adminfooter')