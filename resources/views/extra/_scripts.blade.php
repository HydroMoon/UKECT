<!-- JS FILES -->
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('parsley/parsley.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('parsley/i18n/ar.js') }}"></script>
<script type="text/javascript" src="{{ asset('owl/owl.carousel.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/ekko-lightbox.min.js') }}"></script>

<script>
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
</script>

<script>
    $(document).ready(function () {

        

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });

        $('#shortModal').on('shown.bs.modal', function () {
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
            });
        });

        $(".lowl-car").addClass("owl-carousel").owlCarousel({
			center: true,
            items: 2,
            loop: true,
            autoplay: true,
            autoplaySpeed: 1000,
            responsive:{
                1600:{
                    items: 1
                }
            }
		});   

        $(".owl-car").addClass("owl-carousel").owlCarousel({
            center              : true,
            loop                : true,
			items				: 2,
			autoplay			: true,
            autoplaySpeed       : 1000,
			nav					: false,
			dots				: false,
            responsiveClass     : true,
            responsive          :{
                0   :{
                    items: 1
                },
                600 :{
                    items: 2
                }
            }
		});   


        $('.customer-logos').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 1300,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 1
                }
            }]
        });

        $('.media-main').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover: false,
        });

        $('body').append(
            '<div id="toTop" class="btn btn-secondary rounded-circle"><span class="fa fa-arrow-up"></span></div>'
        );
        $(window).scroll(function () {
            if ($(this).scrollTop() != 0) {
                $('#toTop').fadeIn();
            } else {
                $('#toTop').fadeOut();
            }
        });
        $('#toTop').click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
    });
</script>
@yield('scri')