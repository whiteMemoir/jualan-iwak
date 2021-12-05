@php
    $setting = new \App\Setting();

    $no_wa = $setting::no_wa();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lautanikan.com - Website Jualan Hasil Laut</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--owl carousel css link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="{!! asset('assets/css/style.css?v=1.2') !!}">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
    @yield('css')
    <style>
        .cart-items {
            background-color: #2d3e57;
            border-radius: 50%;
            position: absolute;
            width: 20px;
            font-size: 10px;
            padding: 10px 0px;
            text-align: center;
            right: 10px;
            top: 0;
            font-weight: bold;
            color: white;
            line-height: 0.5px;
        }
    </style>
</head>
<body>
    @include('includes.nav')
    <div class="body-flex">
        <div class="main-container">
            <header>
                <div class="banner">
                    <div class="banner-bg" style="font-family: Lobster, sans-serif; font-size: 20px; color: #fff;">Lautanikan.com</div>
                    <div class="bot-div">
                        <div class="bottom-blue"></div>
                        @yield('carousel')
                    </div>
                </div>
            </header>
            @yield('content')

        </div>
    </div>
    @yield('payment-method')
    @yield('footer')


    <!--jquery cdn link-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <!--owl carousel js link-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    @yield('owl')
    <script type="text/javascript">
        const BASE_URL = `{{ url('') }}`;
        const NO_WA = `{{ $no_wa }}`;
        var total_items = 0;
        var getTotalItem = function() {

            let total = 0;
            Object.keys(sessionStorage).forEach((key) => {
                if(key != 'total') {
                    let val = sessionStorage.getItem(key);
                    let item = val.split(',');

                    total += parseInt(item[3]);
                }
            });

            // set total keranjang
            sessionStorage.setItem('total', total);

            session_total = sessionStorage.getItem('total');
            if(session_total != null) {
                total_items = session_total;
            }

            $('.cart-items').text(total_items)
        }

        getTotalItem();

        var formatRupiah = function(nilai) {
            let	reverse = nilai.toString().split('').reverse().join(''),
            result 	= reverse.match(/\d{1,3}/g);
            result	= result.join('.').split('').reverse().join('');

            return result;
        }
    </script>
    @yield('scripts')
</body>
</html>
