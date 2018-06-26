<!DOCTYPE html>
<html>
<head lang="en-US">
    @include('partials.metas')
    <link rel="icon" type="image/png" href="/images/favicon-32x32.png" sizes="32x32"/>
    <link rel="icon" type="image/png" href="/images/favicon-16x16.png" sizes="16x16"/>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    @stack('stylesheets')
    @yield('css')
    <script type="text/javascript">
        var CMS_PREFIX = 'test';
    </script>
</head>
<body class="{{$page['slug'] or 'generic'}} {{$bodyClass or ''}} brand-bg">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KLG6S7N"
        height="0" width="0" style="display:none;visibility:hidden">
    </iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

@include('partials.facebook', ['facebookId' => env('FACEBOOK_APP_ID')])

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="myApp">
    @yield('main')
</div>

<script type="text/javascript" src="{{ mix('js/manifest.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/vendor.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
@stack('scripts')
@yield('javascript')

</body>
</html>
