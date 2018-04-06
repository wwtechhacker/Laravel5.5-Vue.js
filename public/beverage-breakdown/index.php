<?php $version = '1.4.5'; ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>What’s Your Beverage Breakdown?</title>

    <meta name="description"
          content="Sugary drinks add up fast. Almost half of all sugar consumed in the U.S. comes from sugary drinks. Find out below how much sugar you and your family drink every day."/>
    <meta name="keywords" content=""/>
    <meta name="Resource-type" content="Document"/>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">

    <link rel="icon" type="image/png" href="/images/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/images/favicon-16x16.png" sizes="16x16">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet"/>

    <link rel="stylesheet" type="text/css" href="css/animate.css"/>
    <link rel="stylesheet" type="text/css" href="css/jquery.fullpage.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/app.css"/>
    <link rel="stylesheet" type="text/css" href="css/sugarpile.css"/>
    <link rel="stylesheet" type="text/css" href="css/pledge.css"/>
    <link rel="stylesheet" type="text/css" href="css/swap.css" />

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-N3V8636');</script>
    <!-- End Google Tag Manager -->

    <!-- Open Graph -->
    <meta property="og:title" content="What’s Your Beverage Breakdown?"/>
    <meta property="og:image" content="<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . '://' . "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>images/bb-og-img.jpg"/>
    <meta property="og:site_name" content="Champions for CHANGE"/>
    <meta property="og:description"
          content="Calories from sugary drinks add up fast. Almost half of all sugar consumed in the U.S. comes from sugary drinks. Find out below how much sugar you and your family drink every day."/>

    <!-- Twitter -->
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="What’s Your Beverage Breakdown?"/>
    <meta name="twitter:description"
          content="Calories from sugary drinks add up fast. Almost half of all sugar consumed in the U.S. comes from sugary drinks. Find out below how much sugar you and your family drink every day."/>
    <meta name="twitter:image" content=""/>

    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId            : '173990856577030',
                autoLogAppEvents : true,
                xfbml            : true,
                version          : 'v2.12'
            });
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1473770752734665');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=1473770752734665&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->

    
</head>
<body data-context="adult" data-review="good">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N3V8636"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<header class="main-nav">
    <div class="left">
        <a href="/"><img class="logo" src="images/rethink/site-logo.png" alt="Champions for Change"></a>
    </div>
    <div class="right">
        <a class="header-link" href="/#find-a-local-event">Find a Local Event</a>
    </div>
</header>

