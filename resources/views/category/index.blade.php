@include('adminnavbar')

{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  --}}
<!-- Import Bootstrap --> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
{{-- import fontAwesome cdn --}}


<section class="section">
    <div class="card">
        <div class="card-header">
            <h2>Categories</h2>
        </div>
        <div class="card-body">

            <a href="{{route('category.create')}}" class="btn btn-outline-primary mb-3">Add Category</a>

            <div class="table-responsive">
                
            <table class="table table-striped header-expand table-bordered table-hover table-primary" id="table1">

                <thead class="table-primary text-start text-bold ">
                {{-- <thead class="table-dark "> --}}
                    <tr>
                        <th scope="col"><h5>Id</h5></th>
                        <th scope="col"><h5>Category Name</h5> </th>
                        <th scope="col"><h5>Category Pic</h5></th>
                        <th scope="col"><h5>Update</h5></th>
                        <th scope="col"><h5>Delete</h5></th>
                        
                    </tr>
                </thead>
                <tbody class="text-start " >
                    @foreach ($data as $item)
                        <tr class="">
                            <td><h6 style="font-weight: 300;">{{ $loop->index + 1 }}</h6></td>
                            <td ><h6 style="font-weight: 300;">{{ $item->cat_name }}</h6></td>
                            <td>
                                <img style="width: 100px; height:80px;" class="rounded border border-secondary shadow-sm" 
                                     src="/images/{{ $item->cat_pic }}" alt="">
                            </td>
                            
                            <td>
                                {{-- <a href="{{ route('category.edit', $item->_id) }}" class="btn btn-light"><i class='fa-sharp fa-solid fa-edit'></i></a> --}}
                                {{-- <a  href="{{ route('category.edit', $item->_id) }}" class="btn btn-outline-warning btn-sm"><i class='fa-sharp fa-solid fa-edit'></i></a> --}}
                                <a href="{{ route('category.edit', $item->_id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                            </td> 
                            <td>   

                                <form onsubmit="confirmDelete(event)" class="d-inline" action="{{ route('category.destroy', $item->_id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    {{-- <a type="submit" class="btn btn-outline-danger btn-sm"><i class='fa-sharp fa-solid fa-trash'></i></a> --}}
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            </div>
            <div class="d-flex justify-content-end mt-3">
                {{ $data->links() }}
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
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>

    @include('adminfooter')
   
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