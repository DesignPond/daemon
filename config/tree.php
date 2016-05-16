<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'directories' => [
        'app' => [
            'Console' => [], 'Droit' => [], 'Events' => [], 'Exceptions' => [], 'Http' => [
                'Controllers' => [], 'Middleware' => []
            ], 'Jobs' => [], 'Listeners' => [], 'Providers' => [], 'Services' => []
        ] ,'bootstrap' => [] ,'config' => [] ,'database' => [] ,'public' => [
            'frontend' => [], 'backend' => [], 'files' => [], 'logos' => [], 'newsletter' => [], 'uploads' => []
        ] ,'resources' => [
            'lang' => [], 'views' => []
        ] ,'tests' => [] ,'vendor' => []
    ],
    'colors' => [
        'Droit' => '#85a640',
        'Controllers' => '#1f4c7d'
    ],

);
