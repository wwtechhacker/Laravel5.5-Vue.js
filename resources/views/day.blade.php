@extends('layouts.site', ['bodyClass' => ''])

@section ('content')
    <header>
        @if ($prototype)
            @include('partials.hero-day', array_merge($hero, ['image' => '<object class="wave-3" data="/images/heros/waves3.svg" type="image/svg+xml"></object>']))

        @else
            @include('partials.hero-day', array_merge($hero, ['image' => '<img class="water-3" src="/images/heros/water3.png" alt="water background"/>']))
        @endif
    </header>
    <section>
        <div class="text-center">
            @include('partials.card-lead', [
            'title' => 'WHAT IS REV YOUR BEV DAY?',
                'paragraphs' => [
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
                ],
            ])
            <div class="margin-top-4">
                <div class="carousel-wrapper">
                    <day-carousel></day-carousel>
                </div>
            </div>
        </div>
    </section>
    <section class="text-center">
        <h3>WHAT WE'VE LEARNED</h3>
        <div class="row small-up-1 medium-up-3 margin-top-5">
            <div class="column">
                @include('partials.card-percent', [
                  'value' => 37,
                  'paragraphs' => [
                    'of all respondents consumed at least one sugary drink a day during the past week.'
                  ]])
            </div>
            <div class="column">
                @include('partials.card-percent', [
                  'value' => 37,
                  'paragraphs' => [
                    'of all respondents consumed at least one sugary drink a day during the past week.'
                  ]])
            </div>
            <div class="column">
                @include('partials.card-percent', [
                  'value' => 37,
                  'paragraphs' => [
                    'of all respondents consumed at least one sugary drink a day during the past week.'
                  ]])
            </div>
        </div>

    </section>

    <img src="/images/water1.png" class="width-100" alt="">
    <section class="bg-tertiary">
    </section>
@stop