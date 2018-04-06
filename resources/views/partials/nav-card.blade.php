<div class="card grid-card container align-middle">
    <img class="hide" src="{{$imageSrc}}" alt="{{$imageAlt || ''}}">
    <div class="card-section text-center flex-container align-middle">
        <div class="parent">
            <h3 class="title text-white">{{$title}}</h3>
            <p>{{$content}}</p>
            @if(! empty($buttons))
                @foreach ($buttons as $button)
                    @if (! empty($button['disabled']))
                        <a href="{{$button['link']}}" disabled="disabled" class="button">{{$button['content']}} </a>
                    @else
                    <a href="{{$button['link']}}" class="button {{$class or ''}}">{{$button['content']}} <i class="fas fa-chevron-right"></i></a>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>
