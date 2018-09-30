@extends('layouts.site', ['bodyClass' => 'battles'])

@section ('content')
    <header>
        @include('partials.hero-battles', $hero)
    </header>
    <router-view></router-view>
@stop