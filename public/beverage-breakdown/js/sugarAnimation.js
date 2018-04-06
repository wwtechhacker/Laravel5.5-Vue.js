var SugarAnimation = (function($) {
    var getScreenHeight = function () {
            return $(window).height();
        },
        initializeSugarPile = function (max_sugar) {
            var $sugarPile = $(sugarpileDiv);

            preloadGifs();

            maxSugar = max_sugar || 100;

            if ($sugarPile.length) {
                $sugarPile.css('background-position', '50% ' + getScreenHeight() + 'px');
                $sugarPile.css('display', 'block');
            }
        },
        adjustSugarPile = function(totalSugar) {
            var $sugarPile  = $(sugarpileDiv),
                maxY        = getScreenHeight(),
                percent     = Math.max(totalSugar/maxSugar);

            if (percent < 0) {
                percent = 0;
            }

            if (percent > 1) {
                percent = 1;
            }

            if ($sugarPile.length) {
                // add a little deplay to match w. sugar pouring animation
                setTimeout(function() {
                    $sugarPile.css('background-position', '50% ' + (maxY * (1-percent)) + 'px');
                }, 300);
            }
        },
        getSugarGifURL = function() {
            var rand    = Math.floor(Math.random() * 3),// 0, 1, 2
                gifObj  = sugarpourGifs[rand],
                src     = 'https://placehold.it/250/000000?text=+';

            if (typeof gifObj.src !== 'undefined') {
                src = gifObj.src;
                setTimeout(function() {
                    preloadGif(rand); //reload a new image for that index, small delay for IE
                }, 200);

            }
            return src;
        },
        removeGif = function() {
            var $sugarpour = $(sugarpourDiv);

            $sugarpour.remove();
        },
        preloadGif = function(num) {
            var Gif     = new Image(),
                img_id  =   num + 1,
                url     = 'images/sugar-pour-0' + img_id +'.gif';

            Gif.src = url + '?' + Math.random();    // prevent cached, IE issue;

            sugarpourGifs[(num)] = Gif;

            //console.log('info: ' + Gif.src + ' preloaded');
        },
        preloadGifs = function() {
            for (index = 0; index < 3; index ++) {
                preloadGif(index);
            }
        },
        addGifToDOM = function() {
            var $sugarpourDiv   = $('#sugarpour'),
                src;

            if ($sugarpourDiv.length) {
                removeGif();
                src = getSugarGifURL();
                //console.log('using: ' + src);
                $sugarpourDiv.append('<img src="' + src + '">');
                needRemove = true;

                // remove the gif after 3 seconds
                //setTimeout(removeGif, 2300);
            }
        },
        adjustSugar = function(oldVal, newVal) {
            // adding sugar
            if (newVal > oldVal) {
                addGifToDOM();

                adjustSugarPile(newVal);
            }
            // removing sugar
            else if (newVal < oldVal) {
                adjustSugarPile(newVal);
            }
        },
        getTotalSugar = function(beverages) {
            var totalSugar = 0;

            beverages.forEach(function(beverage) {
                var sugar = beverage.sugar || 0;

                totalSugar += sugar;
            })

            return totalSugar;
        },
        maxSugar,
        sugarpourDiv        = '#sugarpour img',
        sugarpileDiv        = '#sugarpile',
        needRemove          = false,
        sugarpourGifs       = [];

    return {

        // initialize sugar pile with the person's max sugar value (100%)
        initializeSugarPile : initializeSugarPile,

        // parameter: old total sugar, new total sugar
        adjustSugar         : adjustSugar,

        // loop through localstorage's beverage array and get the current total sugar value
        getTotalSugar       : getTotalSugar,

        // function to adjustSugarPile on screen resize/rotation
        adjustSugarPile     : adjustSugarPile
    };

})(jQuery);

