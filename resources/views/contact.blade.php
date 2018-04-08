@extends('layouts.site', ['bodyClass' => 'contact'])

@section ('content')
    <header>
        @include('partials.hero-contact', $hero)
    </header>
    <section class="localEvent">
        <div class="row">
            <div class="boxEvent column text-center small-12 medium-6 medium-push-6 align-self-middle">
                <h4 class="text-black">
                    Battle, sponsor, or become a vendor for our upcoming events by completing the form below.
                </h4>
                <p class="registerText disclaimer">*Availability may change</p>
            </div>
            <div class="column small-12 medium-6 medium-pull-6">
                <img src="/images/hero-registration-box.png" alt="Event In A Box">
            </div>

        </div>
    </section>
    <section class="formBG">
        <a id="apply"></a>
        <day-registration options="{{json_encode($form)}}"></day-registration>
    </section>
@stop