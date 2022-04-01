<!DOCTYPE html>
<html lang="en">

	<head>

		@yield('title')

		<!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/main-home-page/img/favicon.ico')}}">

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('public/main-home-page/css/bootstrap.min.css')}}">
    <!-- Icon Font -->
    <link rel="stylesheet" href="{{ asset('public/main-home-page/css/et-line.css')}}">
    <!-- Plugins css file -->
    <link rel="stylesheet" href="{{ asset('public/main-home-page/css/plugins.css')}}">
    <!-- Main style -->
    <link rel="stylesheet" href="{{ asset('public/main-home-page/style.css')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('public/main-home-page/css/responsive.css')}}">
    <!-- Modernizr JS -->
    <script src="{{ asset('public/main-home-page/js/vendor/modernizr.min.js')}}"></script>

    <!-- Google Tag Manager --
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5JCTSSF');
    </script>
    !-- End Google Tag Manager -->

</head>

<body>

    <!-- Google Tag Manager (noscript) --
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5JCTSSF" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    !-- End Google Tag Manager (noscript) -->

		  @include('partials.navbar-one')

		  @yield('content')
		  
		  @include('partials.footer-one')


    <!-- Placed JS at the end of the document so the pages load faster -->
    <!-- jQuery latest version -->
    <script src="{{ asset('public/main-home-page/js/vendor/jquery.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('public/main-home-page/js/plugins.js')}}"></script>

    <!-- Main js -->
    <script src="{{ asset('public/main-home-page/js/main.js')}}"></script>
</body>
</html>