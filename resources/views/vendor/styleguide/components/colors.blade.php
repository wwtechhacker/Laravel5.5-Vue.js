@component('styleguide::code-head')
    colors
@endcomponent

@component('styleguide::code', [
'title' => 'brand palette',
'partial' => ''
])

    <div class="color-block">
        <div class="block bg-primary"></div>
        <div class="text-center">primary</div>
    </div>

    <div class="color-block">
        <div class="block bg-secondary"></div>
        <div class="text-center">secondary</div>
    </div>

    <div class="color-block">
        <div class="block bg-tertiary"></div>
        <div class="text-center">tertiary</div>
    </div>

@endcomponent

@component('styleguide::code', [
'title' => 'action states',
'partial' => ''
])

    <div class="color-block">
        <div class="block bg-success"></div>
        <div class="text-center">success</div>
    </div>
    <div class="color-block">
        <div class="block bg-warning"></div>
        <div class="text-center">warning</div>
    </div>
    <div class="color-block">
        <div class="block bg-alert"></div>
        <div class="text-center">alert</div>
    </div>

@endcomponent



