<script>
    $(document).ready(function () {

        $('#owl-two').owlCarousel({
            dots:false,
            nav: false,
            autoWidth:false,
            stagePadding: 5,
            responsive: {
                0: {
                    items: 2,
                },
                600: {
                    items: 2,
                    margin: 1,
                },
                1000: {
                    items: 3,
                    margin: 1
                }
            }
        })

        $('#owl-one').owlCarousel({
            margin: 200,
            stagePadding: 10,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            dots: true,
            rewind:true,
            responsiveClass:true,
            items: 1
        })
    })

</script>