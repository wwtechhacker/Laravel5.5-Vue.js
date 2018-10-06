@extends('layouts.site', ['bodyClass' => 'battles'])

@section ('content')
    <header>
        @include('partials.hero-battles', $hero)
    </header>
    <battles></battles>
@stop