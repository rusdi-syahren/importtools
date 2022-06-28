<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Klinisia Symptom Engine" />
    <link rel="stylesheet" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/css/all.css" />
    <link rel="icon" href="/images/cropped-ic-192x192.png">
   

    <link rel="stylesheet" href="/css/select2.min.css">
    <link rel="stylesheet" href="/css/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="/css/icheck-bootstrap.min.css">
    <title>Klinisia</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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


    <div class="preloader" style="display:none">
        <div class="loading">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>


    <script src="/js/jquery-3.6.0.min.js"></script>

    <script src="/js/bootstrap.min.js">
    </script>

    <script src="/js/moment.min.js"></script>
    <script src="/js/select2.full.min.js"></script>
    
</body>

</html>
