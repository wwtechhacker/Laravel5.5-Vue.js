{!! Form::open(['url' => '/registration/submit']) !!}
<!-- TELL US -->
<div class="form-section">
    <div class="row columns">
        <h3>{{$header}}</h3>
        @foreach($paragraphs as $content)
            <p class="lead">
                {{$content}}
            </p>
        @endforeach
    </div>
    <div class="row">
        <div class="small-12 columns">
            <label><input type="radio" name="kitType"><b>Standard(Event Booth):</b> Best for grade 3 and up</label>
        </div>
        <div class="small-12 columns">
            <label><input type="radio" name="kitType"><b>Early Childhood Education(in-classroom activity):</b> Best for preeschool to grade 2</label>
        </div>
        <div class="small-12 columns">
            <br>
            <p><b>Give us the details of your event here</b></p>
            <textarea rows="5"></textarea>
        </div>
    </div>
</div>

<div class="form-section">
    <!-- CONTACT -->
    <div class="row">
        <div class="small-12 columns">
            <h3>CONTACT INFORMATION</h3>
        </div>
        <div class="small-12 large-6 columns">
            <input type="text" name="first_name" placeholder="First Name *"/>
            <input type="text" name="last_name" placeholder="Last Name *"/>
            <input type="text" name="title" placeholder="Title *"/>
            <input type="text" name="address" placeholder="Address *"/>
            <div class="row">
                <div class="column small-6">
                    <input type="text" name="city" placeholder="City *"/>
                </div>
                <div class="column small-6">
                    <input type="text" name="zip" placeholder="Zip *"/>
                </div>
            </div>

            <label><input type="radio" name="shipping" value="ship to contact">Ship kit items here</label>
            <input id="onSite" type="checkbox"><label for="onSite">I will not be on site</label>
            <div class="hide">
                <input type="text" placeholder="Name of person who will be on site *"/>
                <input type="text" placeholder="Contact's phone number *"/>
                <input type="text" placeholder="Contact's email *"/>
            </div>
        </div>
        <div class="small-12 large-6 columns">
            <input type="text" name="organization" placeholder="Organization *"/>
            <input type="text" name="phone" placeholder="Phone Number *"/>
            <input type="text" name="email" placeholder="Email Address *"/>
            <label class="lead margin-top-2">Best Time to Contact?</label>
            <label><input name="best_contact" type="radio" value="morning">Morning</label>
            <label><input name="best_contact" type="radio" value="afternoon">Afternoon</label>
            <label><input name="best_contact" type="radio" value="night">Night</label>

        </div>
    </div>
</div>
<div class="form-section">
    <div class="row">
        <div class="small-12 columns">
            <h3>LOCATION INFORMATION</h3>
            <label><input id="eventAddress" type="checkbox">Event address same as contact address</label>
        </div>
        <div class="small-12 large-6 columns">
            <input type="text" placeholder="Event Location Name *"/>
            <input type="text" placeholder="Address *"/>
            <input type="text" placeholder="City *"/>
            <input type="text" placeholder="Zip *"/>
            <label><input name="shipping" type="radio" value="ship to location">Ship kit items here</label>
        </div>
        <div class="small-12 large-6 columns">
            <input type="text" placeholder="Estimated # of attendees *"/>
            <input type="text" disabled="disabled" placeholder="{{$date}}" value="{{$date}}"/>
            <div class="row">
                <div class="small-6 column">
                    <input type="text" class="timepicker" name="start_time" placeholder="Start Time *"/>
                </div>
                <div class="small-6 column">
                    <input type="text" class="timepicker" name="end_time" placeholder="End Time *"/>
                </div>
            </div>
            <label>Open to public?</label>
            <div class="switch large">
                <input class="switch-input" id="openToPublic" type="checkbox" name="publicSwitch">
                <label class="switch-paddle" for="openToPublic">
                    <span class="show-for-sr">Open to public?</span>
                    <span class="switch-active" aria-hidden="true">Yes</span>
                    <span class="switch-inactive" aria-hidden="true">No</span>
                </label>
            </div>
            <label>This is my first time hosting a Rev Your Bev Day event:</label>
            <div class="switch large">
                <input class="switch-input" id="first-time" type="checkbox" name="firstTimeSwitch">
                <label class="switch-paddle" for="first-time">
                    <span class="show-for-sr">This is my first time hosting a Rev Your Bev Day event</span>
                    <span class="switch-active" aria-hidden="true">Yes</span>
                    <span class="switch-inactive" aria-hidden="true">No</span>
                </label>
            </div>
        </div>
    </div>

</div>
<div class="form-section">
    <div class="row columns">
        {{Form::submit('Submit', ['class' => 'button', 'primary'])}}
    </div>
</div>
{!! Form::close() !!}
