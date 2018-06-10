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
        mapDefault = {
            center     : {
                lat: 32.768380,
                lng: -117.039478
            },
            mapTypeControl: false,
            // cluster    : true,
            // get        : false,
            // infoWindow : false,
            // post       : false,
            // randomize  : false,
            scrollwheel: false,
            zoom       : 19
        },
        locations  = [
            {title: 'Conspiracy Theory @ MIF Studios', lat: 32.768380, lng: -117.039478}
        ];


    function bindInfoWindow(marker, location) {
        var content = '<div class="poi-info-window" style="color: black"><div class="title full-width">' + location.title + '</div><div class="address">San Diego, CA</div></div>';

        marker.addListener('click', function () {
            var infoWindow = new cache.maps.InfoWindow({
                content: content
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