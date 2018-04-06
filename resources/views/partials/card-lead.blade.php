<div class="row align-center">
    <div class="column medium-6 small-12">
        <div class="card">
            <div class="card-header text-center">
                <h2>{{$title}}</h2>
            </div>
            <div class="card-section text-center">
                @if(! empty($paragraphs))
                    @foreach($paragraphs as $content)
                        <p class="lead">
                            {{$content}}
                        </p>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>