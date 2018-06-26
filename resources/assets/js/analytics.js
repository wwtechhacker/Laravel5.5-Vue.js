function getAttributeFromParent(attribute, $element) {
    var $parent = $element.closest("[data-analytics-" + attribute + "]");
    return $parent.attr("data-analytics-" + attribute);
}

function bindAnalyticsAttributes() {
    bindClicks();
    bindVisibility();
}

function bindVisibility() {
    var $visibilityElements = $('[data-analytics-visibility]');

    // if ($visibilityElements.length === 0) {
    //     return;
    // }

    $(window).on('resize scroll', function () {
        var $visibilityElements = $('[data-analytics-visibility]');
        var eventTriggered = false;
        $visibilityElements.each(function () {
            var elementTop     = $(this).offset().top;
            var elementBottom  = elementTop + ($(this).outerHeight() / 2);
            var viewportTop    = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();

            //console.log(elementBottom, viewportBottom);

            if(elementBottom < viewportBottom){
                elementToEvent($(this));
                eventTriggered = true;
                $(this).removeAttr('data-analytics-visibility');
            }
        });

        if(eventTriggered){
            $visibilityElements = $('[data-analytics-visibility]');
        }
    });
}

function elementToEvent($element){
    var category = $element.attr("data-analytics-category"),
        action   = $element.attr("data-analytics-action"),
        label    = $element.attr("data-analytics-label");

    //console.log($element);
    if (!category) {
        category = getAttributeFromParent('category', $element);
    }

    if (!action) {
        action = getAttributeFromParent('action', $element);

        if (!action) {
            action = 'click';
        }
    }

    if (!label) {
        label = getAttributeFromParent('label', $element);
    }

    fireEvent(action, category, label);
}

function bindClicks() {
    $('[data-analytics-click]').click(function () {
        var $element = $(this);

        elementToEvent($element);
    });
}

function bindVimeoVideos() {
    $(".vimeo-analytics-iframe").each(function(){
        var $this = $(this),
            iframe = $this.get(0),
            player = new Vimeo.Player(iframe),
            percentData = $this.attr("data-analytics-percents").split(","),
            finished = false,
            percents = {};

        percentData.forEach(function(item){
            percents[item] = false;
        });

        $this.on("rescue.video-closed", function(){
            percentData.forEach(function(item){
                percents[item] = false;
            });
        });

        //console.log(iframe, player);
        player.on('timeupdate', function(data) {
            var percent = data.percent * 100;

            $.each(percents, function(logPercent, bool){
                if(percent >= logPercent && percents[logPercent] === false){
                    fireEvent(logPercent + "%", "video", "wntb-61-townhall");
                    percents[logPercent] = true;
                }
            });

            if(percent > 96 && !finished){
                finished = true;
                fireEvent("complete", "video", "wntb-61-townhall");
            }

        });

    });
}

function fireEvent(action, category, label, value) {
    console.log("category: " + category + "      action: " + action + "      label: " + label);

    gtag('event', action, {
        'event_category': category,
        'event_label'   : label,
        'value'         : value
    });
}


module.exports = {
    bindAnalyticsAttributes: bindAnalyticsAttributes,
    bindVimeoVideos        : bindVimeoVideos,
    fireEvent              : fireEvent
};