<?php

return [

    'middleware' => [
        'auth'
    ],

    'translations' => [
//        "home" => "home"
    ],

    /*
    |--------------------------------------------------------------------------
    | The prefix you wish to use with your style guide installation
    |--------------------------------------------------------------------------
    |
    | specify the domain prefix you would like your users to visit in order
    | to view the Style Guide page
    |
    */
    'prefix'       => 'admin/cms',

    /*
   |--------------------------------------------------------------------------
   | Filesystem Disk
   |--------------------------------------------------------------------------
   |
   | Specify the filesystem disk to use for json storage (filesystems.php)
   |
   |
   */
    'storage_disk' => 'cms',

    /*
   |--------------------------------------------------------------------------
   | Asset path location
   |--------------------------------------------------------------------------
   |
   | specify the published asset path location
   |
   |
   */
    'assets_path'  => '/vendor/cswiley/cms/assets',

    /*
    |--------------------------------------------------------------------------
    | Cms Page Title
    |--------------------------------------------------------------------------
    */
    'title'        => 'Content Manager',


    /*
     |--------------------------------------------------------------------------
     | Application stylesheets
     |--------------------------------------------------------------------------
     |
     | Specify your application stylesheets to load
     */
    'stylesheets'  => [
        env('APP_URL') . '/css/app.css',
    ],

    /*
    |--------------------------------------------------------------------------
    | Application script
    |--------------------------------------------------------------------------
    |
    | Specify your application scripts to load
    */
    'scripts'      => [
        'https://use.fontawesome.com/b9c1035ab3.js',
        env('APP_URL') . '/js/manifest.js',
        env('APP_URL') . '/js/vendor.js',
    ]
];
