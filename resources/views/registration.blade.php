@extends('layouts.site', ['bodyClass' => 'registration'])

@section ('content')
    <header>
        @include('partials.hero-registration', $hero)
    </header>
    <section class="localEvent">
        <div class="row">
            <div class="boxEvent column text-center small-12 medium-6 medium-push-6 align-self-middle">
                <h4 class="text-black">
                    Register for Rethink Your Drink Day by April 22nd
                    to receive an Event-In-A-Box with everything you
                    need to host your local event.*
                </h4>
                <p class="registerText disclaimer">*while supplies last.</p>
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