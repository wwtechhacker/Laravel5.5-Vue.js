function mailchimpRequest(url, data, success, error) {
    success = success || function () {};
    error   = error || function () {};

    if (!/post-json/.test(url)) {
        url = url.replace('post', 'post-json');
    }

    $.ajax({
        url     : url,
        dataType: 'jsonp',
        jsonp   : 'c',
        data    : data
    }).then(function (response) {
        if (response.result && response.result === 'error') {
            // do nothing
            error(response);
            return;
        }

        success(response);
        // do nothing

    }, function (response) {
        // this shouldn't happen
    });
}

module.exports = {
    request: mailchimpRequest
};