@include('adminnavbar')
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"> --}}

<section class="section">
    <div class="card">
        <div class="card-header">
            <h2>Store Data</h2>
        </div>
        <div class="card-body">
            <a href="{{route('store.create')}}" class="btn btn-outline-primary mb-3">Add Store</a>
            <div class="table-responsive">
                <table class="table table-striped header-expand  table-hover table-primary" id="table1">
                <thead class="table-primary text-start text-bold ">
                    <tr>
                        <th scope="col"><h5>Id</h5></th>
                        <th scope="col"><h5>Store Name</h5></th>
                        <th scope="col"><h5>Store Pic</h5></th>
                        <th scope="col"><h5>Mobile no</h5></th>
                        <th scope="col"><h5>Pincode</h5></th>
                        <th scope="col"><h5>Update</h5></th>
                        <th scope="col"><h5>Delete</h5></th>
                    </tr>
                </thead>
                <tbody class="text-start " >
                @foreach ($data as $item)
                        <tr class="">
                            <td scope="row"><h6>{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</h6></td>
                            <td><h6 style="font-weight: 300;">{{ $item->store_name }}</h6></td>
                            <td>
                                <img style="width: 100px; height:80px;" class="rounded border border-secondary shadow-sm" src="/images/{{ $item->store_pic }}" alt="">
                            </td>
                            <td><h6 style="font-weight: 300;">{{ $item->store_mobileno }}</h6></td>
                            <td><h6 style="font-weight: 300;">{{ $item->store_pincode }}</h6></td>


                            <td>
                                <a href="{{ route('store.edit', $item->_id) }}" class="btn btn-outline-warning">Edit</a></td>
                                <td>

                                <form onsubmit="confirmDelete(event)" class="d-inline " action="{{ route('store.destroy', $item->_id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="d-flex justify-content-end mt-3 mr-5">
                {{$data->links()}}
            </div>
            
        </div>

    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- @if ($msg = Session::get('success'))
<script>
  Swal.fire({
    icon: 'success',
    title: 'Success!',
    text: '{{ $msg }}',
    showConfirmButton: false,
    timer: 2000
  });
</script>
@endif --}}


@include('adminfooter')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
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

<script>
$(document).ready(function() {
    if ($('#table1').length) {
        $('#table1').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    }
});
</script>



   
