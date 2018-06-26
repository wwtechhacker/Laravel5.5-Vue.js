/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');
var gaEvents      = require('./ga-events.js'),
    facebookShare = require('./facebook-share.js'),
    ScrollTo = require('./scroll-to'),
    analytics     = require('./analytics.js');

window.RSCG   = {};
window.jQuery = require('jquery');
window.$      = window.jQuery;
window.Vue    = require('vue');
require('svg.js');
Vue.config.silent = true;
Vue.component('day-carousel', require('./components/DayCarousel.vue'));
Vue.component('day-registration', require('./components/Registration.vue'));
Vue.component('marker-create', require('./components/MarkerCreate.vue'));
Vue.component('map-render', require('./components/Map.vue'));
Vue.component('table-render', require('./components/Table.vue'));
Vue.component('registration-table', require('./components/RegistationTable.vue'));
Vue.component('model-form', require('./components/ModelForm.vue'));

require('foundation-sites');
require('lodash');
// require('../../../node_modules/jquery-timepicker/jquery.timepicker');
require('timepicker');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#myApp'
});

// Required for laravel ajax calls
function ajaxCsrfSetup() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

function bindImageInterchange() {
}

function foundationInit() {
    Foundation.Abide.defaults.patterns['zip']          = /^\d{5}(-\d{4})?$/;
    Foundation.Abide.defaults.validators['min_length'] = function ($el, required, parent) {
        if (!required) return true;
        var minLength = $el.attr('data-min-length') || 1,
            length    = $el.val().length;
        return length >= minLength;
    };
    $(document).foundation();
    $(document).trigger('foundationLoaded');
}

function bindScrollTo() {

    $('[data-scroll-to]').on('click', function () {
        event.preventDefault();
        ScrollTo($(this).data('scrollTo'), {time: 1000, offset: -50});
    });

    $('[data-scroll-target]')
}

function bindHashScroll() {
    var hash = location.hash.slice(1),
        $target;

    if (hash.length) {
        $target = $('[data-scroll-target="' + hash + '"]');
        if ($target.length) {
            ScrollTo($target[0], {time: 1000, offset: 0});
        }
    }
}

function init() {
    $(function () {
        // Initialize everything here
        ajaxCsrfSetup();
        bindScrollTo();
        bindHashScroll();
        foundationInit();
        analytics.bindAnalyticsAttributes();
        analytics.bindVimeoVideos();
    });

}

init();