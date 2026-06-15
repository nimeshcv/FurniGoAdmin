@include('adminnavbar')

{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  --}}
<!-- Import Bootstrap --> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
{{-- import fontAwesome cdn --}}

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h2>Coupon Data</h2>
            </div>
            <div class="card-body">

                <a href="{{route('coupon.create')}}" class="btn btn-outline-primary mb-3">Add Coupon</a>
                <div class="table-responsive">
                    <table class="table table-striped header-expand table-bordered table-hover table-primary" id="table1">

                        <thead class="table-primary text-start text-bold ">
                        <tr>
                            
                        <th scope="col"><h5>Id</h5></th>
                        <th scope="col"><h5>Coupon code</h5> </th>
                        <th scope="col"><h5>Coupon Pic</h5></th>
                        <th scope="col"><h5>Status</h5></th>
                        <th scope="col"><h5>Action</h5></th>

                        </tr>
                    </thead>
                    <tbody class="text-start">
                        @foreach ($data as $item)
                            <tr class="">
                                <td scope="row"><h6 style="font-weight: 300;">{{ $loop->index + 1 }}</td>
                                <td><h6 style="font-weight: 300;">{{ $item->c_code }}</h6></td>
                                <td>
                                    <img style="width: 100px; height:80px;" class="rounded border border-secondary shadow-sm"  src="/images/{{ $item->c_pic }}" alt="">
                                </td>
                                <td>
                                    @if ($item->status)
                                    <span class=""><h6 style="font-weight: 300;">On Air</h6></span>
                                    {{-- badge bg-success --}}

                                    @else
                                    <span class=""><h6 style="font-weight: 300;">Off Air</h6></span>

                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('coupon.show', $item->_id) }}" class="btn btn-outline-info">Show</a>

                                    <a href="{{ route('coupon.edit', $item->_id) }}" class="btn btn-outline-warning">Edit</a>

                                    <form onsubmit="confirmDelete(event)" class="d-inline" action="{{ route('coupon.destroy', $item->_id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

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
