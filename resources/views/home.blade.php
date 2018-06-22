@extends('layouts.site', ['bodyClass' => 'home'])

@section ('content')
    <header>
        @include('partials.hero', $hero)
    </header>
    <section class="ga-what-is-rethink">
        <div class="row">
            <div class="columns text-center large-8 medium-10 small-12 medium-centered">
                <h3 class="what-is" data-scroll-target="find-a-local-event">Shots Fired <br>Battle Rap League</h3>
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

    <section>
    <div id="social-media">
            <div class="row align-middle small-collapse large-uncollapse">
                <div class="column text-center small-12 medium-6">
                    <div class="fb-page" data-href="https://www.facebook.com/ShotsFiredRap/" data-tabs="timeline" 
                        data-width="500" data-height="500" 
                        data-small-header="false" data-adapt-container-width="true" 
                        data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/ShotsFiredRap/" class="fb-xfbml-parse-ignore">
                            <a href="https://www.facebook.com/ShotsFiredRap/">Shots Fired</a>
                        </blockquote>
                    </div>
                </div>
                <div class="column text-center small-12 medium-6">
                    <a class="twitter-timeline" 
                        href="https://twitter.com/ShotsFiredRap?ref_src=twsrc%5Etfw"  
                        data-width="500"
                        data-height="500">Tweets by ShotsFiredRap
                    </a> 
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
        </div>
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