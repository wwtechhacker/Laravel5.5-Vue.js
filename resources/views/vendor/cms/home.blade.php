@extends('cms::site')

@section('main')
    <section>
        <div class="row column small-12 medium-10">
            @include('cms::partials.home-menu', ['menu' => $menu])
        </div>
    </section>
@stop
