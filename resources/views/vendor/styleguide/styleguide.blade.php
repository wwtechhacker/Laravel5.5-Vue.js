<!DOCTYPE html>
<html>
<head lang="en-US">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>@yield('page_title', config('styleguide.title'))</title>
    @foreach (config('styleguide.stylesheets') as $stylesheet)
        <link rel="stylesheet" href="{{ $stylesheet }}">
    @endforeach
    <link rel="stylesheet" href="{{ styleguide_assets('css/styleguide.css') }}">
    @stack('stylesheets')
    @yield('css')
    <style type="text/css">
        .style-sidebar a {
            color : black;
        }
        .style-header a {
            color: black;
        }
        h3.style-header {
            color: #333;
        }
        .style-sidebar {
            height: 50%;
        }
    </style>
</head>
<body class="{{$page['slug'] or 'generic'}} {{$bodyClass or ''}}">

@include('styleguide::partials.menu')

@yield('content')

@foreach (config('styleguide.scripts') as $scripts)
    <script type="text/javascript" src="{{ $scripts }}"></script>
@endforeach
<script type="text/javascript" src="{{ styleguide_assets('js/styleguide.js') }}"></script>
@stack('scripts')
@yield('javascript')
<script>
    $(document).foundation();
</script>

</body>
</html>

