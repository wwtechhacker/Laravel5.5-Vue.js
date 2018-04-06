@extends('layouts.site', ['bodyClass' => 'home'])

@section ('content')
    <header>
        @include('partials.hero', $hero)
    </header>
    <section class="ga-what-is-rethink">
        <div class="row">
            <div class="columns text-center large-8 medium-10 small-12 medium-centered">
                <h3 data-scroll-target="find-a-local-event">Shots Fired <span class="text-nowrap">Battle Rap League</span></h3>
                <p class="lead">
                Shots Fired has established itself as the leading San Diego rap battle platform, and has even reached out to other communities in Orange County, Inland Empire, Los Angeles, Fresno and San Jose.
                </p>
                <!-- <p class="lead">
                    On the same day, local organizations have the ability to execute this event to
                    promote healthy living across the entire state of California.
                </p> -->
            </div>
        </div>
    </section>
    <section class="localEvent ga-find-local-event">
        <map-render></map-render>
    </section>
    <section class="cards">
        <div class="row small-up-1 large-up-3 nav-cards">
            @foreach($navCards as $cards)
                <div class="column">
                    @include('partials.nav-card', $cards)
                </div>
            @endforeach
        </div>
    </section>
    <hr class="bottom">
@stop