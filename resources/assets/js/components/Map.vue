<template>
    <div id="location-finder">
        <div class="row align-middle small-collapse large-uncollapse">
            <div class="column text-center small-12 medium-6">
                <div class="buyTickets">
                     <a href="/ppv" class="button buyTickets">Watch PPV On Demand</a>
                    <p class="lead">
                    Purchase pre-sale admission
                    </p>
                    <a href="https://cash.me/$ShotsFiredRap" class="button buyTickets" target="_blank"> $20 Ticket</a>
                </div>
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
            scrollwheel: false,
            zoom       : 10
        },
        locations  = [
            {
                title: 'Mt. Olympus @ MIF Studios',
                address: '7323 El Cajon Blvd Unit D',
                info:  'La Mesa, CA 91942',
                date: 'Saturday, April 13th, 2019 @ 7:00PM',
                lat: 32.768380, lng: -117.039478
             }
        ];


    function bindInfoWindow(marker, location) {
        var $address    = $('<div>', {class: 'address'}).html(location.address ),
           $date        = $('<div>', {class: 'date'}).html('Event Time: ' + location.date),
           $info        = $('<p>', {class: 'details'}).html(location.info || ''),
           $title       = $('<div>', {class: 'title'}).html(location.title),
           $wrap        = $('<div>', {class: 'info-window'}),
           $a           = $('<a>', {href: 'https://www.google.com/maps/dir//Studio+M.I.F,+7323+El+Cajon+Blvd+Unit+D,+La+Mesa,+CA+91942', target: '_blank'}),
           $titleLink   = $a.append($title),
           $addressLink = $a.append($address).append($info),
           $infoWindow = $wrap.append($titleLink).append($addressLink).append($date);
        
        var infoWindow = new cache.maps.InfoWindow({
            content: $infoWindow[0]
        });
        infoWindow.open(cache.map, marker);
        
        marker.addListener('click', function () {
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
        props  : ['data'],
        data() {
            vue = this;
            return {
                zip         : '',
                zipError    : false,
                location    : {
                    title   : '',
                    address : '',
                    info    : ''
                },
                event       : {}
            };
        },
        mounted() {
            initMap('#map');
        },
        computed() {
            this.event = this.data;
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