@extends('layouts.site', ['bodyClass' => 'battles'])

@section ('content')
    <header>
        @include('partials.hero-battles', $hero)
    </header>
    <section class="videos">
    <h2 class="text-center">Belly of the Beast IV</h2>
        <div class="row">
            <div class="column small-12 videoWrapper">
            <!-- @foreach($navCards as $cards)
                <div class="column">
                    @include('partials.nav-card', $cards)
                </div>
            @endforeach -->
            <iframe width="100%" height="auto" src="https://www.youtube.com/embed/RVCFDpQagU0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <!-- <iframe width="100%" height="350" src="https://www.youtube.com/embed/I4ysphwrigw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/j979oIx8v54" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/PhODNdvxL4g" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/hRoCHKOZOQE" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/2tOu2m_Iqgo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/ZmMq49irBwY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> -->
        </div>
    </section>
@stop