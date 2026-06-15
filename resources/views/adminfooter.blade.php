</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="/vendors/js/vendor.bundle.base.js"></script>
<script src="/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="/js/off-canvas.js"></script>
<script src="/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="/js/dashboard.js"></script>
<!-- End custom js for this page-->
</body>
{{-- /////////// --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- 
@if (Session::get('success'))
<script>
Swal.fire({
    
    text: "{{ Session::get('success') }}",
    showConfirmButton: false,
    timer: 2500
});
</script>

    
@endif --}}

</html>