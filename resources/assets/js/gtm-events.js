module.exports = {
    log: function log(category, action, label, value, callback) {
        var dataLayer = window.dataLayer || [],
            event     = {
                event        : 'shotsfired-ga-event',
                label        : label,
                category     : category,
                action       : action,
                value        : value || '',
                eventCallback: callback || function () {}
            };
        dataLayer.push(event);
    }
};
