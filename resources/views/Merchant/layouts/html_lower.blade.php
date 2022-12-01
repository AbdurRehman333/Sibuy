

    </div>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>

    
<!-- Required vendors -->
    <script src="{{asset('vendor/global/global.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>

    {{-- I COMMENTED MIN.JS, BECAUSE I WANTED TO EDIT IT... AS I COULD'T SO I INCLUDED ITS SIMPLE VERSION 
    CUSTOM.JS AND EDITTED IT... IT WAS FOR CHAT PURPOSE. --}}
    {{-- <script src="{{asset('js/custom.min.js')}}"></script> --}}
    <script src="{{asset('js/custom.js')}}"></script>

    <script src="{{asset('js/deznav-init.js')}}"></script>
    <script src="{{asset('vendor/owl-carousel/owl.carousel.js')}}"></script>

    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.min.js" integrity="sha512-i5xofbBta9oP3xclkdj0jO68kXE1tPeN8Jf3rwzsbwNrpFVifjhklWi8zMOOUscuMQaCPyIXl0TMWFjGwBaJxw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script>
        toastr.success("ALL SET");
    </script> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify@3.1.0/dist/tagify.polyfills.min.js"></script>
    <script>
      // The DOM element you wish to replace with Tagify
  var input = document.querySelector('input[name=tags]');
  
  // initialize Tagify on the above input node reference
  new Tagify(input)
    </script> --}}

    {{-- <script src="{{asset('assets/vendor/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
	<script src="{{asset('assets/js/plugins-init/sparkline-init.js')}}"></script> --}}


   

    <!-- Chart piety plugin files -->
    <script src="{{asset('vendor/peity/jquery.peity.min.js')}}"></script>

    <!-- Apex Chart -->
    <script src="{{asset('vendor/apexchart/apexchart.js')}}"></script>

    <!-- Dashboard 1 -->
    <script src="{{asset('js/dashboard/dashboard-1.js')}}"></script>

    @yield('scripts')
    <script>
        function carouselReview() {
            /*  testimonial one function by = owl.carousel.js */
            jQuery('.testimonial-one').owlCarousel({
                loop: true,
                autoplay: true,
                margin: 30,
                nav: false,
                dots: false,
                left: true,
                navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    484: {
                        items: 2
                    },
                    882: {
                        items: 3
                    },
                    1200: {
                        items: 2
                    },

                    1540: {
                        items: 3
                    },
                    1740: {
                        items: 4
                    }
                }
            })
        }
        jQuery(window).on('load', function() {
            setTimeout(function() {
                carouselReview();
            }, 1000);
        });
    </script>
</body>

</html>