@component('styleguide::code-head')
    cards
@endcomponent

@component('styleguide::code', [
    'title' => 'basic',
    'note' => '',
])
    <div class="card">
        <div class="card-header">
            <h3>Hosting a Rev Your Bev Day Event</h3>
        </div>
        <div class="card-section">
            <p>
                Hosting your Rev Your Bev Day event is easy! You will receive a detailed event guide that will have all the information you need to host an impactful event.
            </p>
            <p>
                In exchange for receiving a free event-in-a box kit, all we ask if that you turn in at least 5 photos of your event, return the surveys collected at your event
                (events for youth in grades 3 and up), and complete the post-event evaluation survey.
            </p>
        </div>

    </div>

@endcomponent

@component('styleguide::code', [
    'title' => 'percent',
    'note' => "@include('partials.card-percent', [
        'value' => 37,
        'paragraphs' => [
            'content here'
        ]
    )"
])

    <div class="row medium-up-3">

        <div class="column">
            @include('partials.card-percent', [
        'value' => 37,
        'paragraphs' => [
        'of all respondents consumed at least one sugary drink a day during the past week.'
        ]
        ])
        </div>
        <div class="column">
            @include('partials.card-percent', [
        'value' => 37,
        'paragraphs' => [
        'of all respondents consumed at least one sugary drink a day during the past week.'
        ]
        ])
        </div>
        <div class="column">
            @include('partials.card-percent', [
         'value' => 37,
         'paragraphs' => [
         'of all respondents consumed at least one sugary drink a day during the past week.'
         ]
         ])
        </div>
    </div>

@endcomponent

@component('styleguide::code', [
    'title' => 'cta',
    'note' => '',
])
    <div class="card">
        <div class="card-header">
            <h3>WHY SUGARY DRINKS?</h3>
        </div>
        <div class="card-section">
            <p>
                There is A LOT of sugar hiding in popular drinks. And the way they are being consumed right now is hurting our health. And it’s not just soda — sugary drinks
                include sports drinks, fruit drinks, energy drinks, and sweet tea.
            </p>
            <p>
                Over time, too much liquid sugar can lead to serious health problems, like heart disease, tooth decay, liver disease, and diabetes. Head over to The Issues to see
                if the beverages you drink may add up to harmful health consequences for you or your loved ones.
            </p>
        </div>
        <div class="card-footer">
            <a href="" class="button">Healthy Alternatives</a>
        </div>
    </div>

@endcomponent

@component('styleguide::code', [
    'title' => 'grid',
    'note' => '',
])

    <div class="row medium-up-3">

        @foreach(range(1,3) as $index)
            <div class="column">
                <div class="card grid-card">
                    <img src="http://via.placeholder.com/350x150" alt="">
                    <div class="card-section text-center">
                        <h5>NEW DIGITAL EXPERIENCE</h5>
                        <p>
                            Replace this section with new digital experience supplemental text.
                        </p>
                    </div>
                    <div class="card-footer text-center align-center">
                        <a href="" class="button">Start</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endcomponent

@component('styleguide::code', [
    'title' => 'media',
    'note' => '',
])
    <div class="row">
        <div class="column medium-6">
            <img src="http://via.placeholder.com/688x688" alt="">
        </div>
        <div class="column medium-6 align-self-middle">
            <div class="card">
                <div class="card-header">
                    <h3>WHY SUGARY DRINKS?</h3>
                </div>
                <div class="card-section">
                    <p>
                        There is A LOT of sugar hiding in popular drinks. And the way they are being consumed right now is hurting our health. And it’s not just soda — sugary
                        drinks
                        include sports drinks, fruit drinks, energy drinks, and sweet tea.
                    </p>
                    <p>
                        Over time, too much liquid sugar can lead to serious health problems, like heart disease, tooth decay, liver disease, and diabetes. Head over to The Issues
                        to see
                        if the beverages you drink may add up to harmful health consequences for you or your loved ones.
                    </p>
                </div>
                <div class="card-footer">
                    <a href="" class="button">Healthy Alternatives</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="column medium-6 align-self-middle">
            <div class="card">
                <div class="card-header">
                    <h3>WHY SUGARY DRINKS?</h3>
                </div>
                <div class="card-section">
                    <p>
                        There is A LOT of sugar hiding in popular drinks. And the way they are being consumed right now is hurting our health. And it’s not just soda — sugary
                        drinks
                        include sports drinks, fruit drinks, energy drinks, and sweet tea.
                    </p>
                    <p>
                        Over time, too much liquid sugar can lead to serious health problems, like heart disease, tooth decay, liver disease, and diabetes. Head over to The Issues
                        to see
                        if the beverages you drink may add up to harmful health consequences for you or your loved ones.
                    </p>
                </div>
                <div class="card-footer">
                    <a href="" class="button">Healthy Alternatives</a>
                </div>
            </div>
        </div>
        <div class="column medium-6">
            <img src="http://via.placeholder.com/688x688" alt="">
        </div>

    </div>

@endcomponent