<div id="sugarpour"><img src="https://placehold.it/250/ffffff?text=+"></div>
<div id="sugarpile"></div>
<div id="gradient"></div>
<div id="fullpage">
    <!-- Start Here -->
    <div class="section" id="section1">
        <div class="spacer"></div>
        <div class="row center-row">
            <div class="small-12 large-10 column">
                <h1 class="whats-your">
                    What’s Your
                </h1>
                <div class="logo">
                    <img src="images/rethink/main-title.png" alt="Beverage Breakdown">
                    <span class="question-mark">?</span>
                </div>

                <hr class="gradient-hr"/>

                <h3 class="text-center">
                    Calories from sugary drinks add up fast. Almost half of all sugar consumed in the U.S. comes from sugary drinks. Find out below how much sugar you and your family drink every day.
                </h3>
            </div>
        </div>
        <div class="row start-btn">
            <div class="small-12 column text-center">
                <button class="circle-cta control move-to" id="start" data-next-slide="2">Start</button>
            </div>
        </div>
    </div>

    <!-- Gender & Age selection -->
    <div class="section" id="section2">
        <div class="spacer"></div>
        <div class="row center-row">
            <div class="medium-10 small-12 column">
                <h1>Start a profile:</h1>
                <hr class="gradient-hr"/>
                <h3 class="text-center">
                    Complete a profile for more accurate results, or <a href="#" class="skip-text control" id="skip" data-next-slide="3">Skip question</a>
                </h3>
            </div>
        </div>
        <div class="section-content row">
            <div class="medium-10 small-12 column center-column">
                <div class="row choice-row">
                    <div class="small-6 medium-5 columns text-center">
                        <button class="gender" name="gender" data-next-slide="3" data-gender="male" id="male">
                            <div class="icon"></div>
                            <div class="text"><span>Male</span></div>
                        </button>
                    </div>
                    <div class="small-6 medium-5 columns end text-center">
                        <button class="gender" name="gender" data-next-slide="3" data-gender="female" id="female">
                            <div class="icon"></div>
                            <div class="text"><span>Female</span></div>
                        </button>
                    </div>
                </div>
                <div class="row amp-row"><div class="amp">&</div></div>
                <div class="row choice-row">
                    <div class="small-6 medium-5 columns text-center">
                        <button class="age" name="age" data-age="child" data-next-slide="3" id="child">
                            <div class="icon"></div>
                            <div class="text"><span>Child</span></div>
                        </button>
                    </div>
                    <div class="small-6 medium-5 columns text-center">
                        <button class="age" name="age" data-age="adult" data-next-slide="3" id="adult">
                            <div class="icon"></div>
                            <div class="text">
                                <span>Adult</span>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row control-row">
            <div class="small-12 column text-center">
                <button class="control back-button move-to " data-next-slide="1">
                    <i class="fa fa-chevron-circle-up fa-3x show-for-small-down" aria-hidden="true"></i>
                    <p class="show-for-medium-up">Go Back</p>
                </button>

                <button class="control disabled" data-next-slide="3" id="age">
                    <i class="fa fa-chevron-circle-down fa-3x" aria-hidden="true"></i>
                    <div class="warning">Please select an option above</div>
                </button>
            </div>
        </div>
    </div>

    <!-- Morning Drink  -->
    <div class="section" id="section3">
        <div class="spacer"></div>
        <div class="row center-row">
            <div class="medium-10 small-12 large-centered medium-centered column">
                <h1 class="context">
                    <span class="child">What do you drink in the morning?</span>
                    <span class="adult">What do you drink in the morning?</span>
                </h1>
                <hr class="gradient-hr"/>
                <h3>Add your morning drinks below, or <a href="#" class="skip-text control" id="skip" data-next-slide="9">Skip to drink total</a></h3>
            </div>
        </div>
        <div class="row selection-content">
            <div class="small-12 large-10 column center-column">
                <div class="row choice-row options">

                    <!-- water -->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#generic-modal" data-id="b5" data-name="Water"
                             data-subhead="" data-icon="water" data-size="0" data-sizes="[8,16,24]" data-sugars="[0,0,0]"
                             data-quantity="1" id="b5">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-water.png" alt="Tea" id="b5-icon"/></div>
                                <div class="text"><span id="b5-name">Water</span><span id="b5-subhead"
                                                                                       class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="b5"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity">
                                        <input id="b5-quantity" type="number" min="1" max="5" value="1"/>
                                    </div>
                                    <div class="quantity-down" data-id="b5"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="b5"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="b5-size"></select>
                                    </div>
                                    <div class="size-down" data-id="b5"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- tea -->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#tea-modal" data-id="b2" data-name="" data-subhead=""
                             data-icon="black-coffee" data-size="1" data-sizes="[]" data-sugars="[]" data-quantity="1"
                             id="b2">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-unsweetened-tea.png" alt="Tea" id="b2-icon"/>
                                </div>
                                <div class="text"><span id="b2-name">Tea</span><span id="b2-subhead" class="sub"></span>
                                </div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="b2"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="b2-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="b2"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="b2"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="b2-size"></select>
                                    </div>
                                    <div class="size-down" data-id="b2"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- juice -->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#generic-modal" data-id="b7" data-name="Juice"
                             data-subhead="" data-icon="fruit-juice" data-size="0" data-sizes="[6,12,20]" data-sugars="[4,8,14]"
                             data-quantity="1" id="b7">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-fruit-juice.png" alt="Juice" id="b7-icon"/>
                                </div>
                                <div class="text"><span id="b7-name">Juice</span><span id="b7-subhead"
                                                                                       class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="b7"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="b7-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="b7"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="b7"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="b7-size"></select>
                                    </div>
                                    <div class="size-down" data-id="b7"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- energy -->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#generic-modal" data-id="b3" data-name="Energy Drink" data-subhead=""
                             data-icon="energy-drink" data-size="0" data-sizes="[8,16,24]" data-sugars="[7,15,20]"
                             data-quantity="1" id="b3">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-energy-drink.png" alt="Energy Drink"
                                                       id="b3-icon"/></div>
                                <div class="text"><span id="b3-name">Energy</span><span id="b3-subhead"
                                                                                        class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="b3"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="b3-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="b3"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="b3"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="b3-size"></select>
                                    </div>
                                    <div class="size-down" data-id="b3"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- coffee -->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#coffee-modal" data-id="b1" data-name=""
                             data-subhead="" data-icon="black-coffee" data-size="1" data-sizes="[]" data-sugars="[]"
                             data-quantity="1" id="b1">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-black-coffee.png" alt="Black Coffee"
                                                       id="b1-icon"/></div>
                                <div class="text"><span id="b1-name">Coffee</span><span id="b1-subhead"
                                                                                        class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="b1"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="b1-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="b1"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="b1"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="b1-size"></select>
                                    </div>
                                    <div class="size-down" data-id="b1"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- soda -->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#soda-modal" data-id="b8" data-name="Soda"
                             data-subhead="" data-icon="cola-soda" data-size="1" data-sizes="[]" data-sugars="[]"
                             data-quantity="1" id="b8">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-cola-soda.png" alt="Soda" id="b8-icon"/></div>
                                <div class="text"><span id="b8-name">Soda</span><span id="b8-subhead"
                                                                                      class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="b8"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="b8-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="b8"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="b8"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="b8-size"></select>
                                    </div>
                                    <div class="size-down" data-id="b8"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- milk -->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#milk-modal" data-id="b6" data-name="Milk"
                             data-subhead="" data-icon="milk" data-size="1" data-sizes="[]" data-sugars="[]"
                             data-quantity="1" id="b6">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-milk.png" alt="Milk" id="b6-icon"/></div>
                                <div class="text"><span id="b6-name">Milk</span><span id="b6-subhead"
                                                                                      class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="b6"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="b6-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="b6"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="b6"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="b6-size"></select>
                                    </div>
                                    <div class="size-down" data-id="b6"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- sport -->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#generic-modal" data-id="b4" data-name="Sports Drink" data-subhead=""
                             data-icon="sports-drink" data-size="0" data-sizes="[8,12,20,32]" data-sugars="[3,5,9,14]"
                             data-quantity="1" id="b4">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-sports-drink.png" alt="Sports Drink"
                                                       id="b4-icon"/></div>
                                <div class="text"><span id="b4-name">Sports Drink</span><span id="b4-subhead"
                                                                                              class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="b4"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="b4-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="b4"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="b4"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="b4-size"></select>
                                    </div>
                                    <div class="size-down" data-id="b4"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="page-control-div small-12 column">
                <button class="circle-cta control" data-next-slide="4">
                    Next
                </button>
                <button class="control back-button" data-next-slide="2">
                    <p>Go Back</p>
                </button>
            </div>
        </div>
    </div>

    <!-- Info 1 -->
    <div class="section info-section info-1" id="section4">
        <div class="row spacer"></div>
        <div class="row info-content">
            <div class="main-column mobile-main small-12 column">
                <h1 class="context">Did You Know?</h1>
                <hr class="gradient-hr"/>
                <h2>Sugary drinks are the largest contributor of sugar to American diets.</h2>
                <div class="info-img"></div>
                <a href="#" class="control" data-next-slide="5">Continue <i class="fa fa-angle-right"></i></a>
            </div>
            <div class="main-column desktop-main small-12 column">
                <div class="left">
                    <div class="info-img"></div>
                </div>
                <div class="right">
                    <h1 class="context">Did You Know?</h1>
                    <hr class="gradient-hr"/>
                    <h2>Sugary drinks are the largest contributor of sugar to American diets.</h2>
                    <a href="#" class="control" data-next-slide="5">Continue <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Lunch Drink Selection -->
    <div class="section" id="section5">
        <div class="row spacer"></div>
        <div class="row center-row">
            <div class="small-12 medium-10 column">
                <h1 class="context">
                    <span class="child">What do you drink in the afternoon?</span>
                    <span class="teen adult">What do you drink in the afternoon?</span>
                </h1>
                <hr class="gradient-hr"/>
                <h3>Add your afternoon drinks below, or <a href="#" class="skip-text control" id="skip" data-next-slide="9">Skip to drink total</a></h3>
            </div>
        </div>
        <div class="row selection-content">
            <div class="small-12 large-10 column center-column">
                <div class="row choice-row options">

                    <!-- Water -->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#generic-modal" data-id="l5" data-name="Water"
                             data-subhead="" data-icon="water" data-size="0" data-sizes="[8,16,24]" data-sugars="[0,0,0]"
                             data-quantity="1" id="l5">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-water.png" alt="Tea" id="l5-icon"/></div>
                                <div class="text"><span id="l5-name">Water</span><span id="l5-subhead"
                                                                                       class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="l5"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="l5-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="l5"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="l5"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="l5-size"></select>
                                    </div>
                                    <div class="size-down" data-id="l5"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tea -->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#tea-modal" data-id="l2" data-name="" data-subhead=""
                             data-icon="black-coffee" data-size="1" data-sizes="[]" data-sugars="[]" data-quantity="1"
                             id="l2">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-unsweetened-tea.png" alt="Tea" id="l2-icon"/>
                                </div>
                                <div class="text"><span id="l2-name">Tea</span><span id="l2-subhead" class="sub"></span>
                                </div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="l2"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="l2-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="l2"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="l2"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="l2-size"></select>
                                    </div>
                                    <div class="size-down" data-id="l2"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Juice -->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#generic-modal" data-id="l7" data-name="Juice"
                             data-subhead="" data-icon="fruit-juice" data-size="0" data-sizes="[6,12,20]" data-sugars="[4,8,14]"
                             data-quantity="1" id="l7">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-fruit-juice.png" alt="Juice" id="l7-icon"/>
                                </div>
                                <div class="text"><span id="l7-name">Juice</span><span id="l7-subhead"
                                                                                       class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="l7"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="l7-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="l7"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="l7"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="l7-size"></select>
                                    </div>
                                    <div class="size-down" data-id="l7"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Energy -->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#generic-modal" data-id="l3" data-name="Energy Drink" data-subhead=""
                             data-icon="energy-drink" data-size="0" data-sizes="[8,16,24]" data-sugars="[7,15,20]"
                             data-quantity="1" id="l3">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-energy-drink.png" alt="Energy Drink"
                                                       id="l3-icon"/></div>
                                <div class="text"><span id="l3-name">Energy Drink</span><span id="l3-subhead"
                                                                                              class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="l3"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="l3-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="l3"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="l3"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="l3-size"></select>
                                    </div>
                                    <div class="size-down" data-id="l3"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Coffee -->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#coffee-modal" data-id="l1" data-name=""
                             data-subhead="" data-icon="black-coffee" data-size="1" data-sizes="[]" data-sugars="[]"
                             data-quantity="1" id="l1">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-black-coffee.png" alt="Black Coffee"
                                                       id="l1-icon"/></div>
                                <div class="text"><span id="l1-name">Coffee</span><span id="l1-subhead"
                                                                                        class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="l1"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="l1-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="l1"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="l1"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="l1-size"></select>
                                    </div>
                                    <div class="size-down" data-id="l1"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Soda -->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#soda-modal" data-id="l8" data-name="Soda"
                             data-subhead="" data-icon="cola-soda" data-size="1" data-sizes="[]" data-sugars="[]"
                             data-quantity="1" id="l8">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-cola-soda.png" alt="Soda" id="l8-icon"/></div>
                                <div class="text"><span id="l8-name">Soda</span><span id="l8-subhead"
                                                                                      class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="l8"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="l8-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="l8"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="l8"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="l8-size"></select>
                                    </div>
                                    <div class="size-down" data-id="l8"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Milk -->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#milk-modal" data-id="l6" data-name="Milk"
                             data-subhead="" data-icon="milk" data-size="1" data-sizes="[]" data-sugars="[]"
                             data-quantity="1" id="l6">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-milk.png" alt="Milk" id="l6-icon"/></div>
                                <div class="text"><span id="l6-name">Milk</span><span id="l6-subhead"
                                                                                      class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="l6"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="l6-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="l6"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="l6"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="l6-size"></select>
                                    </div>
                                    <div class="size-down" data-id="l6"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sport -->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#generic-modal" data-id="l4" data-name="Sports Drink" data-subhead=""
                             data-icon="sports-drink" data-size="1" data-sizes="[8,12,20,32]" data-sugars="[3,5,9,14]"
                             data-quantity="1" id="l4">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-sports-drink.png" alt="Sports Drink"
                                                       id="l4-icon"/></div>
                                <div class="text"><span id="l4-name">Sports Drink</span><span id="l4-subhead"
                                                                                              class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="l4"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="l4-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="l4"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="l4"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="l4-size"></select>
                                    </div>
                                    <div class="size-down" data-id="l4"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="page-control-div small-12 column">
                <button class="circle-cta control" data-next-slide="6">
                    Next
                </button>
                <button class="control back-button" data-next-slide="3">
                    <p>Go Back</p>
                </button>
            </div>

        </div>
    </div>

    <!-- Info 2 - after lunch -->
    <div class="section info-section info-2" id="section6">
        <div class="spacer"></div>
        <div class="row spacer"></div>
        <div class="row info-content">
            <div class="main-column mobile-main small-12 column">
                <h1 class="context">Did You Know?</h1>
                <hr class="gradient-hr"/>
                <h2>Not only is water refreshing, it also flushes toxins from your body, carries nutrients to your cells, and helps your body feel great.</h2>
                <div class="info-img"></div>
                <a href="#" class="control" data-next-slide="7">Continue <i class="fa fa-angle-right"></i></a>
            </div>

            <div class="main-column desktop-main small-12 column">
                <div class="left">
                    <div class="info-img"></div>
                </div>
                <div class="right">
                    <h1 class="context">Did You Know?</h1>
                    <hr class="gradient-hr"/>
                    <h2>Not only is water refreshing, it also flushes toxins from your body, carries nutrients to your cells, and helps your body feel great.</h2>
                    <a href="#" class="control" data-next-slide="7">Continue <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Night time drink -->
    <div class="section" id="section7">
        <div class="spacer"></div>
        <div class="row center-row">
            <div class="small-12 medium-10 column">
                <h1 class="context">
                    <span class="child">What do you drink at night?</span>
                    <span class="teen adult">What do you drink at night?</span>
                </h1>
                <hr class="gradient-hr"/>
                <h3>Add your evening drinks below, or <a href="#" class="skip-text control" id="skip" data-next-slide="9">Skip to drink total</a></h3>
            </div>
        </div>
        <div class="row selection-content">
            <div class="small-12 large-10 column center-column">
                <div class="choice-row row options">

                    <!--water-->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#generic-modal" data-id="d5" data-name="Water"
                             data-subhead="" data-icon="water" data-size="0" data-sizes="[8,16,24]" data-sugars="[0,0,0]"
                             data-quantity="1" id="d5">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-water.png" alt="Water" id="d5-icon"/></div>
                                <div class="text"><span id="d5-name">Water</span><span id="d5-subhead"
                                                                                       class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="d5"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="d5-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="d5"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="d5"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="d5-size"></select>
                                    </div>
                                    <div class="size-down" data-id="d5"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--tea-->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#tea-modal" data-id="d2" data-name="" data-subhead=""
                             data-icon="unsweetened-tea" data-size="1" data-sizes="[]" data-sugars="[]"
                             data-quantity="1" id="d2">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-unsweetened-tea.png" alt="Tea" id="d2-icon"/>
                                </div>
                                <div class="text"><span id="d2-name">Tea</span><span id="d2-subhead" class="sub"></span>
                                </div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="d2"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="d2-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="d2"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="d2"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="d2-size"></select>
                                    </div>
                                    <div class="size-down" data-id="d2"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--juice-->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#generic-modal" data-id="d7" data-name="Juice"
                             data-subhead="" data-icon="fruit-juice" data-size="0" data-sizes="[6,12,20]" data-sugars="[4,8,14]"
                             data-quantity="1" id="d7">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-fruit-juice.png" alt="Juice" id="d7-icon"/>
                                </div>
                                <div class="text"><span id="d7-name">Juice</span><span id="d7-subhead"
                                                                                       class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="d7"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="d7-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="d7"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="d7"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="d7-size"></select>
                                    </div>
                                    <div class="size-down" data-id="d7"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--energy-->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#generic-modal" data-id="d3" data-name="Energy Drink" data-subhead=""
                             data-icon="energy-drink" data-size="0" data-sizes="[8,16,24]" data-sugars="[7,15,20]"
                             data-quantity="1" id="d3">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-energy-drink.png" alt="Energy Drink"
                                                       id="d3-icon"/></div>
                                <div class="text"><span id="d3-name">Energy Drink</span><span id="d3-subhead"
                                                                                              class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="d3"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="d3-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="d3"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="d3"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="d3-size"></select>
                                    </div>
                                    <div class="size-down" data-id="d3"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- coffee-->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#coffee-modal" data-id="d1" data-name=""
                             data-subhead="" data-icon="black-coffee" data-size="1" data-sizes="[]" data-sugars="[]"
                             data-quantity="1" id="d1">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-black-coffee.png" alt="Black Coffee"
                                                       id="d1-icon"/></div>
                                <div class="text"><span id="d1-name">Coffee</span><span id="d1-subhead"
                                                                                        class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="d1"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="d1-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="d1"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="d1"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="d1-size"></select>
                                    </div>
                                    <div class="size-down" data-id="d1"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--soda-->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#soda-modal" data-id="d8" data-name="Soda"
                             data-subhead="" data-icon="cola-soda" data-size="1" data-sizes="[]" data-sugars="[]"
                             data-quantity="1" id="d8">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-cola-soda.png" alt="Soda" id="d8-icon"/></div>
                                <div class="text"><span id="d8-name">Soda</span><span id="d8-subhead"
                                                                                      class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="d8"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="d8-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="d8"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="d8"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="d8-size"></select>
                                    </div>
                                    <div class="size-down" data-id="d8"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--mlik-->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#milk-modal" data-id="d6" data-name="Milk"
                             data-subhead="" data-icon="milk" data-size="1" data-sizes="[]" data-sugars="[]"
                             data-quantity="1" id="d6">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-milk.png" alt="Milk" id="d6-icon"/></div>
                                <div class="text"><span id="d6-name">Milk</span><span id="d6-subhead"
                                                                                      class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="d6"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="d6-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="d6"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="d6"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="d6-size"></select>
                                    </div>
                                    <div class="size-down" data-id="d6"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--sport-->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#generic-modal" data-id="d4" data-name="Sports Drink" data-subhead=""
                             data-icon="sports-drink" data-size="1" data-sizes="[8,12,20,32]" data-sugars="[3,5,9,14]"
                             data-quantity="1" id="d4">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-sports-drink.png" alt="Sports Drink"
                                                       id="d4-icon"/></div>
                                <div class="text"><span id="d4-name">Sports Drink</span><span id="d4-subhead"
                                                                                              class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="d4"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="d4-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="d4"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="d4"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="d4-size"></select>
                                    </div>
                                    <div class="size-down" data-id="d4"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="page-control-div small-12 column">
                <button class="circle-cta control" data-next-slide="8">
                    Next
                </button>
                <button class="control back-button" data-next-slide="5">
                    <p>Go Back</p>
                </button>
            </div>
        </div>
    </div>

    <!-- Info 3 - after dinner -->
    <div class="section info-section info-3" id="section8">
        <div class="row spacer"></div>
        <div class="row info-content">
            <div class="main-column mobile-main small-12 column">
                <h1 class="context">Did You Know?</h1>
                <hr class="gradient-hr"/>
                <h2>Drinking sugary drinks increases your risk for developing type 2 diabetes.</h2>
                <div class="info-img"></div>
                <a href="#" class="control" data-next-slide="9">Continue <i class="fa fa-angle-right"></i></a>
            </div>

            <div class="main-column desktop-main small-12 column">
                <div class="left">
                    <div class="info-img"></div>
                </div>
                <div class="right">
                    <h1 class="context">Did You Know?</h1>
                    <hr class="gradient-hr"/>
                    <h2>Drinking sugary drinks increases your risk for developing type 2 diabetes.</h2>
                    <a href="#" class="control" data-next-slide="9">Continue <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Miss Anything? -->
    <div class="section" id="section9">
        <div class="spacer"></div>
        <div class="row center-row">
            <div class="small-12 medium-10 center-column column">
                <h1 class="context">
                    <span class="child">Miss Anything?</span>
                    <span class="teen adult">Miss Anything?</span>
                </h1>
                <hr class="gradient-hr"/>
                <h3>Add any drinks you might have missed below.</h3>
            </div>
        </div>
        <div class="row selection-content">
            <div class="small-12 large-10 center-column column">
                <div class="choice-row row options">

                    <!--water-->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#generic-modal" data-id="s5" data-name="Water"
                             data-subhead="" data-icon="water" data-size="0" data-sizes="[8,16,24]" data-sugars="[0,0,0]"
                             data-quantity="1" id="s5">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-water.png" alt="Tea" id="s5-icon"/></div>
                                <div class="text"><span id="s5-name">Water</span><span id="s5-subhead"
                                                                                       class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="s5"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="s5-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="s5"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="s5"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="s5-size"></select>
                                    </div>
                                    <div class="size-down" data-id="s5"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- tea -->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#tea-modal" data-id="s2" data-name="" data-subhead=""
                             data-icon="unsweetened-tea" data-size="1" data-sizes="[]" data-sugars="[]"
                             data-quantity="1" id="s2">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-unsweetened-tea.png" alt="Tea" id="s2-icon"/>
                                </div>
                                <div class="text"><span id="s2-name">Tea</span><span id="s2-subhead" class="sub"></span>
                                </div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="s2"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="s2-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="s2"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="s2"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="s2-size"></select>
                                    </div>
                                    <div class="size-down" data-id="s2"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Juice -->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#generic-modal" data-id="s7" data-name="Juice"
                             data-subhead="" data-icon="fruit-juice" data-size="0" data-sizes="[6,12,20]" data-sugars="[4,8,14]"
                             data-quantity="1" id="s7">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-fruit-juice.png" alt="Juice" id="s7-icon"/>
                                </div>
                                <div class="text"><span id="s7-name">Juice</span><span id="s7-subhead"
                                                                                       class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="s7"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="s7-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="s7"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="s7"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="s7-size"></select>
                                    </div>
                                    <div class="size-down" data-id="s7"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- energy -->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#generic-modal" data-id="s3" data-name="Energy Drink" data-subhead=""
                             data-icon="energy-drink" data-size="0" data-sizes="[8,16,24]" data-sugars="[7,15,20]"
                             data-quantity="1" id="s3">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-energy-drink.png" alt="Energy Drink"
                                                       id="s3-icon"/></div>
                                <div class="text"><span id="s3-name">Energy Drink</span><span id="s3-subhead"
                                                                                              class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="s3"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="s3-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="s3"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="s3"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="s3-size"></select>
                                    </div>
                                    <div class="size-down" data-id="s3"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- coffee -->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#coffee-modal" data-id="s1" data-name=""
                             data-subhead="" data-icon="black-coffee" data-size="1" data-sizes="[]" data-sugars="[]"
                             data-quantity="1" id="s1">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-black-coffee.png" alt="Black Coffee"
                                                       id="s1-icon"/></div>
                                <div class="text"><span id="s1-name">Coffee</span><span id="s1-subhead"
                                                                                        class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="s1"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="s1-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="s1"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="s1"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="s1-size"></select>
                                    </div>
                                    <div class="size-down" data-id="s1"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- soda -->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#soda-modal" data-id="s8" data-name="Soda"
                             data-subhead="" data-icon="cola-soda" data-size="1" data-sizes="[]" data-sugars="[]"
                             data-quantity="1" id="s8">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-cola-soda.png" alt="Soda" id="s8-icon"/></div>
                                <div class="text"><span id="s8-name">Soda</span><span id="s8-subhead"
                                                                                      class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="s8"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="s8-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="s8"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="s8"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="s8-size"></select>
                                    </div>
                                    <div class="size-down" data-id="s8"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- milk -->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#milk-modal" data-id="s6" data-name="Milk"
                             data-subhead="" data-icon="milk" data-size="1" data-sizes="[]" data-sugars="[]"
                             data-quantity="1" id="s6">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-milk.png" alt="Milk" id="s6-icon"/></div>
                                <div class="text"><span id="s6-name">Milk</span><span id="s6-subhead"
                                                                                      class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="s6"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="s6-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="s6"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="s6"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="s6-size"></select>
                                    </div>
                                    <div class="size-down" data-id="s6"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--sport-->
                    <div class="small-6 medium-5 columns">
                        <div class="button selector" data-modal="#generic-modal" data-id="s4" data-name="Sports Drink" data-subhead=""
                             data-icon="sports-drink" data-size="1" data-sizes="[8,12,20,32]" data-sugars="[3,5,9,14]"
                             data-quantity="1" id="s4">
                            <div class="beverage-name">
                                <div class="icon"><img src="images/icon-sports-drink.png" alt="Sports Drink"
                                                       id="s4-icon"/></div>
                                <div class="text"><span id="s4-name">Sports Drink</span><span id="s4-subhead"
                                                                                              class="sub"></span></div>
                            </div>
                            <div class="beverage-attributes">
                                <div class="beverage-quantity">
                                    <div class="quantity-up" data-id="s4"><i class="fa fa-chevron-up"
                                                                             aria-hidden="true"></i></div>
                                    <div class="quantity"><input id="s4-quantity" type="number" min="1" max="5"
                                                                 value="1"/></div>
                                    <div class="quantity-down" data-id="s4"><i class="fa fa-chevron-down"
                                                                               aria-hidden="true"></i></div>
                                </div>
                                <div class="beverage-size">
                                    <div class="size-up" data-id="s4"><i class="fa fa-chevron-up"
                                                                         aria-hidden="true"></i></div>
                                    <div class="size">
                                        <select id="s4-size"></select>
                                    </div>
                                    <div class="size-down" data-id="s4"><i class="fa fa-chevron-down"
                                                                           aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="page-control-div small-12 column">
                <button class="circle-cta control " data-next-slide="10">
                    Next
                </button>
                <button class="control back-button " data-next-slide="7">
                    <p>Go Back</p>
                </button>
            </div>
        </div>
    </div>

    <!-- Total Sugar -->
    <div class="section summary-section" id="section10">
        <div class="spacer"></div>
        <div class="page-title">
            <span class="pre-title">Your</span>
            <img src="images/rethink/main-title.png" alt="Beverage Breakdown">
        </div>

        <div class="row">
            <!-- result image and amount -->
            <div class="small-12 column sugar-result">
                <div class="row options align-middle">
                    <div class="small-5 medium-6 column text-center icon-col">
                        <div id="beverages-icons"></div>
                    </div>
                    <div class="small-6 columns end sugar-amt">
                        <div class="sugar-count circle-div">
                            <div>
                                <h2 class="sugar-total">0</h2>
                                <p>Teaspoons</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- result text -->
            <div class="large-8 medium-10 small-12 center-column column">
                <div class="row options results">
                    <div class="small-12 column text-center context-column">
                        <span class="context good">
                            <?php foreach (['child', 'adult'] as $type) : ?>
                                <h3 class="<?php echo $type ?>">Great job. In one day, you drink <span class="heavy"><span class="sugar-total">0</span> teaspoons</span> of added sugar<sup>*</sup>. Consuming more than <span class="heavy"><span class="max-sugar">6</span> teaspoons</span> of added sugar a day can cause health problems <?php echo $type === 'adult' ? 'in an' : 'for a' ?> <?php echo $type ?>. <span class="swap-cta">Tap “Add Healthy Options” to learn about other healthy ways to ReThink your Drink</span></h3>
                            <?php endforeach; ?>
                        </span>
                        <span class="context bad">
                            <?php foreach (['child', 'adult'] as $type) : ?>
                                <h3 class="<?php echo $type ?>"> Time to Rethink Your Drink. You drink <span class="heavy"><span class="sugar-total">0</span></span> teaspoons of added sugar<sup>*</sup> in one day. Reduced sugar consumption is important to living a healthier lifestyle.</h3>
                            <?php endforeach; ?>
                        </span>
                        <div class="disclaimer">
                            <p><sup>*</sup>Total added sugar listed is representative of drinks selected within the options provided</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="small-12 large-8 column user-control center-column">
                <button class="healthy-btn control" data-next-slide="11">
                    Add healthy options
                </button>
                <button class="control back-button " data-next-slide="9">
                    <p class="show-for-medium-up">Go Back</p>
                </button>
            </div>

            <div class="small-12 column endpage-ctas-col">
                <a href="#" class="btn endpage-btn share" data-social="facebook">
                    <i class="fa fa-facebook-square"></i> Share Now <i class="fa fa-angle-right"></i>
                </a>
                <a href="https://cachampionsforchange.cdph.ca.gov/en/tips/Pages/Choose-Water.aspx" class="btn go-recipes">View ALL Recipes</a>

            </div>

        </div>
    </div>

    <!-- Rethink Your Drink (the "change" page) -->
    <div class="section" id="section11">
        <div class="spacer"></div>
        <div class="row center-row">
            <div class="medium-10 small-12 column title-column">
                <h1 class="context">
                    <span class="child">Rethink your drink</span>
                    <span class="adult">Rethink your drink</span>
                </h1>

                <hr class="gradient-hr" />
                <h3>Swap out your selections for healthier options to see the impact you can make.</h3>
            </div>
        </div>
        <div class="row">

            <div class="small-12 medium-10 column center-column">
                <div class="row">
                    <div class="small-6 column text-center selection-column">
                        <h2 class="selection-text">Your Selections</h2>
                    </div>
                    <div class="small-6 column text-center selection-column">
                        <h2 class="selection-text">Healthier Selections</h2>
                    </div>
                </div>

                <div class="row options choice-row">
                    <div class="small-6 column text-center selection-column">
                        <ul id="beverage-selections"></ul>
                    </div>
                    <div class="small-6 column text-center recommend-col selection-column">
                        <ul id="beverage-recommendations"></ul>
                    </div>
                </div>

                <div class="row small-collapse medium-uncollapse">
                    <div class="small-12 column sugar-count-column">
                        <div class="sugar-count">
                            <h4 class="sugar-result">
                                <span>This change would cut down</span>
                                <div class="circle-div" id="savings-total" data-savings="0"><span>0</span></div>
                                <span class="teaspoons">teaspoons of sugar</span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="page-control-div small-12 column">
                <button class="circle-cta control" data-next-slide="12">
                    Next
                </button>
            </div>
        </div>
    </div>


    <!-- Final Page -->
    <div class="section" id="section12">
        <div class="spacer"></div>

        <div class="row">
            <!-- result image and amount -->
            <div class="small-10 large-6 center-column final-result-col column">
                <div class="circle-div" data-savings="0">
                    <span class="summary-save-total" data-savings="0">
                        0
                    </span>
                    <span class="teaspoons">teaspoons</span>
                </div>
                <div class="final-summary">
                    <p>Integrating just these <span class="total-swapped">3</span> healthy alternatives could save you up to <span class="summary-save-total">0</span> teaspoons of sugar DAILY</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="small-12 column endpage-ctas-col">
                <a href="#" class="btn endpage-btn share" data-social="facebook">
                    <i class="fa fa-facebook-square"></i> Share Now <i class="fa fa-angle-right"></i>
                </a>
                <a href="/resources" class="btn go-recipes">View ALL Recipes</a>

            </div>
        </div>
    </div>


