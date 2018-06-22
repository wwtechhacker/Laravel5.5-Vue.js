<!-- Google Tag Manager 
<script>(function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start'                    :
                new Date().getTime(), event: 'gtm.js'
        });
        var f                          = d.getElementsByTagName(s)[0],
            j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', '');</script>  Enter Account ID 
End Google Tag Manager -->

<link href="https://fonts.googleapis.com/css?family=Sedgwick+Ave+Display" rel="stylesheet">

<meta charset="UTF-8">
<meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<meta property="og:url" content="{{ env('APP_URL')  }}"/>
<meta property="og:type" content="website"/>
<meta property="og:title" content="Shots Fired - Rap Battle League"/>
<meta property="og:description" content="Shots Fired has established itself as the leading San Diego rap battle platform, and has even reached out to other communities in Orange County, Inland Empire, Los Angeles, Fresno and San Jose."/>
<meta property="og:image" content="<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . '://' . $_SERVER['SERVER_NAME'];?>/images/shotsfiredlogo-small.png"/>
<title>Shots Fired Rap Battle League</title>