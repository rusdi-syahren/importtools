<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Klinisia Symptom Engine" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/bs-stepper.min.css" />
    <link rel="icon" href="/images/cropped-ic-192x192.png">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.css"
        integrity="sha512-SZgE3m1he0aEF3tIxxnz/3mXu/u/wlMNxQSnE0Cni9j/O8Gs+TjM9tm1NX34nRQ7GiLwUEzwuE3Wv2FLz2667w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="/css/select2.min.css">
    <link rel="stylesheet" href="/css/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="/css/icheck-bootstrap.min.css">
    <title>Klinisia</title>
</head>

<style>
    .bg-dark {
        background-color: #2272c9 !important;
    }

    .slider.slider-horizontal {
        width: 100%;
    }

</style>

<style type="text/css">
    .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: #fff;
    }

    .loading {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        font: 14px arial;
    }

</style>

<body class="d-flex flex-column min-vh-100 bg-light">
    @include('partials.navbar')

    <div class="container flex-grow-1 flex-shrink-0 py-5">
        <div class="mb-5 p-4 bg-white shadow-sm">
            @yield('container')
        </div>
    </div>


    <div class="preloader">
        <div class="loading">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="/js/bs-stepper.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.js"
        integrity="sha512-tCkLWlSXiiMsUaDl5+8bqwpGXXh0zZsgzX6pB9IQCZH+8iwXRYfcCpdxl/owoM6U4ap7QZDW4kw7djQUiQ4G2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="/js/moment.min.js"></script>
    <script src="/js/select2.full.min.js"></script>
    <script>
        var slider = new Slider("#ex6");
        slider.on("slide", function(sliderValue) {
            document.getElementById("ex6SliderVal").textContent = sliderValue;
        });
        $(function() {
            $('.select2').select2()
        });
        $(document).ready(function() {
            $(".preloader").fadeOut("slow");
        });
    </script>
</body>

</html>