</div>

<!-- Coffee Modal -->
<div class="modal drink-modal" id="coffee-modal" style="display: none;">
    <h2 class="modal-title">Coffee</h2>
    <div class="row">
        <div class="small-12 large-centered medium-centered column">
            <div class="row options">
                <!-- Black Coffee -->
                <div class="large-6 medium-6 small-12 columns">
                    <div class="button beverage" data-id="" data-name="Black Coffee" data-subhead=""
                         data-icon="black-coffee" data-size="0" data-sizes="[8,12,16,24]" data-sugars="[0,0,0,0]">
                        <div class="beverage-name">
                            <div class="icon"><img src="images/icon-black-coffee.png" alt="Black Coffee"/></div>
                            <div class="text"><span>Black Coffee</span></div>
                        </div>
                    </div>
                </div>

                <!-- w. Milk and Sugar -->
                <div class="medium-6 small-12 columns">
                    <div class="button beverage modal-btn" data-id="" data-name="Hot Coffee" data-subhead="w/ Milk &amp; Sugar"
                         data-icon="black-coffee" data-size="1" data-sizes="[8,12,16]" data-sugars="[4,5,8]">
                        <div class="beverage-name">
                            <div class="icon"><img src="images/icon-black-coffee.png"
                                                   alt="Hot Coffee w/ Milk &amp; Sugar"/></div>
                            <div class="text">
                                <span>Hot Coffee</span> <span class="sub">w/ Milk &amp; Sugar</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Frappe w/ Whipped Cream -->
                <div class="medium-6 small-12 columns">
                    <div class="button beverage modal-btn" data-id="" data-name="Caramel Frappe" data-subhead="w/ Whipped Cream"
                         data-icon="caramel-frappe" data-size="0" data-sizes="[8,12,16,24]" data-sugars="[8,10,16,19]">
                        <div class="beverage-name">
                            <div class="icon"><img src="images/icon-caramel-frappe.png"
                                                   alt="Frappe w/ Whipped Cream"/></div>
                            <div class="text">
                                <span>Frappe</span> <span class="sub">w/ Whipped Cream</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Flavored Latte w/ Whipped Cream -->
                <div class="medium-6 small-12 columns">
                    <div class="button beverage modal-btn" data-id="" data-name="Flavored Latte" data-subhead="w/ Whipped Cream"
                         data-icon="pumpkin-spice" data-size="0" data-sizes="[8,12,16,24]" data-sugars="[5,8,11,16]">
                        <div class="beverage-name">
                            <div class="icon"><img src="images/icon-pumpkin-spice.png"
                                                   alt="Flavored Latte"/></div>
                            <div class="text">
                                <span>Flavored Latte</span> <span class="sub">w/ Whipped Cream</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Quantity-->
    <div class="row">
        <div class="small-12 column">
            <div class="beverage-attributes init-hidden hidden">
                <div class="beverage-quantity">
                    <div class="quantity-up in-modal" data-id="">
                        <i class="fa fa-chevron-up" aria-hidden="true"></i>
                    </div>
                    <div class="quantity">
                        <input class="modal-quantity" type="number" min="1" max="5" value="1"/>
                    </div>
                    <div class="quantity-down in-modal" data-id="">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="beverage-size">
                    <div class="size-up in-modal" data-id="">
                        <i class="fa fa-chevron-up" aria-hidden="true"></i>
                    </div>
                    <div class="size">
                        <select class="modal-size"></select>
                    </div>
                    <div class="size-down in-modal" data-id="">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Done Button -->
    <div class="row">
        <div class="large-centered medium-centered column">
            <a href="#close" class="button close-button" rel="modal:close">Done</a>
        </div>
    </div>
