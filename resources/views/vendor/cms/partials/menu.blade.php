<div class="top-bar">
    <div class="top-bar-left">
        <ul class="dropdown menu" data-dropdown-menu>
            <li>
                <a href="#">Pages</a>
                <ul class="menu">
                    @foreach($menu as $menuItem)
                        <li><a href="/{{ config('cms.prefix', 'cms')}}/{{$menuItem}}/edit">{{ str_replace('-', ' ', $menuItem) }}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
</div>

