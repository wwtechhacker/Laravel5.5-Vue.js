<ul class="menu vertical page-menu">
    @foreach($menu as $key => $name)
        <li class="item">
            <a class="button hollow tertiary text-primary" href="/{{ config('cms.prefix', 'cms')}}/{{$key}}/edit">
                {{$name}}
                <i class="fa fa-chevron-right pull-right text-secondary"></i>
            </a>
        </li>
    @endforeach
</ul>