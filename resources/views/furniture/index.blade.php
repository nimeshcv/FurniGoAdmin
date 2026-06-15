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
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  --}}
<!-- Import Bootstrap --> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
{{-- import fontAwesome cdn --}}

<section class="section">
    <div class="card">
        <div class="card-header">
            <h2>Furnitures</h2>
        </div>
        <div class="card-body">
            
    <a href="{{route('furnitures.create')}}" class="btn btn-outline-primary mb-3">Add Products</a>
    <div class="table-responsive">
    <table class="table table-striped header-expand table-bordered table-hover table-primary" id="table1">
        <thead class="table-primary text-start text-bold ">
            <tr>
                <th scope="col"><h5>Sr. no.</h5></th>
                <th scope="col"><h5>Product Name</h5></th>
                <th scope="col"><h5>Price</h5></th>
                <th scope="col"><h5>Category</h5></th>
                <th scope="col"><h5>Image</h5></th>
                {{-- <th scope="col"><h5>Status</h5></th> --}}
                <th scope="col"><h5>Update</h5></th>
                <th scope="col"><h5>Delete</h5></th>
            </tr>
        </thead>
        <tbody class="text-start " >
            @foreach ($product as $c)
            <tr>
                <td scope="row"><h6 style="font-weight: 300;">{{$loop->index + 1}}</h6></td>
                <td><h6 style="font-weight: 300;">{{$c->productname}}</h6></td>

                <td><h6 style="font-weight: 300;">{{$c->price}}</h6></td>
               
                <td><h6 style="font-weight: 300;">{{$c->category}}</h6></td>

                <td><img src="{{$c->pic1}}" style="width: 100px; height:80px;" class="rounded border border-secondary shadow-sm" ></td>
                @if ($c->status)
                    <td><a href="/removebest/{{$c->id}}" class="btn btn-outline-danger me-3">Remove from best seller</a></td>
                @else
                    {{-- <td><a href="/addtobest/{{$c->id}}" class="btn btn-outline-success me-3">Add to best seller</a></td> --}}
                @endif
                <td>
                    <div class="actions">
                        <a href="{{route('furnitures.edit',$c->_id)}}" class="btn btn-outline-warning">Edit</a>
                    </div>
                </td>
                <td>
                    <div>
                        <form onsubmit="confirmDelete(event)" class="d-inline" action="{{ route('furnitures.destroy', $c->_id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button style="width: 97px" type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <div class="d-flex justify-content-end mt-3 mr-5">
        {{$product->links()}}
    </div>
        </div>
        
    </div>
    
    
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@if (Session::get('success'))
<script>

Swal.fire({
    
    icon: "success",
    title: "Success!",
    text: "{{ Session::get('success') }}",
    showConfirmButton: false,
    timer: 2500
  });
</script>

    
@endif


<script>
    function confirmDelete(event) {
        event.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.submit(); // Submit the form after confirmation
            }
        });
    }
</script>



<script src="/assets/vendors/simple-datatables/simple-datatables.js"></script>
<script>
//     // Simple Datatable
//     let table1 = document.querySelector('#table1');
//     let dataTable = new simpleDatatables.DataTable(table1);
// </script>

     @include('adminfooter')
   

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