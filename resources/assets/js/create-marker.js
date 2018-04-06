var geocoder,
    vue,
    maps,
    mapApi = require('./google-maps.js');

function parseAddress(data) {
    var fields = [
        'address',
        'city',
        'zip',
    ];

    return _.filter(data, function (value, key) {
        return fields.indexOf(key) !== -1 && value.toString().length;
    }).join(' ');

}

function geocodeSearch(address) {
    var deferred = $.Deferred();

    if (address.length < 5) {
        deferred.resolve({});
    }
    else {
        if (!geocoder) {
            geocoder = new maps.Geocoder();
        }
        geocoder.geocode({'address': address}, function (results, status) {
            if (status === 'OK') {
                var location = results.pop().geometry.location;
                deferred.resolve({
                    lat: location.lat(),
                    lng: location.lng()
                });
            }
        });
    }

    return deferred.promise();
}

function publish() {

}

function unpublish(marker) {
    if (!marker || (!marker.id && !marker.length)) {
        return false;
    }

    var markers = !_.isArray(marker) ? [marker] : marker,
        data    = {
            '_method'     : 'put',
            marker: {
                'published_at': ''
            }
        };

    _.each(markers, function (marker) {
        $.post('/api/markers/' + marker.id, data, function (response) {
            // do nothing
        });
    });
}

function createAndPublish(marker) {
    var deferred = $.Deferred(),
        markers  = !_.isArray(marker) ? [marker] : marker;

    var res = mapApi('AIzaSyDme-LxqX_hwQWbYiFUw-GWX5KBk5BacFU');
    res.then(function (mapResponse) {
        maps = mapResponse;

        _.each(markers, function (data) {
            geocodeSearch(parseAddress(data)).then(function (location) {
                if (location && location.lat && location.lng) {
                    data.lat = location.lat;
                    data.lng = location.lng;
                    $.post('/api/markers', {marker: data}, function (response) {
                        deferred.resolve(response);
                    });
                }
            });
        });
    });


    return deferred.promise();
}

module.exports = {
    publish  : createAndPublish,
    unpublish: unpublish
};
