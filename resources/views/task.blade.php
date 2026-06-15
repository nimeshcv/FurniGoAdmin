@include('adminnavbar')
  <style>
    table td {
        word-wrap: break-word;         /* All browsers since IE 5.5+ */
        overflow-wrap: break-word;     /* Renamed property in CSS3 draft spec */
    }
    .table td p {
        text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
        max-width: 150px; /* Adjust max-width as needed */
    }
    .table td .actions {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
</style>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h2>Orders</h2>
        </div>
            <div class="table-responsive">
                
                <table class="table table-striped header-expand table-bordered table-hover table-primary" id="table1">
<thead class="table-primary text-start text-bold ">
        <tr>
            <th scope="col"><h5>Order No</h5> </th>
            <th scope="col"><h5>Username</h5></th>
            <th scope="col"><h5>Product</h5></th>

            <th scope="col"><h5>Payment Type</h5> </th>
            <th scope="col"><h5>Order Date</h5> </th>

            <th scope="col"><h5>Quantity</h5></th>


            <th scope="col"><h5>Total amount</h5> </th>
            <th scope="col"><h5>Status</h5></th>

        </tr>
    </thead>
    <tbody class="text-start ">
        @foreach ($task as $item)
            <tr>
                <th scope="row" class="font-weight-lighter">{{ $item->_id }}</th>
                <td class="text-start"><h6 style="font-weight: 300;">
                  @foreach ($user as $u)
                    @if ($u->id == $item->uid)
                        {{ $u->username }}
                    @endif
                @endforeach
                </h6>                        
                </td>
            <td class="text-center"><img src="{{$item->pic1}}" style="width: 100px; height:80px;" class="rounded border border-secondary shadow-sm" >

                    @foreach ($product as $p)
                        @if ($p->id == $item->pid)
                        <br>
                            <p class="mt-1">{{ $p->productname }}</p>
                        @break
                    @endif
                @endforeach
            </td>
            <td><h6 style="font-weight: 300;">
                {{$item->c_o}}
                </h6>
            </td>
            <td><h6 style="font-weight: 300;">{{ $item->created_at }}</h6></td>
            <td><h6 style="font-weight: 300;">{{ $item->qty }}</h6></td>

            <td><h6 style="font-weight: 300;">{{ $item->tot_amount }}</h6></td>
            <td><h6><a href="/status/{{$item->_id}}">
                @if ($item->status==1)
                    Received
                    
                @elseif ($item->status==2)
                Dispathed
                @elseif ($item->status==3)
                Shipping
                @elseif ($item->status==4)
                Out for Delivery
                @else
                Delivered
                    
                @endif</a></h6></td>
        </tr>
    @endforeach

</tbody>
</table>
            </div>
        
    </div>
    

   
       
      {{$task->links()}}
</section>
</body>


<script>
    $(document).ready(function() {
        if ($('#table1').length) {
            $('#table1').DataTable({
                "lengthChange": false,
                "paging":false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        }
    });
    </script>