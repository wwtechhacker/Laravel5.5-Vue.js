@extends('layouts.site', ['bodyClass' => 'home'])

@section ('content')
    <header>
        @include('partials.hero', $hero)
    </header>
@stop