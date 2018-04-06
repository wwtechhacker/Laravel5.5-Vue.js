<div class="code-wrapper">
    @if(! empty($title))
        <h3 class="style-header">
            &mdash; {{$title}}
            <small><a href="#" data-toggle class="clear margin-0">&lt;&gt;</a></small>
        </h3>
    @endif

    @if(! empty($note))
        <div class="style-note">
            {{$note}}
        </div>
    @endif

    <div class="code">

        <div class="toggle-code hide margin-bottom-2">
            <pre class="language-html code-toolbar line-numbers">
                @if(!empty($partial))
                    <code class="">{{ $partial }}</code>
                @else
                    <code class="">{{ htmlentities($slot) }}</code>
                @endif
            </pre>
        </div>

        <div class="html">
            {{$slot}}
        </div>

    </div>

</div>
