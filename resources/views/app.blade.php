<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Meta Tags-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aura - Fashion, Beauty, Latest News, Trends, Arts &amp; Culture</title>
    <meta name="description"
        content="Aura brings you fashion, beauty, lifestyle, arts &amp; culture from local and foreign social scenes, culture, traditions and high-societal etiquettes." />
    <meta name="og:url" content="https://aura.com.ng" property="og:url" />
    <meta name="og:type" content="website" property="og:type" />
    <meta name="og:title" content="Aura - Fashion, Beauty, Latest News, Trends, Arts &amp; Culture"
        property="og:title" />
    <meta name="og:description"
        content="Aura brings you fashion, beauty, lifestyle, arts &amp; culture from local and foreign social scenes, culture, traditions and high-societal etiquettes."
        property="og:description" />
    <meta name="og:image" content="https://aura.com.ng/storage/logo/default.png" property="og:image" />
    <meta name="fb:app_id" content="206628533402470" property="fb:app_id" />
    <meta property="twitter:card" content="summary">
    <meta property="twitter:url" content="https://aura.com.ng">
    <meta property="twitter:title" content="Aura - Fashion, Beauty, Latest News, Trends, Arts &amp; Culture">
    <meta property="twitter:description"
        content="Aura brings you fashion, beauty, lifestyle, arts &amp; culture from local and foreign social scenes, culture, traditions and high-societal etiquettes.">
    <meta property="twitter:image" content="https://aura.com.ng/storage/logo/default.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700|PT+Serif:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/nprogress.css') }}"  />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <!-- CSS Files -->
    {{-- <link href="{{ asset('paper') }}/css/bootstrap.min.css" rel="stylesheet" /> --}}
    <link rel="stylesheet"  href="{{ asset('paper') }}/css/paper-dashboard.css?v=2.0.0" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@space-css/space-css@1.0.3/space.min.css">

    {{-- Fancy Box --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

</head>

<body>
    <div id="app">
    </div>

    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js">
  </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
 </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
</script>

    <!--   Core JS Files   -->
    <script src="{{ asset('paper') }}/js/core/jquery.min.js"></script>
    <script src="{{ asset('paper') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('paper') }}/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('paper') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Chart JS -->
    <script src="{{ asset('paper') }}/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('paper') }}/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('paper') }}/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
    {{-- Fancy Box --}}
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

</body>

</html>
