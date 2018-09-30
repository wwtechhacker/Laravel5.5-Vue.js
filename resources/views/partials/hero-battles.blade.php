<div class="hero-bg hero-battles">
    <div class="hero-content">
        <div class="row">
            <div class="column small-12 align-self-middle">
                <div class="card card-outline text-center">
                    <div class="row align-center">
                        <div class="column small-12  medium-10 large-7">
                            <!-- <hr> -->
                            <h1 class="text-white text-center battles">{{$header}}</h1>
                            <!-- <hr> -->
                        </div>
                    </div>
                    <div class="row align-center">
                        <div class="column small-12 medium-10 large-10">
                            <div class="card-section">
                                <p class="headline text-white">{{$title}}</p>
                                <p>
                                    {{$content}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <router-view></router-view>
</div>
