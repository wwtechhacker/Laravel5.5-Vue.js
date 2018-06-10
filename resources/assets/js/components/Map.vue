<template>
    <div id="location-finder">
        <div class="row align-middle small-collapse large-uncollapse">
            <div class="column text-center small-12 medium-6">
                <h3>Attend Next<br>Local Event</h3>
                <p class="lead">
                    Purchase tickets to <br>attend the next event near you.
                </p>
                <a href="https://cash.me/$ShotsFiredRap" class="button buyTickets" target="_blank">Buy Tickets</a>
            </div>
            <div class="column small-12 medium-6">
                <div class="map-container">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    var mapApi     = require('../google-maps'),
        vue,
        cache      = {},
        gtmEvents  = require('../gtm-events'),
        icon       = false,
        mapDefault = {
            // San Diego County
            center: { 
                lat: 32.711427, 
                lng: -117.159930 
            },
            mapTypeControl: false,
            scrollwheel   : false,
            zoom          : 11,
        },
        locations  = [
            {title: 'sample 1', lat: 37.7877522, lng: -122.43823070000002},
            {title: 'sample 2', lat: 33.9511133, lng: -118.2497386},
            {title: 'sample 3', lat: 34.1456654, lng: -118.1268976},
            {title: 'sample 4', lat: 13.2066666, lng: -171.02208329999996},
            {title: 'sample 5', lat: 33.9546403, lng: -117.39362819999997}
        ];


    function bindInfoWindow(marker, location) {
        var $address    = $('<div>', {class: 'address'}).html('Event Address: ' + location.formattedAddress),
            $date       = $('<div>', {class: 'date'}).html('Event Time: ' + [location.json.start, '-', location.json.end, ' ', location.json.day].join(' ')),
            $info       = $('<p>', {class: 'details'}).html(location.json.info || ''),
            $title      = $('<div>', {class: 'title'}).html(location.json.title),
            $wrap       = $('<div>', {class: 'info-window'}),
            $infoWindow = $wrap.append($title).append($info).append($address).append($date);

        marker.addListener('click', function () {
            var infoWindow = new cache.maps.InfoWindow({
                content: $infoWindow[0]
            });
            if (cache.infoWindow) {
                cache.infoWindow.close();
            }
            infoWindow.open(cache.map, marker);
            cache.infoWindow = infoWindow;
        });
    }

    function fetchMarkersStub() {
        return locations;
    }

    function fetchMarkers(url) {
        var deferred = $.Deferred(),
            data     = {
                published: 1
            };
        $.ajax(url, {data: data, dataType: 'json'}).then(function (response) {
            var processedData = _.map(response.data || {}, function (n) {
                if (n.data) {
                    n.json             = JSON.parse(n.data);
                    n.formattedAddress = _.filter([n.json.address || '', n.json.city || '', n.json.zip || '']).join(', ');
                    n.location         = {
                        lat: parseFloat(n.json.lat),
                        lng: parseFloat(n.json.lng)
                    };
                }
                return n;
            });
            deferred.resolve(processedData);
        });

        return deferred.promise();
    }

    function resetMap() {
        cache.map.setCenter(mapDefault.center);
        cache.map.setZoom(mapDefault.zoom);
    }

    function addMarker(location) {
        var markerSettings = {
            position: location.location,
            map     : cache.map,
        };

        if (icon) {
            markerSettings.icon = icon;
        }

        bindInfoWindow(new cache.maps.Marker(markerSettings), location);
    }

    function setMarkers(locations) {
        locations.forEach(function (location) {
            addMarker(location);
        });
    }

    function changeLocation(center) {
        gtmEvents.log('home', 'click', 'next-event');
        resetMap();
        // addMarker(center);
        setTimeout(function () {
            cache.map.setCenter(center);
        }, 500);
        setTimeout(function () {
            cache.map.setZoom(10);
        }, 1000);
    }

    function handleZip(zip) {
        var geocoder;
        if (zip.length < 5) {
            vue.zipError = true;
            return false;
        }

        geocoder = new cache.maps.Geocoder();
        geocoder.geocode({
            address: zip
        }, function (results, status) {
            if (status === 'OK') {
                var location = results.pop().geometry.location,
                    center   = {
                        lat: location.lat(),
                        lng: location.lng()
                    };
                changeLocation(center);
            }
        });

        // map.setCenter()

    }

    function initMap(selector) {
        var $el = $(selector);

        $.when(mapApi('AIzaSyC8WKYsviUaFQaTvASiC7GhA6ytHkuKhe0')).done(function (maps) {
            cache.maps = maps;
            cache.map  = new maps.Map($el[0], $.extend({}, mapDefault, {
            }));
        });

        // $.when(fetchMarkers('/api/markers'), mapApi('AIzaSyC8WKYsviUaFQaTvASiC7GhA6ytHkuKhe0')).done(function (markers, maps) {
        //     cache.maps = maps;
        //     cache.map  = new maps.Map($el[0], $.extend({}, mapDefault, {
        //         // option overrides
        //     }));
        //     setMarkers(markers);
        // });
    }

    export default {
        name   : "map",
        data() {
            vue = this;
            return {
                zip     : '',
                zipError: false,
                location: {
                    title  : '',
                    address: '',
                    info   : ''
                },
            };
        },
        mounted() {
            initMap('#map');
        },
        methods: {
            searchZip: function () {
                handleZip(vue.zip || '');
            }
        },
        watch  : {
            zip: function (newVal, oldVal) {
                vue.zipError = false;
            }
        }
    };
</script>


<style scoped>
    .buyTickets {
        margin-top: 1em;
    }
</style>