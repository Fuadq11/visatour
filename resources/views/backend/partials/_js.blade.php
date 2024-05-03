<!-- latest jquery-->
<script src="{{ asset('backend/assets/js/jquery-3.5.1.min.js') }}"></script>
<!-- Bootstrap js-->
<script src="{{ asset('backend/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<!-- feather icon js-->
<script src="{{ asset('backend/assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
<!-- scrollbar js-->
<script src="{{ asset('backend/assets/js/scrollbar/simplebar.js') }}"></script>
<script src="{{ asset('backend/assets/js/scrollbar/custom.js') }}"></script>
<!-- Sidebar jquery-->
<script src="{{ asset('backend/assets/js/config.js') }}"></script>
<!-- Plugins JS start-->
<script src="{{ asset('backend/assets/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('backend/assets/js/chart/chartist/chartist.js') }}"></script>
<script src="{{ asset('backend/assets/js/chart/chartist/chartist-plugin-tooltip.js') }}"></script>
<script src="{{ asset('backend/assets/js/chart/knob/knob.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/chart/knob/knob-chart.js') }}"></script>
<script src="{{ asset('backend/assets/js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ asset('backend/assets/js/chart/apex-chart/stock-prices.js') }}"></script>
<script src="{{ asset('backend/assets/js/notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/dashboard/default.js') }}"></script>
<script src="{{ asset('backend/assets/js/datepicker/date-picker/datepicker.js') }}"></script>
<script src="{{ asset('backend/assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
<script src="{{ asset('backend/assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
<script src="{{ asset('backend/assets/js/typeahead/handlebars.js') }}"></script>
<script src="{{ asset('backend/assets/js/typeahead/typeahead.bundle.js') }}"></script>
<script src="{{ asset('backend/assets/js/typeahead/typeahead.custom.js') }}"></script>
<script src="{{ asset('backend/assets/js/typeahead-search/handlebars.js') }}"></script>
<script src="{{ asset('backend/assets/js/typeahead-search/typeahead-custom.js') }}"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{ asset('backend/assets/js/script.js') }}"></script>
<script src="{{ asset('backend/assets/js/theme-customizer/customizer.js') }}"></script>
<!-- login js-->
<!-- Plugin used-->

<!-- Toastr-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
    @endif
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
        $(document).on('click', '.softDelete', function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success ml-1',
                    cancelButton: 'btn btn-danger mr-1'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Müvəqqəti silinsin ?',
                text: "Daha sonra zibil qutusundan geri ala BİLƏRSƏN !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Bəli, Sil !',
                cancelButtonText: 'Xeyr, Silmə !',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                    swalWithBootstrapButtons.fire(
                        'Silindi!',
                        'Uğurla Silindi',
                        'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Ləğv Edildi!',
                        'Məlumatlar Güvəndədir! ;)',
                        'error'
                    )
                }
            })
        })
    })


    $(function() {
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success ml-1',
                    cancelButton: 'btn btn-danger mr-1'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Əminsən ?',
                text: "Sildikən sonra geri QAYTARILAMAZ !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Bəli, Sil !',
                cancelButtonText: 'Xeyr, Silmə !',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                    swalWithBootstrapButtons.fire(
                        'Silindi!',
                        'Uğurla Silindi',
                        'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Ləğv Edildi!',
                        'Məlumatlar Güvəndədir! ;)',
                        'error'
                    )
                }
            })
        })
    })
</script>


<script src='{{ asset('backend/assets/js/main-tiny.js') }}'></script>
<script src="{{ asset('backend/assets/js/tiny.js') }}"></script>
