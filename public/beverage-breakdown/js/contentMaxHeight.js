var ContentMaxHeight = (function($) {
    var getSectionHeight    = function(section) {
            var $section = $(section);

            if ($section.length) {
                return $section.outerHeight();
            }
            else {
                return 0;
            }
        },
        getTextRowHeight    = function(slide){
            var $textRow = $('.spacer', slide).next('.row');

            if ($textRow.length) {
                return $textRow.height();
            }
            else {
                return 0;
            }
        },
        isSwapSlide = function(slide) {
            console.log('contentMaxHeight, isSwapSlide: ', slide);
            return (slide == '#section11');
        },
        adjustMaxHeight     = function(slide) {
            var screenHeight    = $(window).height(),
                slide           = slide || '.fp-section.active',
                slideHeight     = getSectionHeight(slide),
                headerHeight    = getSectionHeight('header'),
                downArrowHeight = getSectionHeight('.down-arrow'),
                tellyHeight     = 0,
                textRowHeight   = getTextRowHeight(slide),
                maxHeight       = screenHeight - headerHeight - textRowHeight - downArrowHeight,
                $contentArea    = $('.options', slide);

            if ($contentArea.length && maxHeight > 0) {
                //console.log('max height', slide, slideHeight, headerHeight, textRowHeight, downArrowHeight);

                // total sugar count slide
                if ($('.sugar-count', slide).length) {
                    tellyHeight     = getSectionHeight(slide + ' .sugar-count');
                    maxHeight       = maxHeight - tellyHeight;

                    // swap slide: give some extra padding
                    if (isSwapSlide(slide)) {
                        //console.log('wow swap slide', maxHeight, (maxHeight - 50));

                        $contentArea.css('max-height', (maxHeight - 70) + 'px');
                    }
                    else {
                        $contentArea.css('max-height', maxHeight + 'px');
                    }
                }
                else {
                    $contentArea.css('max-height', maxHeight + 'px');
                }

            }
        };


    return {
        // function to adjust
        adjust     : adjustMaxHeight
    };

})(jQuery);