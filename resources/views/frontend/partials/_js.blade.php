<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-5.3.2.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.flexslider.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/custom-navigation.js') }}"></script>
<script src="{{ asset('frontend/js/custom-flex.js') }}"></script>
<script src="{{ asset('frontend/js/custom-owl.js') }}"></script>
<script src="{{ asset('frontend/js/custom-date-picker.js') }}"></script>
<script src="{{ asset('frontend/js/custom-video.js') }}"></script>
<script src="{{ asset('frontend/js/popup-ad.js') }}"></script>
<script src="{{ asset('frontend/js/preloader.js') }}"></script>

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