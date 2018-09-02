@extends('layouts.site', ['bodyClass' => 'battles'])

@section ('content')
    <header>
        @include('partials.hero-battles', $hero)
    </header>
    <!-- <section class="videos">
        <div class="row">
            <div class="columns text-center large-10 medium-10 small-12 medium-centered large-centered">
                <!-- Should use a seperated module 
                <div class="orbit" role="region" aria-label="retailers" data-orbit>
                    <div class="orbit-wrapper">
                        <div class="orbit-controls">
                            <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
                            <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
                        </div>
                        <ul class="orbit-container">
                            <li class="orbit-slide is-active">
                                <div class="slide-content responsive-embed">
                                    <iframe  class="full-video" src="https://www.youtube.com/embed/I4ysphwrigw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                            </li>
                            <li class="orbit-slide">
                                <div class="slide-content responsive-embed">
                                    <iframe class="full-video" src="https://www.youtube.com/embed/RVCFDpQagU0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                            </li>
                            <li class="orbit-slide">
                                <div class="slide-content responsive-embed">
                                    <iframe  class="full-video" src="https://www.youtube.com/embed/j979oIx8v54" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                            </li>

                            <li class="orbit-slide">
                                <div class="slide-content responsive-embed">
                                    <iframe  class="full-video" src="https://www.youtube.com/embed/PhODNdvxL4g" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                            </li>
                            <li class="orbit-slide">
                                <div class="slide-content responsive-embed">
                                    <iframe  class="full-video" src="https://www.youtube.com/embed/hRoCHKOZOQE" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                            </li>
                            <li class="orbit-slide">
                                <div class="slide-content responsive-embed">
                                    <iframe  class="full-video" src="https://www.youtube.com/embed/2tOu2m_Iqgo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                            </li>
                            <li class="orbit-slide">
                                <div class="slide-content responsive-embed">
                                    <iframe  class="full-video" src="https://www.youtube.com/embed/ZmMq49irBwY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <youtube-videos></youtube-videos>
@stop