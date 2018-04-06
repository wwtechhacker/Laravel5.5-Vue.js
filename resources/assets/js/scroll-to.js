module.exports = function (elem, options) {
    var settings = $.extend({}, {
        time  : 500,
        delay : 0,
        offset: 0
    }, options || {});

    elem = elem || '';
    if (!!$(elem).length) {
        $('html, body').delay(settings.delay).animate({scrollTop: $(elem).offset().top + settings.offset}, settings.time);
    }
};
