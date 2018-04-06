<div class="hero-bg">
    <div class="image-wrapper bg-white">
        {!! $image !!}
        <div class="image-overlay"></div>
    </div>
    <div class="hero-content">
        <div class="row">
            <div class="column small-12 medium-6 align-self-middle">
                <div class="card card-outline text-left text-uppercase">
                    <div class="card-section text-white">
                        <h1 class="text-white headline">{!! $title !!}</h1>
                        <hr>
                        <p>
                            {!! $content !!}
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="{{$link}}" class="button secondary">{{$cta}}</a>
                    </div>
                </div>
            </div>
            <div class="column small-12 medium-6 align-self-middle">
                @if(! empty($imageSrc))
                    <img src="{{$imageSrc}}" alt="{{$imageAlt}}">
                @endif
            </div>
        </div>
    </div>
</div>
