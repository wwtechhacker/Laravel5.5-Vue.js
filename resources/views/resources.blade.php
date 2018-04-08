@extends('layouts.site', ['bodyClass' => 'resources'])

@section ('content')
    <header>
        @include('partials.hero-resources', $hero)
    </header>
    <section>
    <h2 class="text-center">Coming Soon</h2>
        <div class="row small-up-1 medium-up-3">
            @foreach($navCards as $cards)
                <div class="column">
                    @include('partials.nav-card', $cards)
                </div>
            @endforeach
        </div>
    </section>
@stop