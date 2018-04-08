<template>
    <div class="registration-container">
        <form data-abide novalidate id="registrationForm" method="post" action="/registration/submit'">
            <!-- TELL US -->

            <div class="row columns">
                <div id="form-message" class="margin-bottom-2 alert callout hide"></div>
                <div id="form-alert" data-abide-error class="margin-bottom-2 alert callout" style="display: none;">
                    <p><i class="fi-alert"></i> <span class="message">There are some errors in your form.</span></p>
                </div>
            </div>
            <div class="form-section section-one" v-if="isActive(1)">
                <div class="row columns generalTitle text-center">
                    <h3>{{cms.sections[0].header}}</h3>
                    <div class="row">
                        <div class="medium-12 column">
                            <h4 class="lead intro" v-for="value in cms.sections[0].paragraphs">
                                <b>
                                    {{ value }}
                                </b>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="row align-center">
                    <div class="small-12 medium-8 columns">
                        <fieldset>
                            <legend class="text-white">Do you want to battle, be a vendor, or sponor the next event? *</legend>
                            <label>
                                <select name="kit_select" id="kit_select" v-model="kitSelect" required>
                                    <option value=""></option>
                                    <option value="Battle">Battle</option>
                                    <option value="Vendor">Vendor</option>
                                    <option value="Sponsor">Sponsor</option>
                                </select>
                            </label>
                            <div v-show="enableKit('battle')">
                                <label class="text-white" v-for = "type in battleTypes">
                                    <input type="radio" name="kit_type" v-model="data.kit_type" :value="type" required><span>{{type}}</span>
                                </label>
                            </div>
                            <div v-show="enableKit('vendor')">
                                <label v-for = "type in vendorTypes">
                                    <input type="radio" name="kit_type" v-model="data.kit_type" :value="type" required><span>{{type}}</span>
                                </label>
                            </div>
                            <div v-show="enableKit('sponsor')">
                                <label v-for = "type in sponsorTypes">
                                    <input type="radio" name="kit_type" v-model="data.kit_type" :value="type" required><span>{{type}}</span>
                                </label>
                            </div>
                        </fieldset>

                        <label class="font-bold text-white">
                            Where did you hear about this event opportunity?
                            <input type="text" v-model="data.how_heard_about" required/>
                        </label>

                        <div class="text-left">
                            <button type="submit" class="primary submit button margin-top-2">
                                <span class="show-for-small-only">Next</span>
                                <span class="hide-for-small-only">Next: {{cms.sections[1].header}}</span>
                                <i class="fas fa-angle-right margin-left-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-section section-two" v-if="isActive(2)">
                <div class="row align-center">
                    <div class="small-12 medium-8 columns">
                        <div class="formHeader">
                            <h4 class="">{{cms.sections[1].header}}</h4>
                        </div>
                        <input type="text" v-model="data.location_name" placeholder="Event Location Name *" required/>
                        <input type="text" v-model="data.location_address" placeholder="Event Address *" required/>
                        <input type="text" v-model="data.location_city" placeholder="Event City *" required/>
                        <input type="text" v-model="data.location_zip" placeholder="Event Zip *" pattern="zip" required/>
                        <input type="number" v-model="data.number_of_attendees" placeholder="Estimated # of attendees *" pattern="integer" required/>
                        <datepicker input-class="vue-datepicker" placeholder="Date of Event" v-model="data.date" required format="MMMM d, yyyy"></datepicker>
                        <!--<input type="text" v-model="data.date" v-bind:value="cms.date"/>-->
                        <div class="row">
                            <div class="small-6 column">
                                <input type="text" class="timepicker" v-model="data.start_time" id="start_time" placeholder="Start Time *" required/>
                            </div>
                            <div class="small-6 column">
                                <input type="text" class="timepicker" v-model="data.end_time" id="end_time" placeholder="End Time *" required/>
                            </div>
                        </div>
                        <label class="" for="event-details"></label>
                        <textarea
                                placeholder="Please tell us more about your event. For example, is it part of a larger event in your community? Are you partnering with anyone else?"
                                v-model="data.event_details" rows="5" id="event-details"></textarea>
                        <label>Event open to the public?</label>
                        <div class="switch large">
                            <input class="switch-input" id="open_to_public" type="checkbox" v-model="data.open_to_public">
                            <label class="switch-paddle" for="open_to_public">
                                <span class="show-for-sr">Open to public?</span>
                                <span class="switch-active" aria-hidden="true">Yes</span>
                                <span class="switch-inactive" aria-hidden="true">No</span>
                            </label>
                        </div>
                        <div class="margin-top-2">
                            <button type="button" class="primary button back" v-on:click="goBack()">
                                <i class="fas fa-angle-left"></i>
                            </button>
                            <button type="submit" class="primary button submit">
                                <span class="show-for-small-only">Next</span>
                                <span class="hide-for-small-only">Next: {{cms.sections[2].header}}</span>
                                <i class="fas fa-angle-right margin-left-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-section section-three" v-if="isActive(3)">
                <!-- CONTACT -->
                <div class="row">
                    <div class="small-12 formHeader columns">
                        <h4 class="">{{cms.sections[2].header}}</h4>
                        <label>
                            <input v-model="data.location_same_as_contact" type="checkbox">Contact address same as event address
                        </label>
                    </div>
                    <div class="small-12 large-6 columns">
                        <input type="text" v-model="data.primary_first_name" placeholder="First Name *" required/>
                        <input type="text" v-model="data.primary_last_name" placeholder="Last Name *" required/>
                        <select v-model="data.primary_title" id="primary_title">
                            <option value="" disabled="disabled">Title (Mr./Mrs./Ms./Dr.)</option>
                            <option value="mr">Mr.</option>
                            <option value="mrs">Mrs.</option>
                            <option value="ms">Ms.</option>
                            <option value="dr">Dr.</option>
                        </select>
                        <input type="text" v-model="data.primary_address" placeholder="Address *" required/>
                        <div class="row">
                            <div class="column small-6">
                                <input type="text" v-model="data.primary_city" placeholder="City *" required/>
                            </div>
                            <div class="column small-6">
                                <input type="text" v-model="data.primary_zip" placeholder="Zip *" pattern="zip" required/>
                            </div>
                        </div>

                        <label>
                            <input id="onSite" v-model="data.someone_else_on_site" v-on:click="showSiteContact = !showSiteContact" type="checkbox">I will not be on site
                        </label>
                        <div v-bind:class="{hide: !showSiteContact}">
                            <input type="text" v-model="data.site_contact_name" placeholder="Name of person who will be on site *" v-bind:disabled="!showSiteContact" required/>
                            <input type="tel" v-model="data.site_contact_phone" placeholder="Contact's phone number *" v-bind:disabled="!showSiteContact" data-phone-formatter
                                   autocomplete="off" required/>
                            <input type="email" v-model="data.site_contact_email" pattern="email" placeholder="Contact's email *" v-bind:disabled="!showSiteContact" required/>
                        </div>

                        <fieldset>
                            <legend>Ship kit items to:</legend>
                            <div class="callout outline">
                                <label>
                                    <input v-model="data.kit_shipping" id="shipLocationAddress" name="kit_shipping" type="radio" value="location address" required>
                                    Contact Address (above)
                                </label>
                            </div>

                            <div class="callout outline margin-top-1">
                                <label>
                                    <input id="shipContactAddress" v-model="data.kit_shipping" name="kit_shipping" type="radio" value="contact address" required>
                                    <pre>{{ locationAddress()}}</pre>
                                </label>
                            </div>
                        </fieldset>

                    </div>
                    <div class="small-12 large-6 columns">
                        <input type="text" v-model="data.organization_name" placeholder="Organization Name *" required/>
                        <input type="tel" v-model="data.primary_phone" placeholder="Phone Number *" data-phone-formatter required/>
                        <input type="email" v-model="data.primary_email" pattern="email" autocomplete="email" placeholder="Email Address *" required/>
                        <input type="text" v-model="data.facebook" placeholder="Facebook Page"/>
                        <input type="text" v-model="data.twitter" placeholder="Twitter Handle"/>
                        <label class="font-bold margin-top-2">Best Time to Contact?</label>
                        <label><input v-model="data.best_contact_method" name="best_contact_method" type="radio" value="morning" required>Morning</label>
                        <label><input v-model="data.best_contact_method" name="best_contact_method" type="radio" value="afternoon" required>Afternoon</label>
                        <label><input v-model="data.best_contact_method" name="best_contact_method" type="radio" value="night" required>Night</label>
                    </div>
                </div>
                <div class="row column">

                    <div class="margin-top-2">

                        <button type="button" class="primary button back" v-on:click="goBack()">
                            <i class="fas fa-angle-left"></i>
                        </button>
                        <button type="submit" class="primary button submit">
                            Submit
                        </button>
                    </div>

                </div>
            </div>

        </form>
        <div class="row column small-12" v-if="formComplete">
            <div class="form-complete margin-vertical-3" >
                <div class="callout success" data-closable="slide-out-right">
                    <h4 class=""><i class="fas fa-check-circle margin-right-1"></i> Thank you for registering!</h4>
                    <p>You should receive an email within the next two business days to notify you of the status of your Event-In-A-Box order, and provide you with important dates to remember as you prepare to host your event.</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    var vue,
        dirty          = false,
        Moment         = require('moment'),
        PhoneFormatter = require('../phone-formatter'),
        gtmEvents      = require('../gtm-events'),
        ScrollTo       = require('../scroll-to');

    import Datepicker from 'vuejs-datepicker';

    function handleWarning(e) {
        var confirmationMessage         = ' ';  // a space
        (e || window.event).returnValue = confirmationMessage;
        return confirmationMessage;
    }

    function reloadWarning() {
        var myEvent  = window.attachEvent || window.addEventListener,
            chkevent = window.attachEvent ? 'onbeforeunload' : 'beforeunload'; /// make IE7, IE8 compatable

        myEvent(chkevent, handleWarning);
    }

    function removeReloadWarning() {
        var myEvent  = window.detachEvent || window.removeEventListener,
            chkevent = window.detachEvent ? 'onbeforeunload' : 'beforeunload'; /// make IE7, IE8 compatable

        myEvent(chkevent, handleWarning);
    }

    function validateForm() {
        $('#registrationForm').off('submit').on('submit', function () {
            event.preventDefault();
        });
        $(document).off('formvalid.zf.abide').on("formvalid.zf.abide", function (ev, el) {

            vue.currentSection++;

            // if (vue.currentSection === 2) {
            //     gtmEvents.log('form', 'click', 'registration-1-eventlocalinformation');
            // }
            // if (vue.currentSection === 3) {
            //     gtmEvents.log('form', 'click', 'registration-2-contactinformation');
            // }

            if (vue.currentSection > vue.formSections) {
                // gtmEvents.log('form', 'click', 'registration-3-submission');
                if (vue.data.date) {
                    vue.data.date = Moment(new Date(vue.data.date)).format('MMMM D, YYYY');
                }
                $.post('/register', {formData: vue.data}).then(function (response) {
                    // @todo setup mailchimp form
                    mailchimpRequest({
                        EMAIL: vue.data.primary_email,
                        FNAME: vue.data.primary_first_name,
                        LNAME: vue.data.primary_last_name,
                        PHONE: vue.data.primary_phone,
                        ZIP  : vue.data.primary_zip,
                    });
                    removeReloadWarning();
                    setTimeout(function () {
                        vue.formComplete = true;
                    }, 1000);
                }, function (response) {
                });
                return;
            }
            vue.$nextTick(function () {
                ScrollTo('#apply', {time: 1000, offset: -100});
                Foundation.reInit('abide');
            });

        });

        $(document).off('forminvalid.zf.abide').on("forminvalid.zf.abide", function (ev, el) {
            ScrollTo('#form-alert', {time: 1000, offset: -100});
        });
    }

    function bindTimepicker() {

        $('.timepicker').timepicker();
        $('.timepicker').off('changeTime').on('changeTime', function () {
            vue.data[this.id] = $(this).val();
        });

    }

    function mailchimpRequest(data) {
        var url = 'https://rescueagency.us9.list-manage.com/subscribe/post-json?u=cf08e6aa3d7ef4ad33c4e0a9d&amp;id=8d90d82829';

        $.ajax({
            url     : url,
            dataType: 'jsonp',
            jsonp   : 'c',
            data    : data
        }).then(function (response) {
            if (response.result && response.result === 'error') {
                // do nothing
                return;
            }
            // do nothing

        }, function (response) {
            // do nothing

        });
    }


    export default {
        name      : "registration",
        props     : [
            'options'
        ],
        components: {
            Datepicker
        },
        data() {
            vue        = this;
            var fields = [
                'how_heard_about',
                'event_details',
                'kit_type',
                'primary_first_name',
                'primary_last_name',
                'primary_title',
                'primary_address',
                'primary_city',
                'primary_zip',
                'primary_phone',
                'primary_email',
                'kit_shipping',
                'site_contact_name',
                'site_contact_phone',
                'site_contact_email',
                'organization_name',
                'best_contact_method',
                'location_name',
                'location_address',
                'location_city',
                'location_zip',
                'date',
                'start_time',
                'end_time',
                'open_to_public',
                'first_time_host',
                'someone_else_on_site',
                'location_same_as_contact'
            ];


            var data = {};
            _.forEach(fields, function (value) {
                data[value] = '';
            });


            var cms = JSON.parse(vue.options);

            data.date = cms.date || '';
            data.open_to_public = data.open_to_public === '' ? 1 : 0;

            return {
                battleTypes      : [
                    'Novice',
                    'Intermediate',
                    'Pro',
                ],
                vendorTypes      : [
                    'Food',
                    'Merchandise',
                    'Other'
                ],
                sponsorTypes      : [
                    'Bronze',
                    'Silver',
                    'Gold',
                    'Other'
                ],
                cms           : cms,
                data          : data,
                kitSelect     : '',
                siteContact   : false,
                formSections  : 3,
                currentSection: 1,
                formComplete  : false
            };

        },
        mounted() {
            bindTimepicker();
            validateForm();
        },
        watch     : {
            'data.location_same_as_contact': 'matchContactAddress',
            currentSection                 : 'changeSection',
            kitSelect                      : function () {

            },
            data                           : {
                handler: 'dataChange',
                deep   : true,
            }
        },
        methods   : {
            goBack             : function () {
                vue.currentSection--;
                vue.$nextTick(function () {
                    ScrollTo('#apply', {time: 1000, offset: -100});
                    Foundation.reInit('abide');
                    $('#form-alert').hide();
                });
            },
            changeSection      : function () {
                vue.$nextTick(function () {
                    bindTimepicker();
                    PhoneFormatter('[data-phone-formatter]');
                });
            },
            enableKit          : function (type) {
                return this.kitSelect.toLowerCase() === type;
            },
            locationAddress    : function () {
                return [vue.data.location_address, vue.data.location_city, vue.data.location_zip].join('\n');
            },
            contactAddress     : function () {
                return [vue.data.primary_address, vue.data.primary_city, vue.data.primary_zip].join('\n');
            },
            isActive           : function (number) {
                return vue.currentSection === number;
            },
            dataChange         : function (val, oldVal) {
                if (!dirty) {
                    reloadWarning();
                    dirty = true;
                }
            },
            showNotOnSiteFields: function () {

            },
            matchContactAddress: function () {
                var map = {
                    primary_address: 'location_address',
                    primary_city   : 'location_city',
                    primary_zip    : 'location_zip'
                };

                _.each(map, function (value, key) {
                    vue.data[key] = vue.data.location_same_as_contact ? vue.data[value] : '';
                });

            }

        }
    };
</script>

<style scoped>

</style>

