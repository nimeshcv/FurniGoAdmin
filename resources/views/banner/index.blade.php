@include('adminnavbar')
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  --}}
   <!-- //import bootstrap -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
   {{-- import fontAwesome cdn --}}

<section class="section "  >
    <div class="card" >
        <div class="card-header">
            <h2>Banners</h2>
        </div>
        <div class="card-body">
            <a href="{{route('banner.create')}}" class="btn btn-outline-primary mb-3">Add Banner</a>
        <div class="table-responsive">
        {{-- <table class="table table-striped header-expand table-bordered table-hover table-primary" id="table1"> --}}
    <table class='table table-striped table-primary table-hover col-10' id="table1">
        <thead class="table-primary text-start text-bold ">
            <tr>
                <th scope="col"><h5>Id</h5></th>
                <th scope="col"><h5>Banner Pic</h5> </th>
                <th scope="col"><h5>Status</h5></th>
                <th scope="col"><h5>Update</h5></th>
                <th scope="col"><h5>Delete</h5></th>
               
            </tr>
        </thead>
        <tbody class="text-start ">

            @foreach ($data as $banner)
                <tr>
                    <td scope="row" ><h6 style="font-weight: 300;">{{ $loop->index + 1 }}</h6></td>

                    <?php
                    $src = 'images/' . $banner->img;
                    ?>
                    @if (file_exists($src))
                    <td>
                        <img style="width: 100px; height:80px;" class="rounded border border-secondary shadow-sm" 
                             src="/images/{{ $banner->img }}" alt="">
                    {{-- </td>
                        <td><img src="images/{{ $banner->img }}" height="100" width="100" alt="">
                        </td> --}}
                    @else
                        <td><img src="images/no_availe.jpg" height="100" width="100" alt="">
                        </td>
                    @endif

                    <td>
                        @if ($banner->status == 1)
                        <h6 style="font-weight: 300;"> On </h6>
                        @else
                        <h6 style="font-weight: 300;"> Off </h6>
                        @endif
                    </td>

                    {{-- <td><a href="{{route('banner.edit',$banner->id)}}" class="btn btn-outline-warning btn-sm"><i class='fa-sharp fa-solid fa-edit'></i></a> --}}
                    </td>
                    {{-- //update text button --}}
                    <td><a href="{{route('banner.edit',$banner->id)}}" class="btn btn-outline-warning btn-sm">Edit</a>
                    </td>
                    <td>
                        <form onsubmit="confirmDelete(event)" class="d-inline" action="{{ route('banner.destroy', $banner->_id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            {{-- <i class='fa-sharp fa-solid fa-trash'></i> delete icon  --}}
                        </form>

                        {{-- <form id="delete-form-{{ $banner->id }}" action="{{ route('banner.destroy', $banner->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="confirmDelete({{ $banner->id }})">Delete</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{ $data->links() }}

    </div>
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
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
            }
        });
        </script>

{{-- 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(event) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + banner).submit();
            }
        });
    }
</script> --}}