</div>

<!-- Tea Modal -->
<div class="modal drink-modal" id="tea-modal" style="display: none;">
    <h2 class="modal-title">Tea</h2>
    <div class="row">
        <div class="large-10 small-12 center-column column">
            <div class="row options">
                <div class="medium-6 small-12 columns">
                    <div class="button beverage modal-btn" data-modal-id="tea-modal" data-id="" data-name="Sweet Tea" data-subhead="" data-icon="sweet-tea"
                         data-size="0" data-sizes="[8,16,20,30]" data-sugars="[4,9,13,17]">
                        <div class="beverage-name">
                            <div class="icon"><img src="images/icon-sweet-tea.png" alt="Sweet Tea"/></div>
                            <div class="text"><span>Sweet Tea</span></div>
                        </div>
                    </div>
                </div>

                <div class="medium-6 small-12 columns">
                    <div class="button beverage modal-btn" data-modal-id="tea-modal" data-id="" data-name="Unsweetened Tea" data-subhead=""
                         data-icon="unsweetened-tea" data-size="1" data-sizes="[8,16,24]" data-sugars="[0,0,0]">
                        <div class="beverage-name">
                            <div class="icon"><img src="images/icon-unsweetened-tea.png" alt="Unsweetened Tea"/></div>
                            <div class="text"><span class="">Unsweetened Tea</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quantity-->
    <div class="row">
        <div class="small-12 column">
            <div class="beverage-attributes init-hidden hidden">
                <div class="quanity-container">
                    <div class="beverage-quantity">
                        <div class="quantity-up in-modal" data-id="">
                            <i class="fa fa-chevron-up" aria-hidden="true"></i>
                        </div>
                        <div class="quantity">
                            <input class="modal-quantity" type="number" min="1" max="5" value="1"/>
                        </div>
                        <div class="quantity-down in-modal" data-id="">
                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="size-container">
                    <div class="beverage-size">
                        <div class="size-up in-modal" data-id="">
                            <i class="fa fa-chevron-up" aria-hidden="true"></i>
                        </div>
                        <div class="size">
                            <select class="modal-size"></select>
                        </div>
                        <div class="size-down in-modal" data-id="">
                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Done Button -->
    <div class="row">
        <div class="small-12 column">
            <a href="#close" class="button close-button" rel="modal:close">Done</a>
        </div>
    </div>
