@component('styleguide::code-head')
    typography
@endcomponent

@component('styleguide::code', [
'title' => 'fonts'
])

    <hr>
    <div style="font-family: 'proxima-nova'">
        <ul class="no-bullet">
            <li><strong>Proxima Nova Regular</strong></li>
            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus fringilla magna massa, nec finibus purus consectetur at. Aenean laoreet, dolor sed euismod
                molestie.
            </li>
        </ul>
        <ul class="no-bullet">
            <li><strong>Proxima Nova Bold</strong></li>
            <li style="font-weight: bolder">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus fringilla magna massa, nec finibus purus consectetur at. Aenean laoreet, dolor
                sed euismod
                molestie.
            </li>
        </ul>
        <ul class="no-bullet" style="font-family: 'proxima-nova-extrabold'">
            <li><strong>Proxima Nova Extrabold</strong></li>
            <li style="font-weight: bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus fringilla magna massa, nec finibus purus consectetur at. Aenean laoreet,
                dolor
                sed euismod
                molestie.
            </li>
        </ul>
    </div>
    <hr>

    <div style="font-family: 'League Gothic'; font-size: 30px" class="text-uppercase">
        <ul class="no-bullet">
            <li><strong>League Gothic</strong></li>
            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus fringilla magna massa, nec finibus purus consectetur at. Aenean laoreet, dolor sed euismod
                molestie.
            </li>
        </ul>
        <ul class="no-bullet">
            <li><strong>League Gothic Bold</strong></li>
            <li class="font-bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus fringilla magna massa, nec finibus purus consectetur at. Aenean laoreet, dolor
                sed euismod
                molestie.
            </li>
        </ul>
    </div>
    <hr>
@endcomponent

@component('styleguide::code', [
'title' => 'paragraphs',
'note' => ''
])
    <p>Font family: <strong>Proxima Nova</strong></p>

    <p>
        Even though opioids are prescribed by a doctor, using them in any way other than prescribed, even occasionally, is dangerous. The way prescription opioids affect your brain
        is the same as heroin, making them both dangerous and highly addictive. In fact, addiction rates skyrocket after just 4 days of use.
    </p>

    <p class="lead">
        Opioids are found in some prescription medications used to mask pain. This highly addictive drug is also found on the black market in various forms.
    </p>

    <p class="lead text-secondary">
        Explore the many names and forms of this drug through the interactive family tree.
    </p>

@endcomponent

@component('styleguide::code', [
'title' => 'headers',
'note' => ''
])

    <h1>h1. Proxima Nova Extra Bold</h1>
    <h2>h2. League Gothic.</h2>
    <h3>h3. League Gothic.</h3>
    <h4>h4. Proxima Nova.</h4>
    <h5>h5. League Gothic.</h5>
    <h6>h6. League Gothic.</h6>

@endcomponent

@component('styleguide::code', [
'title' => 'header small segments',
'note' => ''
])
    <h1>h1.
        <small>With some small text</small>
    </h1>
    <h2>h2.
        <small>With some small text</small>
    </h2>
    <h3>h3.
        <small>With some small text</small>
    </h3>
    <h4>h4.
        <small>With some small text</small>
    </h4>
    <h5>h5.
        <small>With some small text</small>
    </h5>
    <h6>h6.
        <small>With some small text</small>
    </h6>

@endcomponent


@component('styleguide::code', [
'title' => 'percent headline',
'note' => ''
])
    <h3 class="percent-headline h1">
        37
        <small class="">%</small>
    </h3>


@endcomponent





