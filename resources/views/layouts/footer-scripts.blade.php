<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<script src="{{URL::asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/plugins/ionicons/ionicons.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/moment/moment.js')}}"></script>

<!-- Rating js-->
<script src="{{URL::asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>
<script src="{{URL::asset('assets/plugins/rating/jquery.barrating.js')}}"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="{{URL::asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>
<!--Internal Sparkline js -->
<script src="{{URL::asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!-- Custom Scroll bar Js-->
<script src="{{URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- right-sidebar js -->
<script src="{{URL::asset('assets/plugins/sidebar/sidebar-rtl.js')}}"></script>
<script src="{{URL::asset('assets/plugins/sidebar/sidebar-custom.js')}}"></script>
<!-- Eva-icons js -->
<script src="{{URL::asset('assets/js/eva-icons.min.js')}}"></script>
@yield('js')
<!-- Sticky js -->
<script src="{{URL::asset('assets/js/sticky.js')}}"></script>
<!-- custom js -->
<script>
    toastr.options.progressBar = true;
    @if ($errors->any())

    @foreach ($errors->all() as $error)
    toastr.error("{{ $error }}")
    @endforeach

    @endif
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="{{URL::asset('assets/js/custom.js')}}"></script><!-- Left-menu js-->
<script src="{{URL::asset('assets/js/toastr.min.js')}}"></script><!-- Left-menu js-->
<script src="{{URL::asset('assets/plugins/side-menu/sidemenu.js')}}"></script>