</div>

<!-- Soda Modal -->
<div class="modal drink-modal" id="soda-modal" style="display: none;">
    <h2 class="modal-title">Soda</h2>
    <div class="row">
        <div class="column">
            <div class="row options">

                <!-- Diet Soda -->
                <div class="medium-6 small-12 columns">
                    <div class="button beverage modal-btn" data-id="" data-name="Diet Soda" data-subhead="" data-icon="diet-soda"
                         data-size="1" data-sizes="[8,12,20,32]" data-sugars="[0,0,0,0]">
                        <div class="beverage-name">
                            <div class="icon"><img src="images/icon-diet-soda.png" alt="Diet Soda"/></div>
                            <div class="text">Diet Soda</div>
                        </div>
                    </div>
                </div>

                <!-- Cola Soda -->
                <div class="medium-6 small-12 columns">
                    <div class="button beverage modal-btn" data-id="" data-name="Cola Soda" data-subhead="" data-icon="cola-soda"
                         data-size="1" data-sizes="[8,12,20,32]" data-sugars="[5,7,15,24]">
                        <div class="beverage-name">
                            <div class="icon"><img src="images/icon-cola-soda.png" alt="Cola Soda"/></div>
                            <div class="text">Cola Soda</div>
                        </div>
                    </div>
                </div>

                <!-- Citrus Soda -->
                <div class="medium-6 small-12 columns">
                    <div class="button beverage modal-btn" data-id="" data-name="Citrus Soda" data-subhead=""
                         data-icon="citrus-soda" data-size="1" data-sizes="[8,12,20,32]" data-sugars="[7,11,19,30]">
                        <div class="beverage-name">
                            <div class="icon"><img src="images/icon-citrus-soda.png" alt="Citrus Soda"/></div>
                            <div class="text">Citrus Soda</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Quantity-->
    <div class="row">
        <div class="small-12 column">
            <div class="beverage-attributes init-hidden hidden">
                <div class="beverage-quantity">
                    <div class="quantity-up in-modal" data-id="">
                        <i class="fa fa-chevron-up" aria-hidden="true"></i>
                    </div>
                    <div class="quantity">
                        <input class="modal-quantity" type="number" min="1" max="5" value="1"/>
                    </div>
                    <div class="quantity-down in-modal" data-id="">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="beverage-size">
                    <div class="size-up in-modal" data-id="">
                        <i class="fa fa-chevron-up" aria-hidden="true"></i>
                    </div>
                    <div class="size">
                        <select class="modal-size"></select>
                    </div>
                    <div class="size-down in-modal" data-id="">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Done Button -->
    <div class="row">
        <div class=" large-centered medium-centered column">
            <a href="#close" class="button close-button" rel="modal:close">Done</a>
        </div>
    </div>
