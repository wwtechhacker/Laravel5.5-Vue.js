<div class="style-title-bar title-bar">
    <div class="title-bar-left">
        <a href="/styleguide">
            Styleguide
        </a>
    </div>
    @if (!Breadcrumbs::exists('breadcrumb'))
    <div class="title-bar-right">
        <button class="menu-icon" type="button" data-open="offCanvasTop"></button>
    </div>
    @endif
</div>

@if (!Breadcrumbs::exists('breadcrumb'))
    <div class="style-sidebar off-canvas position-top" id="offCanvasTop" data-off-canvas data-transition="overlap">
        <div class="header text-center">
            <a class="" href="#">
                STYLEGUIDE
            </a>
        </div>
        <button class="offcanvas-full-screen-close close-button" aria-label="Close menu" type="button" data-close>
            <span aria-hidden="true"><i class="fa fa-times"></i></span>
        </button>
        <div class="column small-12">
            <ul class="offcanvas-menu menu vertical">
                @foreach($menu as $item)
                    <li class="item style-item">
                        <a href="#{{$item}}" class="">
                            {{ ucwords($item) }}
                            <i class="fa fa-chevron-right text-secondary pull-right"></i>
                        </a>
                    </li>
                @endforeach
            </ul><!-- Your menu or Off-canvas content goes here -->
        </div>
    </div>
@endif
