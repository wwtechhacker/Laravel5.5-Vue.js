@component('styleguide::code-head')
    buttons
@endcomponent

@component('styleguide::code', [
'title' => 'default',
'note' => 'Default styles'
])
<a class="button primary" href="#">Primary</a>
<a class="button secondary" href="#">Secondary</a>
<a class="button success" href="#">Success</a>
<a class="button alert" href="#">Alert</a>
<a class="button warning" href="#">Warning</a>
@endcomponent

@component('styleguide::code', ['title' => 'rounded'])
<a class="button primary rounded" href="#">Primary</a>
<a class="button secondary rounded" href="#">Secondary</a>
<a class="button success rounded" href="#">Success</a>
<a class="button alert rounded" href="#">Alert</a>
<a class="button warning rounded" href="#">Warning</a>
@endcomponent

@component('styleguide::code', ['title' => 'hollow'])
    <a class="button hollow primary " href="#">Primary</a>
    <a class="button hollow secondary " href="#">Secondary</a>
    <a class="button hollow success " href="#">Success</a>
    <a class="button hollow alert " href="#">Alert</a>
    <a class="button hollow warning " href="#">Warning</a>
@endcomponent

@component('styleguide::code', ['title' => 'clear'])
    <a class="button clear primary " href="#">Primary</a>
    <a class="button clear secondary " href="#">Secondary</a>
    <a class="button clear success " href="#">Success</a>
    <a class="button clear alert " href="#">Alert</a>
    <a class="button clear warning " href="#">Warning</a>
@endcomponent

