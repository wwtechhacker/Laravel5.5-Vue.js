function log(category, action, label, callback) {
    var eventOpts;
    if (typeof ga !== "function") {
        console.log("Google analytics not defined.");
        return;
    }

    eventOpts = {
        hitType      : 'event',
        eventCategory: category,
        eventAction  : action,
        eventLabel   : label
    };

    if (callback) {
        eventOpts.hitCallback = callback;
    }

    console.log(eventOpts);
    ga('send', eventOpts);
}

function createFunctionWithTimeout(callback, timeout) {
    var called = false;

    function fn() {
        if (!called) {
            called = true;
            callback();
        }
    }

    setTimeout(fn, timeout || 1000);
    return fn;
}

function bind(target) {
    $(target).off('click').on('click', function (e) {

        var $el         = $(this),
            category    = $el.data('ga-category'),
            action      = $el.data('ga-action'),
            label       = $el.data('ga-label') || '',
            targetBlank = $el.attr('target') && $el.attr('target') === '_blank' || false,
            href        = $el.is('a') && !targetBlank && $el.attr('href') || $el.data('href') || false,
            callback    = href ? createFunctionWithTimeout(function () {
                location.href = href;
            }) : false;

        if (href) {
            e.preventDefault();
        }

        if (!action.length || !category.length) {
            console.log('data-ga-category and data-ga-action are required.');
            return;
        }

        log(category, action, label, callback);

    });
}

module.exports = {
    log : log,
    bind: bind
};