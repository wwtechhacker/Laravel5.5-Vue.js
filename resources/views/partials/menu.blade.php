<div class="title-bar" data-hide-for="medium" data-analytics-category="main">
    <div class="title-bar-left">
        <div class="logo">
            <a class="ga-logo" href="/" data-analytics-click data-analytics-label="Shots Fired Logo">
                <img src="/images/blank.png" data-interchange="[{{ asset('images/shotsFired_logoText.png') }}, small], [{{ asset('/images/shotsFired_logoText.png') }}, medium]" alt="site logo">
            </a>
        </div>
    </div>
    <div class="title-bar-right">
        <button type="button" id="hamburger" data-toggler=".open" class="show-for-small-only clear button" data-toggle="hamburger mobileMenu">
            <span></span>
            <span></span>
            <span></span>
        </button>
        {{--<button class="menu-icon" type="button" data-toggle></button>--}}
        <ul class="hide-for-small-only menu">
            @foreach($menu as $item)
                <li class="{{ $item['active'] ? 'active' : '' }}">
                    <a href="{{$item['url']}}" data-analytics-click data-analytics-label="{{$item['name']}}">{{$item['name']}}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<div class="top-bar" id="mobileMenu" data-toggler=".open">
    <ul class="dropdown menu vertical medium-horizontal ">
        @foreach($menu as $item)
            <li class="{{ $item['active'] ? 'active' : '' }}">
                <a href="{{$item['url']}}" data-analytics-click data-analytics-label="{{$item['name']}}">{{$item['name']}}</a>
            </li>
        @endforeach
    </ul>
</div>