</div>

<!-- Milk Modal -->
<div class="modal drink-modal" id="milk-modal" style="display: none;">
    <div class="row">
        <div class="small-12 large-centered medium-centered column">
            <h2 class="modal-title">Milk</h2>
            <div class="row options">
                <!-- Non-Fat Milk -->
                <div class="medium-6 small-12 columns">
                    <div class="button beverage modal-btn" data-id="" data-name="Non-fat Milk" data-subhead="" data-icon="milk"
                         data-size="2" data-sizes="[8,12,16]" data-sugars="[3,4,6]">
                        <div class="beverage-name">
                            <div class="icon"><img src="images/icon-milk.png" alt="Non-fat Milk"/></div>
                            <div class="text"><span class="sub">Non-fat milk</span></div>
                        </div>
                    </div>
                </div>

                <!-- 1% or 2% Milk -->
                <div class="medium-6 small-12 columns">
                    <div class="button beverage modal-btn" data-id="" data-name="2% or 1%  Milk" data-subhead="" data-icon="milk"
                         data-size="2" data-sizes="[8,12,16]" data-sugars="[3,4,6]">
                        <div class="beverage-name">
                            <div class="icon"><img src="images/icon-milk.png" alt="2% or 1%  Milk"/></div>
                            <div class="text"><span class="sub">2% or 1%  Milk</span></div>
                        </div>
                    </div>
                </div>

                <!-- Whole Milk -->
                <div class="medium-6 small-12 columns">
                    <div class="button beverage modal-btn" data-id="" data-name="Whole Milk" data-subhead="" data-icon="milk"
                         data-size="2" data-sizes="[8,12,16]" data-sugars="[3,4,6]">
                        <div class="beverage-name">
                            <div class="icon"><img src="images/icon-milk.png" alt="Whole Milk"/></div>
                            <div class="text"><span class="sub">Whole Milk</span></div>
                        </div>
                    </div>
                </div>

                <!-- Chocolate Milk -->
                <div class="medium-6 small-12 columns">
                    <div class="button beverage modal-btn" data-id="" data-name="Chocolate Milk" data-subhead=""
                         data-icon="chocolate-milk" data-size="2" data-sizes="[8,12,16]" data-sugars="[5,8,11]">
                        <div class="beverage-name">
                            <div class="icon"><img src="images/icon-chocolate-milk.png" alt="Chocolate Milk"/></div>
                            <div class="text"><span class="sub">Chocolate Milk</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quantity-->
    <div class="row">
        <div class="small-12 column">
            <div class="beverage-attributes init-hidden hidden">
                <div class="beverage-quantity">
                    <div class="quantity-up in-modal" data-id="">
                        <i class="fa fa-chevron-up" aria-hidden="true"></i>
                    </div>
                    <div class="quantity">
                        <input class="modal-quantity" type="number" min="1" max="5" value="1"/>
                    </div>
                    <div class="quantity-down in-modal" data-id="">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="beverage-size">
                    <div class="size-up in-modal" data-id="">
                        <i class="fa fa-chevron-up" aria-hidden="true"></i>
                    </div>
                    <div class="size">
                        <select class="modal-size"></select>
                    </div>
                    <div class="size-down in-modal" data-id="">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Done Button -->
    <div class="row">
        <div class="small-12 column">
            <a href="#close" class="button close-button" rel="modal:close">Done</a>
        </div>
    </div>
