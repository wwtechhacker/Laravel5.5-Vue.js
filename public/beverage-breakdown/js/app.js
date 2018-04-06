(function ($, _) {

    var visitCount      = store.get('visitCount'),
        currentSlide    = store.get('currentSlide'),
        pledgeCount     = store.get('pledgeCount'),
        developEnvHosts = ['localhost', 'c4c.lcl'],
        isDevEnv        = _.indexOf(developEnvHosts, location.hostname || '') > -1,
        beveragesSaved  = [];

    // function to fire a ga('send')
    function fireGATracking(eventCategory, eventLabel, eventAction) {
        var eventAction = eventAction || 'click';

        // eg event category: "next-btn"
        // eg event label: "page 1 to page 2
        ga('send', 'event', eventCategory, eventAction, eventLabel);
    }

    function pushToDatalayer(action, label) {
        dataLayer.push({
            event    : 'c4c-ga-event',
            category : 'beverage breakdown',
            action   : action,
            label    : label,
        });
    }

    function trackPageChange(index, nextIndex) {
        if (nextIndex === 4) {
            pushToDatalayer('fact', 'bbd-2-morningdrink-fact');
        }
        else if (nextIndex === 6) {
            pushToDatalayer('fact', 'bbd-3-afternoondrink-fact');
        }
        else if (nextIndex === 8) {
            pushToDatalayer('fact', 'bbd-4-nightdrink-fact');
        }
        else if (nextIndex === 10) {
            pushToDatalayer('experience completion', 'bbd-5-summary-fact');
        }
    }

    function trackFactSection(nextSlide) {
        if (nextSlide === 5) {
            pushToDatalayer('experience completion', 'bbd-2-morningdrink-continue');
        }
        else if (nextSlide === 7) {
            pushToDatalayer('experience completion', 'bbd-3-afternoondrink-continue');
        }
        else if (nextSlide === 9) {
            pushToDatalayer('experience completion', 'bbd-4-nightdrink-continue');
        }
    }
    function trackSkipLink(thisPage){
        if (thisPage === 2) {
            pushToDatalayer('click', 'bbd-1-profile-skip');
        }
        else if (thisPage === 3) {
            pushToDatalayer('click', 'bbd-2-morningdrink-skip');
        }
        else if (thisPage === 5) {
            pushToDatalayer('click', 'bbd-3-afternoondrink-skip');
        }
        else if (thisPage === 7) {
            pushToDatalayer('click', 'bbd-4-nightdrink-skip');
        }
    }

    function trackBeverage(dataID) {
        var mealID = dataID.charAt(0),
            tracked = false;

        // breakfast
        if (mealID === 'b') {
            tracked = store.get('trackB');
            if (tracked !== 1) {
                pushToDatalayer('click', 'bbd-2-morningdrink-choice');
                store.set('trackB', 1);
            }
        }
        // lunch
        else if (mealID === 'l') {
            tracked = store.get('trackL');
            if (tracked !== 1) {
                pushToDatalayer('click', 'bbd-3-afternoondrink-choice');
                store.set('trackL', 1);
            }
        }
        // night time
        else if (mealID === 'd') {
            tracked = store.get('trackD');
            if (tracked !== 1) {
                pushToDatalayer('click', 'bbd-4-nightdrink-choice');
                store.set('trackD', 1);
            }
        }
        // summary drink
        else if (mealID === 's') {
            tracked = store.get('trackS');
            if (tracked !== 1) {
                pushToDatalayer('click', 'bbd-5-summary-choice');
                store.set('trackS', 1);
            }
        }
    }

    function fireFBPixel() {
        window.fbq('track', 'PageView');
        window.fbq('track', 'CompleteRegistration');
    }

    function dbg(msg) {
        if (isDevEnv) {
            console.log(msg);
        }
    }

    function hideNav() {
        $('#fp-nav').addClass('hidden');
    }
    function showNav() {
        $('#fp-nav').removeClass('hidden');
    }

    function getAnalyticSlideTitle(slideID) {
        var slideTitles = [
            'start',
            'age',
            'gender',
            'morning',
            'midmorning',
            'lunch',
            'afternoon',
            'dinner',
            'anything-missed',
            'calculation',
            'health-harm',
            'drink-swap',
        ];

        if (slideID >= 0) {
            return slideTitles[(slideID - 1)] ? slideTitles[(slideID - 1)] : '';
        }
    }

    // function to manually reset the swapDrink localStorage, for tracking purpose
    function resetSwapDrink() {
        store.set('swapDrink', 0); // User swapped any drinks?
    }

    function initializeStorage() {
        dbg('lets get this party started...');
        if (!store.enabled) {
            alert('Local storage is not supported by your browser. Please disable "Private Mode", or upgrade to a modern browser.')
            return
        }

        // New or returning visitor? Where did they leave off?  Did they pledge?
        // if (visitCount > 0) {
        if (0) {

            resetSwapDrink();

            if (currentSlide > 1) {
                $('header').removeClass('big');
                moveToSlide(currentSlide);
                dbg("Returning visitor that hasn't pledged, sending them back to slide " + currentSlide);

                if (pledgeCount > 0) {
                    dbg("Booyah, this visitor has already pledged " + pledgeCount + " times");
                }
            } else {

            }
        } else {
            dbg("Brand new visitor, setting up storage object");
            setupStorage();
        }
    }

// Setup the localStorage keys with default data
    function setupStorage() {
        dbg("setting up storage...");

        // Returning visitors and navigation
        store.set('visitCount', 1);          // Boolean
        store.set('pledgeCount', 0);         // Boolean
        store.set('currentSlide', 1);        // Number ("start page" = 1)

        store.set('trackB', 0); // flags used for tracking
        store.set('trackL', 0);
        store.set('trackD', 0);
        store.set('trackS', 0);

        // User details
        store.set('ageContext', 'unknown');  // Child, teen, adult
        store.set('gender', 'unknown');      // Male, female, unknown

        // Create breakfast object
        store.set('beverages', '');         // Array of beverage objects

        // Total sugar the user consumed so far
        store.set('totalSugar', 0);

        // User swapped any drinks?
        store.set('swapDrink', 0);

        dbg(store.getAll());
    }

// Change messaging based on age
    function setUserContext(age, button) {
        store.set('ageContext', age);

        //fireGATracking('next-slide-btn', 'slide ' + currSlide +' to slide ' + nextSlide);

        $('#age').removeClass('disabled');
        $('body').attr('data-context', age);
        dbg('setting page context to ' + store.get('ageContext'));
    }

// Traverse sections
    function moveToSlide(nextSlide) {
        store.set('currentSlide', nextSlide);
        dbg('moving to slide ' + nextSlide);
        $.fn.fullpage.moveTo(nextSlide);
    }

// Set localStorage value and move on
    function storeValueAndProceed(field, value, nextSlide) {
        store.set(field, value);
        dbg(field + ' set to ' + value);
        moveToSlide(nextSlide);
    }

// Reset localStorage and start at first slide
    function startOver() {
        $('button').removeClass('selected');
        store.set('ageContext', '');            // Child, teen, adult
        store.set('gender', 'unknown');          // Male, female, unknown
        store.set('beverages', '');             // Array of beverage objects
        store.set('totalSugar', 0);             // reset total sugar value
        store.set('swapDrink', 0);              // reset swap drink indicator

        store.set('trackB', 0); // flags used for tracking
        store.set('trackL', 0);
        store.set('trackD', 0);
        store.set('trackS', 0);

        moveToSlide(1);
    }

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function storeAndUpdateTotalSugar(beverages) {
        var oldTotalSugar = store.get('totalSugar'),
            totalSugar    = 0,
            yearlySugar;

        totalSugar = calculateSugarTotal(beverages);

        store.set('totalSugar', totalSugar);
        store.set('beverages', beverages);

        yearlySugar = (totalSugar * 365).toFixed(0);
        $('.sugar-total').text(totalSugar);
        $('.yearly-sugar').text(numberWithCommas(yearlySugar));
        var yearlycal = (totalSugar * 365) * 16;
        var yearlylbs = (((totalSugar * 365) * 16) / 3500).toFixed(2);
        $('.yearly-sugar-cal').text(numberWithCommas(yearlycal));
        $('.yearly-sugar-lbs').text(numberWithCommas(yearlylbs));

        if (totalSugar > 6) {
            $('body').attr('data-review', 'bad');
        } else {
            $('body').attr('data-review', 'good');
        }

        $('.sugar-result').removeClass('no-drink');

        // adjust sugar total display
        adjustSugarTotalH2();

        // adjust sugar pile
        SugarAnimation.adjustSugar(oldTotalSugar, totalSugar);
    }


    function updateSugarSavings() {
        var val = calculateSugarTotal(getBeveragesSaved());
        $('#savings-total').attr('data-savings', val).text(val);
        $('.summary-save-total', '#section12').attr('data-savings', val).text(val);

        SugarAnimation.adjustSugarPile(store.get('totalSugar') + (val * -1));
    }

    function setGenericBeverageRecommendation(sugarSavings, elementID, newItem) {
        var $selections      = $("#beverage-selections"),
            $recommendations = $("#beverage-recommendations"),
            $rec             = getBeverageRecommendationPlaceholderElem().clone(),
            savings          = parseInt(sugarSavings);

        newItem.attr('id', elementID + '-selection').children('.beverage-attributes').remove();
        $('<li>')
            .append(newItem)
            .appendTo($selections);
        $('<li>')
            .append($rec.attr('data-savings', savings).attr('data-id', elementID))
            .appendTo($recommendations);
    }


    function getBeverageRecommendationPlaceholderElem() {
        return $('#beverage-recommendation-placeholder').children().first();
    }

    function getIconSize(totalBeverage) {

        totalBeverage = parseInt(totalBeverage) || 0;

        // 7+
        if (totalBeverage > 6) {
            return 'icon-xs';
        }
        // 5 - 6
        else if (totalBeverage > 4) {
            return 'icon-sm';
        }
        // 3 or 4 beverage
        else if (totalBeverage > 2) {
            return 'icon-md';
        }
        // 2 beverages
        else if (totalBeverage == 2) {
            return 'icon-bg';
        }
        // 1 beverage
        else {
            return 'icon-xl';
        }
    }

    // function to adjust the size of beverage icon based on how many beverages total
    function adjustIconSize(totalBeverage) {
        var $allIcons = $('.consumed-beverage', '#section10');

        // remove all size classes from beverage icons
        $allIcons.removeClass('icon-bg').removeClass('icon-xs icon-sm icon-md icon-bg icon-xl');

        $allIcons.addClass(getIconSize(totalBeverage));
    }

    function putConsumedBeverages() {
        var beveragesArray = store.get('beverages'),
            $consumedDiv = $('#beverages-icons');

        // make sure div is cleared out
        $consumedDiv.html('');

        var sizeClass = getIconSize(beveragesArray.length);

        $.each(beveragesArray, function(index, beverageObj) {
            if (beverageObj.quantity > 0) {
                var tallyIcon = '<div class="consumed-beverage ' + sizeClass + '"><img src="images/icon-' + beverageObj.icon + '.png" alt="" /></div>';
                $consumedDiv.append(tallyIcon);
            }
        });
    }

    function initSwapLists() {
        var beveragesArray = store.get('beverages');

        $.each(beveragesArray, function(index, beverageObj) {
            if (beverageObj.sugar != 0 && beverageObj.quantity > 0) {
                var $beverage = $('#' + beverageObj.id);
                setGenericBeverageRecommendation(beverageObj.sugar, beverageObj.id, $beverage.clone());
            }
        })

    }

    // Add beverage selection to appropriate meal
    function addBeverage(beverageName, beverageSubhead, beverageIcon, beverageSize, beverageSizes, beverageSugar, beverageSugars, beverageElement, beverageQuantity, $fromModal) {
        var $beverage      = $('#' + beverageElement),
            beveragesArray = store.get('beverages'),
            beverageImage  = "images/icon-" + beverageIcon + ".png",
            tallyIcon      = '<div class="consumed-beverage"><img src="images/icon-' + beverageIcon + '.png" alt="" /></div>',
            beverageData   = {
                id      : beverageElement,
                name    : beverageName,
                subhead : beverageSubhead,
                image   : beverageImage,
                size    : beverageSize,
                sugar   : beverageSugar,
                sizes   : beverageSizes,
                sugars  : beverageSugars,
                quantity: beverageQuantity,
                icon    : beverageIcon,
            },
            sugarSavings,
            $newItem,
            totalBeverages = 0;

        beverageQuantity = beverageQuantity || 1;


        if (!beveragesArray.length > 0) {
            beveragesArray = [];
            beveragesArray.push(beverageData);

        } else {
            // Does beverage already exist in array?
            match = $.map(beveragesArray, function (beverage, index) {
                if (beverage.id == beverageElement) {
                    return 1;
                } else {
                    return -1;
                }
            });

            index = match.indexOf(1); // Get index without array

            if (index > -1) {
                beveragesArray[index] = beverageData;
            } else {
                beveragesArray.push(beverageData);
            }
        }

        // Add a beverage item to the selected meal's "beverages" array
        storeAndUpdateTotalSugar(beveragesArray);

        // Set data on beverage dom element
        $beverage.attr('data-name', beverageName);
        $beverage.attr('data-subhead', beverageSubhead);
        $beverage.attr('data-size', beverageSize);
        $beverage.attr('data-sizes', beverageSizes);
        $beverage.attr('data-sugars', beverageSugars);
        $beverage.attr('data-quantity', beverageQuantity);
        if (!$beverage.hasClass('selected')) {
            $beverage.addClass('selected');
        }

        if ($beverage.hasClass('zero')) {
            $beverage.removeClass('zero');
        }

        // Update the UI element
        $('#' + beverageElement + '-name').text(beverageName);
        $('#' + beverageElement + '-subhead').text(beverageSubhead);
        $('#' + beverageElement + '-icon').attr('src', beverageImage);

        var sizes = typeof $beverage.attr('data-sizes') == "string" ? $beverage.attr('data-sizes').replace(/\[|\]/gm, '').split(',') : $beverage.attr('data-sizes').replace(/\[|\]/gm, '').toString().split(',');

        // drinks with more than 3 size options
        if (sizes.length > 3) {
            if (beverageSize == 0) {
                var sizeData = [
                    {id: 0, text: sizes[0] + ' OZ', selected: 'selected'},
                    {id: 1, text: sizes[1] + ' OZ'},
                    {id: 2, text: sizes[2] + ' OZ'},
                    {id: 3, text: sizes[3] + ' OZ'}
                ];
            } else if (beverageSize == 1) {
                var sizeData = [
                    {id: 0, text: sizes[0] + ' OZ'},
                    {id: 1, text: sizes[1] + ' OZ', selected: 'selected'},
                    {id: 2, text: sizes[2] + ' OZ'},
                    {id: 3, text: sizes[3] + ' OZ'}
                ];
            } else if (beverageSize == 2) {
                var sizeData = [
                    {id: 0, text: sizes[0] + ' OZ'},
                    {id: 1, text: sizes[1] + ' OZ'},
                    {id: 2, text: sizes[2] + ' OZ', selected: 'selected'},
                    {id: 3, text: sizes[3] + ' OZ'}
                ];
            } else if (beverageSize == 3) {
                var sizeData = [
                    {id: 0, text: sizes[0] + ' OZ'},
                    {id: 1, text: sizes[1] + ' OZ'},
                    {id: 2, text: sizes[2] + ' OZ'},
                    {id: 3, text: sizes[3] + ' OZ', selected: 'selected'}
                ];
            } else {
                var sizeData = [
                    {id: 0, text: sizes[0] + ' OZ'},
                    {id: 1, text: sizes[1] + ' OZ'},
                    {id: 2, text: sizes[2] + ' OZ'},
                    {id: 3, text: sizes[3] + ' OZ', selected: 'selected'}
                ];
            }
        }
        // drinks with only 3 size options
        else {
            if (beverageSize == 0) {
                var sizeData = [
                    {id: 0, text: sizes[0] + ' OZ', selected: 'selected'},
                    {id: 1, text: sizes[1] + ' OZ'},
                    {id: 2, text: sizes[2] + ' OZ'}
                ];
            } else if (beverageSize == 1) {
                var sizeData = [
                    {id: 0, text: sizes[0] + ' OZ'},
                    {id: 1, text: sizes[1] + ' OZ', selected: 'selected'},
                    {id: 2, text: sizes[2] + ' OZ'}
                ];
            } else if (beverageSize == 2) {
                var sizeData = [
                    {id: 0, text: sizes[0] + ' OZ'},
                    {id: 1, text: sizes[1] + ' OZ'},
                    {id: 2, text: sizes[2] + ' OZ', selected: 'selected'}
                ];
            }
            else {
                var sizeData = [
                    {id: 0, text: sizes[0] + ' OZ'},
                    {id: 1, text: sizes[1] + ' OZ'},
                    {id: 2, text: sizes[2] + ' OZ', selected: 'selected'}
                ];
            }
        }

        $('#' + beverageElement + '-size').html('');
        $('#' + beverageElement + '-size').select2({
            data                   : sizeData,
            minimumResultsForSearch: Infinity
        });

        // --- if the call is from a modal
        // --- initialize the size section
        if (typeof $fromModal !== 'undefined' && $fromModal.length) {
            var $sizeSelect = $fromModal.find('.beverage-size select');

                $sizeSelect.html('');
                $sizeSelect.select2({
                    data                   : sizeData,
                    minimumResultsForSearch: Infinity
                });
        }

        //console.log('updated beverages', beveragesArray);
        dbg(beveragesArray);
    }

    function changeBeverageQuantity(beverageElement, newQuantity) {
        var beveragesArray = store.get('beverages'),
            $beverage      = $('#' + beverageElement),
            match,
            index;

        $beverage.attr('data-quantity', newQuantity),

            $('#' + beverageElement + '-quantity')[0].value = newQuantity;

        match = $.map(beveragesArray, function (beverage, index) {
            if (beverage.id == beverageElement) {
                return index;  // Returns [index]
            }
        });

        index = match[0]; // Get index without array
        beveragesArray[index].quantity = newQuantity;
        if (newQuantity == 0) {
            $beverage.addClass('zero');
        } else if (newQuantity > 0) {
            $beverage.removeClass('zero');
        }

        storeAndUpdateTotalSugar(beveragesArray);
    }

    function changeBeverageSize(beverageElement, newIndex) {
        var beveragesArray = store.get('beverages');
        var $beverage = $('#' + beverageElement);
        var sizes = typeof $beverage.attr('data-sizes')[0] == "string" ? $beverage.attr('data-sizes').split(',') : $beverage.attr('data-sizes').toString().split(',');
        var sugars = typeof $beverage.attr('data-sugars')[0] == "string" ? $beverage.attr('data-sugars').split(',') : $beverage.attr('data-sugars').toString().split(',');
        var $sizeSelect = $('#' + beverageElement + '-size').select2();
        var newSize = newIndex;
        var newSugar = parseFloat(sugars[newIndex]),
            match,
            index;

//console.log ('changing size', newSize, newSugar);


        $sizeSelect.val(newSize).trigger("change");
        $beverage.attr('data-size', newSize);
        $beverage.attr('data-sugar', newSugar);

        match = $.map(beveragesArray, function (beverage, index) {
            if (beverage.id == beverageElement) {
                return index;  // Returns [index]
            }
        });

        index = match[0]; // Get index without array
        beveragesArray[index].size = newSize;
        beveragesArray[index].sugar = newSugar;

        storeAndUpdateTotalSugar(beveragesArray);

//console.log('after change size', beveragesArray);
    }

    function getBeverageSelectedElemByDataId(dataId) {
        return $('[data-id="' + dataId + '"]', $('#beverage-selections'));
    }

    function getBeverageRecommendationElemByDataId(dataId) {
        return $('[data-id="' + dataId + '"]', $('#beverage-recommendations'));
    }

    function calculateSugarTotal(beverages) {
        var total = 0;
        $.each(beverages, function (ii, beverage) {
            beverage.sugar = beverage.sugar || 0;
            total += beverage.quantity * beverage.sugar;
        });
        return total;
    }

    function getTotalSugar() {
        return parseInt(store.get('totalSugar'), 10);
    }

    function getTotalSugarSavings(currentSugarTotal) {
        return getTotalSugar() - parseInt(currentSugarTotal, 10);
    }

    function getBeverages() {
        return store.get('beverages');
    }

    function findBeverageIndex(dataId) {
        return _.findIndex(getBeverages(), {id: dataId});
    }

    function findBeverage(dataId) {
        return _.find(getBeverages(), {id: dataId});
    }

    function setBeverages(beverages) {
        store.set('beverages', beverages);
    }

    function filterBeverageByDataId(dataId) {
        var beverages        = getBeverages(),
            updatedBeverages = _.filter(beverages, {id: dataId});
        return updatedBeverages;
    }

    function findSavedBeverage(dataId) {
        return _.find(getBeveragesSaved(), {id: dataId});
    }

    function addBeverageSaved(dataId) {
        var beverage      = findBeverage(dataId),
            savedBeverage = findSavedBeverage(dataId);

        if (!savedBeverage) {
            beveragesSaved.push(beverage);
        }
    }

    function removeRecommendedSelection($healthySelection, $beverageSelection, dataId) {
        $healthySelection.html(getBeverageRecommendationPlaceholderElem().html());
        $healthySelection.removeClass('selected');
        $beverageSelection.addClass('selected');
        removeBeverageSaved(dataId);
        var val = calculateSugarTotal(getBeveragesSaved());
        $('#savings-total').attr('data-savings', val).text(val);

        store.set('swapDrink', (store.get('swapDrink')-1));

        SugarAnimation.adjustSugarPile(store.get('totalSugar') + (val * -1));
    }

    function removeBeverageSaved(dataId) {
        beveragesSaved = _.reject(getBeveragesSaved(), {id: dataId});
    }

    function getBeveragesSaved() {
        return beveragesSaved;
    }

    function rejectBeverageByDataId(dataId) {
        var beverages        = getBeverages(),
            updatedBeverages = _.reject(beverages, {id: dataId});
        return updatedBeverages;
        setBeverages(updatedBeverages);
    }
    function pageHasHeader(pageNum) {
        return !isSmallScreen() || (pageNum !== 4 && pageNum !== 6 && pageNum !== 8);
    }
    function pageHasNoNav(pageNum) {
       return pageNum === 1 || pageNum === 4 || pageNum === 6 || pageNum === 8 || pageNum === 10 || pageNum === 11 || pageNum === 12;
    }
    function showHeader() {
        $('.main-nav').removeClass('hidden');
    }
    function hideHeader() {
        $('.main-nav').addClass('hidden');
    }

    function isSmallScreen() {
        return Foundation.MediaQuery.current === 'small';
    }

    function initDrinkSection() {
        var totalBeverages = store.get('beverages').length;
        if (totalBeverages === 0) {
            $('.sugar-result', '.summary-section').addClass('no-drink');
            $('.summary-section').addClass('no-drink');
        }
    }

    function initSummarySection() {
        var totalSugar =  parseInt(store.get('totalSugar'));

        if (totalSugar === 0) {
            $('.summary-section').addClass('no-sugar');
        }
        initDrinkSection();
    }

    function getBeverageAttr($this) {
        var beverageName = $this.attr('data-name');
        var beverageSubhead = $this.attr('data-subhead');
        var beverageSize = $this.attr('data-size');
        var beverageSizes = $this.attr('data-sizes');
        var beverageSugars = typeof $this.attr('data-sugars') == 'string' ? $this.attr('data-sugars').replace(/\[|\]/gm, '').split(',') : $this.attr('data-sugars');
        var beverageIcon = $this.attr('data-icon');
        var beverageElement = $this.attr('data-id');
        var beverageSugar = beverageSugars[beverageSize];
        var beverageQuantity = parseInt($this.attr('data-quantity'));

        return {
            beverageName : beverageName,
            beverageSubhead : beverageSubhead,
            beverageIcon : beverageIcon,
            beverageSize : beverageSize,
            beverageSizes : beverageSizes,
            beverageSugar : beverageSugar,
            beverageSugars : beverageSugars,
            beverageElement : beverageElement,
            beverageQuantity : beverageQuantity,
        };
    }

    // update the dropdown in the central area of a modal
    function updateModalSizeVal($modal, value) {
        var $centerSelect = $modal.find('.beverage-size select.modal-size');
        var $sizeSelect = $centerSelect.select2();

        $sizeSelect.val(value).trigger("change");
    }

    // update the input in the central area of a modal
    function updateModalQuantityVal($modal, value) {
        var $centerInput = $modal.find('.beverage-quantity input.modal-quantity');

        $centerInput[0].value = value;
    }

    function hideAllModalBeverageAttr() {
        dbg('hiding attribute panel for modals, total: ' + $('.beverage-attributes.init-hidden', '.modal').length);
        $('.beverage-attributes.init-hidden', '.modal').addClass('hidden');
    }

    function resetSizeAndQuantity($modal) {
        var $input = $modal.find('.beverage-attributes input'),
            $select = $modal.find('.beverage-attributes select');

        dbg('resetting value for generic-modal center area');

        $input[0].value = 1;
        $select.html('');
    }

    function resetDrinkModalSelected() {
        dbg('remove drink modals\' "selected" class');
        $('.drink-modal .beverage').removeClass('selected');
        hideAllModalBeverageAttr();
    }

    function getTotalSugarSize (totalSugar) {
        var size = 'normal';

        if (totalSugar / 1000 >= 1) {
            size = 'x-large';
        } else if (totalSugar / 100 >= 1) {
            size = 'large';
        }

        return size;
    }

    function adjustSugarTotalH2 () {
        var size = getTotalSugarSize(store.get('totalSugar')),
            $h2 = $('.sugar-count h2', '.section');

        $h2.removeClass('normal large x-large');
        $h2.addClass(size);

        dbg('total sugar: ' + store.get('totalSugar') + ', size: ' + size);
    }

    $(function () {

        // init foundation js
        $(document).foundation();

        $('#fullpage').fullpage({
            autoScrolling    : true,
            controlArrows    : false,
            easing           : 'easeOut',
            easingcss3       : 'ease',
            navigation       : true,
            navigationPosition: 'right',
            showActiveTooltip : true,
            navigationTooltips : ['', '1: Profile', '2: Morning', '', '3: Afternoon', '', '4: Night', '', '5: Summary', '', ''],
            keyboardScrolling: true,
            recordHistory    : true,
            afterLoad        : function (anchorLink, index) {
                if (index === 1) {
                    hideNav();
                }
            },
            afterRender      : function () {
                // Disabling keyboard scrolling down
                $.fn.fullpage.setKeyboardScrolling(false, 'down');
                initializeStorage();
            },
            onLeave          : function (index, nextIndex, direction) {

                if (pageHasNoNav(nextIndex)) {
                    hideNav();
                }
                else {
                    showNav();
                }

                if (pageHasHeader(nextIndex)) {
                    showHeader();
                }
                else {
                    hideHeader();
                }

                // handle GTM tracking
                trackPageChange(index, nextIndex);

                resetDrinkModalSelected();

                if (index == 1 && nextIndex == 2) {
                    $('header').removeClass('big');
                }
                else if (index > 1 && nextIndex == 1) {
                    $('header').addClass('big');
                }
                else if (nextIndex == 10) {
                    initSummarySection();
                    putConsumedBeverages();
                }
                else if (nextIndex === 11) {
                    initSwapLists();
                }
                else if (nextIndex == 12) {
                    $('body').css('overflow-y', 'scroll');
                    $('.total-swapped', '#section12').text(store.get('swapDrink'));
                }
                else if (index == 12) {
                    $('body').css('overflow-y', 'scroll');
                }
            }
        });

        // make sure sugar value and local storage is refreshed
        startOver();

        // initialize sugar animation
        // currently hardcoded to 100, should be dependant on age/gender/etc
        SugarAnimation.initializeSugarPile(100);

        var maxSugar = 6;

        // Gender selection
        $('.gender', '#section2').click(function () {
            var $this = $(this),
                gender = $this.attr('data-gender'),
                nextSlide = $this.attr('data-next-slide'),
                age = store.get('ageContext');

            $('.gender', '#section2').removeClass('active');
            $this.addClass('active');

            store.set('gender', gender);
            $('.set-gender').text("child");
            dbg(age);
            dbg('set gender to ' + gender);

            if (gender == "male") { //Male

                pushToDatalayer('click', 'bbd-1-profile-male');

                if (age == "child") {
                    $('.set-gender').text("son");
                    $('.set-gender-adj').text("his");
                    maxSugar = "6";
                } else if (age == "adult") {
                    maxSugar = "9";
                } else {
                    maxSugar = "9";
                }
            } else if (gender == "female") { //Female

                pushToDatalayer('click', 'bbd-1-profile-female');

                if (age == "child") {
                    $('.set-gender').text("daughter");
                    $('.set-gender-adj').text("her");
                    maxSugar = "6";
                } else if (age == "adult") {
                    maxSugar = "6";
                } else {
                    maxSugar = "6";
                }
            } else { //No gender
                if (age == "child") {
                    $('.set-gender').text("child");
                    $('.set-gender-adj').text("his or her");
                    maxSugar = "6";
                } else if (age == "adult") {
                    maxSugar = "6-9";
                } else {
                    maxSugar = "6-9";
                }
            }
            $(".max-sugar").text(maxSugar);

            if ($('.age.active', '#section2').length) {
                moveToSlide(nextSlide);
            }
        });

        // Age selection and setting page context
        $('.age', '#section2').click(function () {
            var $this = $(this),
                age = $this.attr('data-age'),
                nextSlide = $this.attr('data-next-slide');

            $('.age', '#section2').removeClass('active');
            $this.addClass('active');
            setUserContext(age);
            dbg(age);
            if (age == "child") {
                pushToDatalayer('click', 'bbd-1-profile-child');
                maxSugar = "6";
                $('.set-gender').text("child");
                $('.set-gender-adj').text("his or her");
            } else if (age == "adult") {
                pushToDatalayer('click', 'bbd-1-profile-adult');
                maxSugar = "6-9";
            } else {
                maxSugar = "6-9";
            }
            $(".max-sugar").text(maxSugar);

            // if a gender is selected
            if ($('.gender.active', '#section2').length) {
                moveToSlide(nextSlide);
            }
        });

        // a beverage button is clicked, calculate total
        // $('.beverage') should ONLY EXIST in modal
        $('.beverage').click(function (e) {
            e.preventDefault();
            var $this = $(this);
            if ($this.hasClass('selected') || $this.hasClass('healthy-option')) {
                dbg('already added');
                return;
            }


            var beverageName = $this.attr('data-name');
            var beverageSubhead = $this.attr('data-subhead');
            var beverageSize = $this.attr('data-size');
            var beverageSizes = $this.attr('data-sizes');
            var beverageSugars = typeof $this.attr('data-sugars') == 'string' ? $this.attr('data-sugars').replace(/\[|\]/gm, '').split(',') : $this.attr('data-sugars');
            var beverageIcon = $this.attr('data-icon');
            var beverageElement = $this.attr('data-id');
            var beverageSugar = beverageSugars[beverageSize];
            var currentModal = $this.closest('.modal');

            // display the adjustment section (size/quantity)
            currentModal.find('.beverage-attributes').removeClass('hidden');

            // (cosmestic) resetting the size and quantity area (clear old result if needed)
            resetSizeAndQuantity(currentModal);

            addBeverage(beverageName, beverageSubhead, beverageIcon, beverageSize, beverageSizes,
                        beverageSugar, beverageSugars, beverageElement, 1, currentModal);

            // (cosmestic) add "selected" class to the button
            currentModal.find('.beverage').removeClass('selected');
            $this.addClass('selected');

        });


        // Beverage (beverages with a modal)
        $('.selector').click(function (e) {
            e.preventDefault();
            var $this = $(this);
            var modal = $this.attr('data-modal');
            var beverageElement = $this.attr('id');
            var $modal = $(modal);

            // GTM tracking
            trackBeverage(beverageElement);

            // init each beverage button with data ID
            $modal.find('.beverage').each(function (i) {
                var $this = $(this);

                $this.attr('data-id', beverageElement);
            });

            // init each size-up/quantity-up button with data ID
            $modal.find('.beverage-attributes .size-up').attr('data-id', beverageElement);
            $modal.find('.beverage-attributes .size-down').attr('data-id', beverageElement);
            $modal.find('.beverage-attributes .quantity-up').attr('data-id', beverageElement);
            $modal.find('.beverage-attributes .quantity-down').attr('data-id', beverageElement);

            // Generic Modal beverages
            if (modal === '#generic-modal') {

                // need to treat this click as an added beverage
                var beverageData = getBeverageAttr($this);

                // (cosmestic) resetting the size and quantity area (clear old result if needed)
                resetSizeAndQuantity($modal);

                // (cosmestic) update central area with size and quantity
                updateModalSizeVal($modal, beverageData.beverageSize);

                // when this button is hit, we want to make sure the quantity added is *at least* 1
                var adjustedQuantity = beverageData.beverageQuantity;
                if (beverageData.beverageQuantity === 0) {
                    adjustedQuantity = 1;
                }

                // (cosmestic) update the textbox quantity
                updateModalQuantityVal($modal, adjustedQuantity);

                // add the beverage
                addBeverage(beverageData.beverageName, beverageData.beverageSubhead, beverageData.beverageIcon,
                    beverageData.beverageSize, beverageData.beverageSizes, beverageData.beverageSugar,
                    beverageData.beverageSugars, beverageData.beverageElement, adjustedQuantity, $modal);
            }
            //else {
            //    resetSizeAndQuantity($modal);
            //}

            $modal.modal();
        });


        $('.size-up').click(function (e) {
            e.stopPropagation();
            var $this = $(this);
            var beverage = $this.attr('data-id');
            var $beverage = $('#' + beverage);
            var currentSize = $beverage.attr('data-size');
            var index = parseInt(currentSize);
            var newIndex = index + 1;
            var sizes = typeof $beverage.attr('data-sizes') == "string" ? $beverage.attr('data-sizes').replace(/\[|\]/gm, '').split(',') : $beverage.attr('data-sizes').replace(/\[|\]/gm, '').toString().split(',');

            //console.log('testing, total sizes', sizes, sizes.length);

            if (newIndex > -1 && newIndex < sizes.length) {
                changeBeverageSize(beverage, newIndex);
                dbg('size up');

                // update the dropdown in the central area of a modal
                // pure cosmetic, actual data manipulation should be in changeBeverageSize()
                if ($this.hasClass('in-modal')) {
                    var thisModal = $this.closest('.modal')[0];
                    updateModalSizeVal($(thisModal), newIndex);
                }
            }

        });

        // Decrease beverage size
        $('.size-down').click(function (e) {
            e.stopPropagation();
            var $this = $(this);
            var beverage = $this.attr('data-id');
            var $beverage = $('#' + beverage);
            var currentSize = $beverage.attr('data-size');
            var index = parseInt(currentSize);
            var newIndex = index - 1;

            if (newIndex > -1 && newIndex < 3) {
                changeBeverageSize(beverage, newIndex);
                dbg('size down');

                // update the dropdown in the central area of a modal
                // pure cosmetic, actual data manipulation should be in changeBeverageSize()
                if ($this.hasClass('in-modal')) {
                    var thisModal = $this.closest('.modal')[0];
                    updateModalSizeVal($(thisModal), newIndex);
                }
            }
        });

        $('.quantity-up').click(function (e) {
            e.stopPropagation();
            var $this = $(this);
            var beverage = $this.attr('data-id');
            //var quantity = parseInt($('#' + beverage + '-quantity')[0].value);
            var quantity = parseInt($('#' + beverage).attr('data-quantity'));
            var newQuantity = quantity + 1;

            if (newQuantity > -1 && newQuantity < 6) {

                changeBeverageQuantity(beverage, newQuantity);

                if ($this.hasClass('in-modal')) {
                    var thisModal = $this.closest('.modal')[0];
                    updateModalQuantityVal($(thisModal), newQuantity);
                }
            }
        });

        $('.quantity-down').click(function (e) {
            e.stopPropagation();
            var $this = $(this);
            var beverage = $this.attr('data-id');
            //var quantity = parseInt($('#' + beverage + '-quantity')[0].value);
            var quantity = parseInt($('#' + beverage).attr('data-quantity'));
            var newQuantity = quantity - 1;

            if (newQuantity > -1 && newQuantity < 6) {
                changeBeverageQuantity(beverage, newQuantity);

                if ($this.hasClass('in-modal')) {
                    var thisModal = $this.closest('.modal')[0];
                    updateModalQuantityVal($(thisModal), newQuantity);
                }
            }
        });

        $('.healthy-option').on('click', function() {
            if (store.get('swapDrink') <= 0) {
                pushToDatalayer('click', 'bbd-6-addhealthyoption');
                store.set('swapDrink', 1);
            }
        });

        // swap drink
        $('#beverage-recommendations').on('click', '.recommendation', function (e) {
            var $recommendedSelection = $(this),
                modal                 = $recommendedSelection.attr('data-modal'),
                dataId                = $recommendedSelection.attr('data-id'),
                $beverageSelection    = getBeverageSelectedElemByDataId(dataId);



            //if (store.get('swapDrink') <= 0) {
            //    //fireGATracking('swapped-drink', 'user interacted with drink swapper');
            //    pushToDatalayer('click', 'bbd-6-addhealthyoption');
            //    console.log('pushed??!!!', store.get('swapDrink'));
            //    store.set('swapDrink', 1);
            //}

            //fireGATracking('swapped-drink', 'user interacted with drink swapper');

            $(modal).on($.modal.OPEN, function (event, modal) {
                $(event.currentTarget).off('click', '.button.healthy-option').on('click', '.button.healthy-option', function () {
                    $beverageSelection.removeClass('selected');
                    $recommendedSelection.addClass('selected');
                    $recommendedSelection.html($(this).html());
                    addBeverageSaved(dataId);
                    updateSugarSavings();

                    store.set('swapDrink', (store.get('swapDrink') + 1));

                    $recommendedSelection.off('click.close').on('click.close', '.close', function (e) {
                        removeRecommendedSelection($recommendedSelection, $beverageSelection, dataId);
                    });

                    $beverageSelection.off('click.unselect').on('click.unselect', function (e) {
                        removeRecommendedSelection($recommendedSelection, $beverageSelection, dataId);
                    });

                    $.modal.close();
                });
            });
            $(modal).modal();

        });

        // Resets storage and starts from beginning
        $('#modal-close').click(function () {
            $('#video').attr('src', '');
            $.modal.close();
        });

        // Resets storage and starts from beginning
        $('#start-over').click(function () {
            //fireGATracking('start-over', 'start over the experience');
            moveToSlide(1);
            location.reload();
        });

        // Resets storage and starts from beginning
        $('.control').click(function (e) {
            e.preventDefault();
            var nextSlide = parseInt($(this).attr('data-next-slide')),
                currSlide = parseInt(store.get('currentSlide'));

            // age slide
            if ($(this).attr('id') == 'age') {
                if ($(this).hasClass('disabled')) {
                    $(this).children('.warning').show(250).delay(3000).hide(250);
                }
                else {
                    var ageGroup = store.get('ageContext');

                    if (currSlide < nextSlide) {
                        // fire extra tracking for age selection
                        //fireGATracking(('age-submitted-' + ageGroup), 'started experience w ' + ageGroup + ' age group', 'stored');

                        // fire next-page tracking event
                        //fireGATracking(getAnalyticSlideTitle(currSlide) + '-next', 'slide ' + currSlide + ' to slide ' + nextSlide);
                    }

                    moveToSlide($(this).attr('data-next-slide'));
                }
            } else {
                if ($(this).attr('id') == 'skip') {
                    if (currSlide < nextSlide) {
                        trackSkipLink(currSlide);
                    }
                }
                else {
                    if ($(this).hasClass('.healthy-btn') && nextSlide === 11) {
                        pushToDatalayer('click', 'bbd-6-addhealthyoption');
                    }
                    else if ($(this).attr('id') === 'start') {
                        pushToDatalayer('experience start', 'bbd-start');
                    }
                    else if (nextSlide === 5 || nextSlide === 7 || nextSlide === 9) {
                        trackFactSection(nextSlide);
                    }
                }

                moveToSlide(nextSlide);
            }
        });

        $('.go-recipes').click(function() {
            pushToDatalayer('click', 'bbd-7-gettherecipes');
        });

        $('.header-link').click(function() {
            pushToDatalayer('click', 'bbd-main-findalocalevent');
        });

        //Share to Social Network
        $('.share').click(function () {
            var $this     = $(this),
                social    = $this.attr('data-social'),
                url       = window.location.href,
                text      = 'I was surprised to discover how much sugar I was drinking. Break down YOUR sugar from beverages here: ' + url,
                img       = window.location.protocol + '//' + window.location.hostname + '/beverage-breakdown/images/bb-og-img.jpg',
                share_url = null;

            pushToDatalayer('share', 'bbd-7-fb-share');

            FB.ui({
                method: 'share_open_graph',
                action_type: 'og.shares',
                action_properties: JSON.stringify({
                    object : {
                        'og:url': url,
                        'og:title': 'Champions for Change',
                        'og:image': img,
                        'og:description': text,
                        'og:image:type'   :'image/jpg',
                    }
                })
            });
        });

        //Send Email Signup
        var $emailForm = $('#email-form');
        $emailForm.submit(function (e) {
            e.preventDefault();
            var first = $("#first").val();
            var last = $("#last").val();
            var email = $("#email").val();
            $("#email-form input").prop("disabled", true);
            $.ajax({
                type   : "POST",
                url    : '/wp-content/themes/revyourbev/core/functions/data-manager/submit-email.php',
                data   : {email_first: first, email_last: last, email_email: email},
                success: function (data) {
                    $emailForm.html(data);
                }
            });
        });

        $.fn.fullpage.setAllowScrolling(false);

        // adjust sugar pile's height on resize/orientationchange
        $(window).on('resize orientationchange', function () {
            SugarAnimation.adjustSugarPile(store.get('totalSugar'));
            //ContentMaxHeight.adjust();  // parameter not set: apply adjust to active fp-section
        });

    });
})(jQuery, _);
