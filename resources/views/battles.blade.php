@extends('layouts.site', ['bodyClass' => 'battles'])

@section ('content')
    <header>
        @include('partials.hero-battles', $hero)
    </header>
    <div id="youtubeApp">
        <youtubeApp></youtubeApp>
    </div>
@stop