</div>

<!-- Recommendation Modal -->
<div class="modal" id="recommendation-modal" style="display: none;">
    <div class="row">
        <div class=" column">
            <h2 class="modal-title">Healthier Options</h2>
            <div class="row options">
                <div class="medium-6 small-12 columns">
                    <div class="button beverage healthy-option" data-id="" data-name="Unsweetened Tea" data-subhead=""
                         data-icon="unsweetened-tea" data-size="2" data-sizes="[8,16,24]" data-sugars="[0,0,0]">
                        <div class="beverage-name">
                            <div class="icon"><img src="images/icon-unsweetened-tea.png" alt="Unsweetened Tea"/></div>
                            <div class="text">
                                <span>Unsweetened Tea</span>
                            </div>
                            <div class="close"><i class="fa fa-times"></i></div>
                        </div>
                    </div>
                </div>

                <div class="medium-6 small-12 columns">
                    <div class="button beverage healthy-option" data-id="" data-name="Plain Water" data-subhead="" data-icon="water"
                         data-size="0" data-sizes="[8,16,24]" data-sugars="[0,0,0]">
                        <div class="beverage-name">
                            <div class="icon"><img src="images/icon-water.png" alt="Water"/></div>
                            <div class="text">
                                <span class="">Plain Water</span>
                            </div>
                            <div class="close"><i class="fa fa-times"></i></div>
                        </div>
                    </div>
                </div>

                <div class="large-6 medium-6 small-12 columns">
                    <div class="button beverage healthy-option water-fruit" data-id="" data-name="Water"
                         data-subhead="w/ Fruit like lemons, blueberries, limes or strawberries" data-icon="water-fruit"
                         data-size="0" data-sizes="[8,16,24]" data-sugars="[0,0,0]">
                        <div class="beverage-name">
                            <div class="icon"><img src="images/icon-water-fruit.png" alt="Water w/ Fruit"/></div>
                            <div class="text">
                                <span>Water</span> <span class="sub">w/ Fruit</span>
                            </div>
                            <div class="close"><i class="fa fa-times"></i></div>
                        </div>
                    </div>
                </div>

                <div class="large-6 medium-6 small-12 columns">
                    <div class="button beverage healthy-option" data-id="" data-name="Sparkling Water" data-subhead=""
                         data-icon="sparkling-water" data-size="0" data-sizes="[8,16,24]" data-sugars="[0,0,0]">
                        <div class="beverage-name">
                            <div class="icon"><img src="images/icon-sparkling-water.png" alt="Sparkling Water"/></div>
                            <div class="text"><span>Sparkling Water</span></div>
                            <div class="close"><i class="fa fa-times"></i></div>
                        </div>
                    </div>
                </div>

                <div class="large-6 medium-6 small-12 columns">
                    <div class="button beverage healthy-option" data-id="" data-name="Water" data-subhead="w/ Cucumber and Mint"
                         data-icon="water-fruit" data-size="0" data-sizes="[8,16,24]" data-sugars="[0,0,0]">
                        <div class="beverage-name">
                            <div class="icon"><img src="images/icon-water-cucumber.png" alt="w/ Cucumber and Mint"/></div>
                            <div class="text"><span>Water</span> <span class="sub">w/ Cucumber</span></div>
                            <div class="close"><i class="fa fa-times"></i></div>
                        </div>
                    </div>
                </div>

                <div class="large-6 medium-6 small-12 columns">
                    <div class="button beverage healthy-option" data-id="" data-name="Black Coffee" data-subhead=""
                         data-icon="black-coffee" data-size="1" data-sizes="[12,16,24]" data-sugars="[0,0,0]">
                        <div class="beverage-name">
                            <div class="icon"><img src="images/icon-black-coffee.png" alt="Black Coffee"/></div>
                            <div class="text"><span>Black Coffee</span></div>
                            <div class="close"><i class="fa fa-times"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Done Button -->
    <div class="row">
        <div class="large-centered medium-centered column">
            <a href="#close" class="button close-button" rel="modal:close">Done</a>
        </div>
    </div>
