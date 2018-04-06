// README

FYI: Click the logo to clear localStorage and start over at slide 1

* Adding beverages *

button.beverage (adds beverages to storage)
======================================================================
data-meal="breakfast"           (meal to add this beverage to)
data-name="Energy Drink"        (beverage name minus descriptors)
data-subhead="w/ Whipped Cream" (beverage descriptors minus name)
data-size="16"                  (beverage size in ounces)
data-sugar="0"                  (sugar count specific to a beverage & size)
data-sizes="[]"                 (array of possible sizes for this beverage)
data-sugars="[]"                (array of sugar content for each size of this beverage)
data-id="#beverage-element"     (id of the button element to be updated after selection from a modal)


button.selector (triggers modal with appropriate buttons/values)
======================================================================
data-modal="#tea-modal"         (ID of modal to open)
data-meal="breakfast"           (meal to add this beverage to)
data-name="Energy Drink"        (beverage name minus descriptors)
data-subhead="w/ Whipped Cream" (beverage descriptors minus name)
data-size="16"                  (beverage size in ounces)
data-sugar="0"                  (sugar count specific to a beverage & size)
data-id="#beverage-element"     (id of the main beverage element to be updated after selection from a modal)


* PAGE CONTEXT *
1. When user selects an age, a data-context="[child,teen,adult]" value is added to the body tag.  
2. Each section's headline has the following layout: 

    <h1 class="context">
        <span>Seen by everyone</span>
        <span class="child">Only seen for "child" context</span>
        <span class="teen">Only seen for "teen" context</span>
        <span class="adult">Only seen for "adult" context</span>
    </h1>