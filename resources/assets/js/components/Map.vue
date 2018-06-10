<template>
    <div id="location-finder">
        <div class="row align-middle small-collapse large-uncollapse">
            <div class="column small-12 medium-6">
                <div class="map-container">
                    <div id="map"></div>
                </div>
            </div>
            <div class="column text-center small-12 medium-6">
                <h3>Attend Next<br>Local Event</h3>
                <p class="lead">
                    Purchase tickets to <br>attend the next event near you.
                </p>
                <a href="https://cash.me/$ShotsFiredRap" class="button buyTickets" target="_blank">Buy Tickets</a>
            </div>
        </div>
    </div>
</template>


<script>
    var mapApi     = require('../google-maps'),
        vue,
        cache      = {},
        mapDefault = {
            center     : {
                lat: 32.768380,
                lng: -117.039478
            },
            mapTypeControl: false,
            scrollwheel: false,
            zoom       : 10
        },
        locations  = [
            {
                title: 'Conspiracy Theory @ MIF Studios',
                address: '7323 El Cajon Blvd Unit D',
                info:  'La Mesa, CA 91942',
                date: 'Saturday, June 23, 2018 @ 6:00PM',
                lat: 32.768380, lng: -117.039478
             }
        ];


    function bindInfoWindow(marker, location) {
        var $address    = $('<div>', {class: 'address'}).html('Event Address: '  + location.address ),
           $date        = $('<div>', {class: 'date'}).html('Event Time: ' + location.date),
           $info        = $('<p>', {class: 'details'}).html(location.info || ''),
           $title       = $('<div>', {class: 'title'}).html(location.title),
           $wrap        = $('<div>', {class: 'info-window'}),
           $a           = $('<a>', {href: 'https://www.google.com/maps/dir//Studio+M.I.F,+7323+El+Cajon+Blvd+Unit+D,+La+Mesa,+CA+91942', target: '_blank'}),
           $titleLink   = $a.append($title),
           $addressLink = $a.append($address).append($info),
           $infoWindow = $wrap.append($titleLink).append($addressLink).append($date);

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

    function resetMap() {
        cache.map.setCenter(mapDefault.center);
        cache.map.setZoom(mapDefault.zoom);
    }

    function addMarker(location) {

        var marker = new cache.maps.Marker({
            position: location,
            map     : cache.map
        });

        bindInfoWindow(marker, location);
    }

    function loadMarkers(locations) {
        locations.forEach(function (location) {
            addMarker(location);
        });
    }

    function changeLocation(center) {
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
        if (zip.length !== 5) {
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
        var $el = $(selector),
            res = mapApi('AIzaSyC8WKYsviUaFQaTvASiC7GhA6ytHkuKhe0').then(function (maps) {
                cache.maps = maps;
                cache.map  = new maps.Map($el[0], $.extend({}, mapDefault, {
                    // option overrides
                }));

                loadMarkers(locations);
            });
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
                }
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