</div>

<!-- Generic Modal -->
<div class="modal" id="generic-modal" style="display: none;">
    <h2 class="modal-title">Please select the quantity and size</h2>
    <div class="row">
        <div class="small-12 column">
            <!-- Quantity-->
            <div class="row">
                <div class="medium-10 small-12 center-column column">
                    <div class="beverage-attributes">
                        <div class="beverage-quantity">
                            <div class="quantity-up in-modal" data-id="">
                                <i class="fa fa-chevron-up" aria-hidden="true"></i>
                            </div>
                            <div class="quantity">
                                <input class="modal-quantity" type="number" min="1" max="5" value="1"/>
                            </div>
                            <div class="quantity-down in-modal" data-id="">
                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="beverage-size">
                            <div class="size-up in-modal" data-id="">
                                <i class="fa fa-chevron-up" aria-hidden="true"></i>
                            </div>
                            <div class="size">
                                <select class="modal-size"></select>
                            </div>
                            <div class="size-down in-modal" data-id="">
                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Done Button -->
            <div class="row">
                <div class="medium-12 small-12 column">
                    <a href="#close" class="button close-button" rel="modal:close">Done</a>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Recommended beverages for "changes" slide -->
<div id="beverage-recommendation-placeholder" style="display:none;" >
    <div class="button recommendation" data-modal="#recommendation-modal" data-savings="" data-id="">
        <div class="beverage-name placeholder">
            <div class="icon"><img src="images/icon-water.png" alt="Water"/></div>
            <div class="text"><span><span class="hide-for-small-only">Click to </span>select a healthier option</span></div>
        </div>
    </div>
</div>

<div class="landscape" style="display:none;">
    <h1>
        <img src="images/rethink/site-logo.png" alt="Champions for Change" class="logo"/><br/>
        Please rotate your device.
    </h1>
</div>


<script
    src="https://code.jquery.com/jquery-1.12.4.min.js"
    integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
    crossorigin="anonymous"></script>
<script
    src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
<script src="js/jquery.fullPage.min.js?ver=<?php echo $version ?>"></script>
<script src="https://cdn.jsdelivr.net/lodash/4.12.0/lodash.min.js"></script>
<script src="js/store.min.js?ver=<?php echo $version ?>"></script>
<script src="js/jquery.slimscroll.min.js?ver=<?php echo $version ?>"></script>
<script src="js/jquery.modal.min.js?ver=<?php echo $version ?>"></script>
<script src="js/jquery.fitvids.js?ver=<?php echo $version ?>"></script>
<script src="js/sugarAnimation.js?ver=<?php echo $version ?>"></script>
<script src="js/contentMaxHeight.js?ver=<?php echo $version ?>"></script>
<script src="js/app.js?ver=<?php echo $version ?>"></script>
</body>
</html>
