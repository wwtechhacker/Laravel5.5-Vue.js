<div class="card card-percent">
    <div class="card-header margin-bottom-1">
        <h3 class="percent-headline h1">
            {{$value}}
            <small class="">%</small>
        </h3>
    </div>
    <div class="card-section text-center">
        @foreach($paragraphs as $content)
            <p class="lead">
                {{$content}}
            </p>
        @endforeach
    </div>
</div>