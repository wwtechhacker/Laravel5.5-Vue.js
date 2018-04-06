/**
 *
 * @param opts
 * @param callback
 *
 *
 * optsSample = {
 *      'og:url'           : location.href
 *      'og:title'         : 'some title',
 *      'og:description'   : 'some description'
 *      'og:og:image:width': '2560',
 *      'og:image:height'  : '960',
 *      'og:image'         : 'http://mysite/image-location.jpg'
 * }
 */

var share = function (opts, callback) {
    var settings,
    defaults = {
        'og:url'         : [location.protocol, location.host].join('//')
    };


    callback = callback || function () {};
    settings = $.extend({}, defaults, opts);

    FB.ui({
            method           : 'share_open_graph',
            action_type      : 'og.shares',
            action_properties: JSON.stringify({
                object: settings
            })
        }, callback
    );
};

module.exports = {
    share: share
};

