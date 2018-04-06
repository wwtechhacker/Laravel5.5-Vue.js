<div class="row">
    <div class="column medium-6 small-12">
        <img src="{{$imageSrc}}" alt="{{$imageAlt || ''}}">
    </div>
    <div class="column medium-6 small-12 align-self-middle">
        <div class="card">
            <div class="card-header">
                <h3>{{$title}}</h3>
            </div>
            <div class="card-section">
                @if(! empty($paragraphs))
                    @foreach($paragraphs as $content)
                        <p>
                            {{$content}}
                        </p>
                    @endforeach
                @endif
            </div>
            <div class="card-footer">
                @foreach ($buttons as $button)
                    <a href="{{$button['link']}}" class="button">{{$button['content']}}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>