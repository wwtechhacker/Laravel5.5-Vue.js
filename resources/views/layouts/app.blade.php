<!DOCTYPE html>
<html>
<head lang="en-US">
    @include('partials.metas')
    <link rel="stylesheet" href="https://use.typekit.net/fha8kox.css">
    <script src="https://use.fontawesome.com/b9c1035ab3.js"></script>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}"/>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @stack('stylesheets')
    @yield('css')
    <script type="text/javascript">
        var CMS_PREFIX = 'test';
    </script>
</head>
<body class="{{$page['slug'] or 'generic'}} {{$bodyClass or ''}} brand-bg">

@include('partials.facebook', ['facebookId' => env('FACEBOOK_APP_ID')])

<div id="myApp">
    @yield('main')
</div>

<script type="text/javascript" src="{{ mix('js/manifest.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/vendor.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
<script>
    $(document).foundation();
</script>
@stack('scripts')
@yield('javascript')

</body>
</html>
