@extends('layouts.site', ['bodyClass' => 'contact'])

@section ('content')
    <header>
        @include('partials.hero-sponsor', $hero)
    </header>
    <section class="localEvent">
        <div class="row">
            <div class="boxEvent column text-center small-12 medium-6 medium-push-6 align-self-middle">
                <!-- <h4 class="text-white">
                    Sponsor an upcoming event by completing the form below.
                </h4> -->
                <!-- <p class="registerText text-white disclaimer">*Availability may change</p> -->
                <img src="/images/sponsor/opportunity.png" alt="ShotsFired">
            </div>
            <div class="column small-12 medium-6 medium-pull-6">
                <img src="/images/sponsor/analytics.png" alt="ShotsFired">
            </div>
        </div>
    </section>
    <section class="formBG">
        <div class="row">
            <div class="iframe column medium-4">
                <div class="responsive-embed">
                    <iframe width="100%" height="100%" src="{{ $iframe1 }}" frameborder="0" style="margin: 0 auto;" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="iframe column medium-4">
                <div class="responsive-embed">
                    <iframe width="100%" height="100%" src="{{ $iframe2 }}" frameborder="0" style="margin: 0 auto;" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="iframe column medium-4">
                <div class="responsive-embed">
                    <iframe width="100%" height="100%" src="{{ $iframe3 }}" frameborder="0" style="margin: 0 auto;" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <!-- <a id="apply"></a>
        <day-registration options="{{json_encode($form)}}"></day-registration> -->
    </section>
@stop