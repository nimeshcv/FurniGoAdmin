@include('usernavbar')
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

<div class="container m-5" >
    <h1>Order History</h1>

    <hr>
    <table class="table table-bordered ">
        <thead>
            <tr>
                <th scope="col">Order No</th>
                <th scope="col">Username</th>
                <th scope="col">Product</th>
    
                <th scope="col">Payment Type</th>
                <th scope="col">Order Date</th>
    
                <th scope="col">Quantity</th>
    
    
                <th scope="col">Total amount</th>
    
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->orderid }}</th>
                    <td>
                        @if ($user->id == $item->uid)
                            {{ $user->username }}
                        @endif
    
                    </td>
                <td class="text-center">
                    <img src="furniture/{{$item->img}}" class="rounded_circle" style="height: 100px;width: 100px;">
    
                        @foreach ($product as $p)
                            @if ($p->id == $item->pid)
                            <br>
                                <p>{{ $p->productname }}</p>
                            @break
                        @endif
                    @endforeach
                </td>
                <td>
                    @if ($item->paymenttype)
                        Online
                    @else
                        COD
                    @endif
                </td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->quantity }}</td>
    
                <td>{{ $item->totalamt }}</td>
            </tr>
        @endforeach
    
    </tbody>
    </table>

</div>

@include('footer')
