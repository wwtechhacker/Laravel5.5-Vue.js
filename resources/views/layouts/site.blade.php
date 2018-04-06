@extends('layouts.base')

@section('main')
    <div class="fixed-header bg-primary">
        @include('partials.menu')
    </div>
    <div class="content">
        @yield('content')
    </div>

    @include('partials.footer')

@stop

