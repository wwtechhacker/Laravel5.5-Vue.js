/*!
 * JavaScript - loadGoogleMaps( version, apiKey ) - 16/02/2011
 *
 * - Load Google Maps API using jQuery Deferred.
 *   Useful if you want to only load the Google Maps API on-demand.
 * - Requires jQuery 1.5
 *
 * Copyright (c) 2011 Glenn Baker
 * Dual licensed under the MIT and GPL licenses.
 */

module.exports = function (apiKey) {

    //Create a Deferred Object
    var deferred     = $.Deferred(),
        google = window.google || {},

        //Declare a resolve function, pass google.maps for the done functions
        resolve      = function () {
            deferred.resolve(window.google && window.google.maps ? window.google.maps : false);
        },

        //global callback name
        callbackName = "loadGoogleMaps",

        //Ajax URL params
        params;


    //If google.maps exists, then Google Maps API was probably loaded with the <script> tag
    if (google && google.maps) {

        resolve();

        //If the google.load method exists, lets load the Google Maps API in Async.
    } else if (google && google.load) {

        google.load("maps", version || 3, {"other_params": "sensor=false", "callback": resolve});

        //Last, try pure jQuery Ajax technique to load the Google Maps API in Async.
    } else {

        //Ajax URL params
        params = $.extend({
            'callback': callbackName
        }, apiKey ? {"key": apiKey} : {});

        //Declare the global callback
        window[callbackName] = function () {

            resolve();

            //Delete callback
            setTimeout(function () {
                try {
                    delete window[callbackName];
                } catch (e) {}
            }, 20);
        };

        //Can't use the jXHR promise because 'script' doesn't support 'callback=?'
        $.ajax({
            dataType: 'script',
            data    : params,
            url     : 'https://maps.googleapis.com/maps/api/js'
        });

    }

    return deferred.promise();
};
