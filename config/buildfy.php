<?php

return [
    /*
    |--------------------------------------------------------------------------
    | ℹ️ Assetify (Remote)
    |--------------------------------------------------------------------------
    |
    | Larawise has extensive support for organizing assets to be loaded either
    | from CDN or locally, so you can use this key to specify which type of load
    | all of your assets should be.
    |
    */
    'offline'                                   => env('ASSETIFY_REMOTE', true),

    /*
    |--------------------------------------------------------------------------
    | ℹ️ Assetify (Version)
    |--------------------------------------------------------------------------
    |
    | Larawise allows you to optionally customize the versioning algorithm when
    | rendering assets if versioning is enabled. To customize the versioning
    | strategy, simply change the configuration below.
    |
    */
    'version'                                   => env('ASSETIFY_VERSION', time()),

    /*
    |--------------------------------------------------------------------------
    | ℹ️ Assetify (Version Status)
    |--------------------------------------------------------------------------
    |
    | You can optionally set the use of asset versioning. It is often a good
    | idea to version assets so that the browser automatically refreshes the
    | cached data when a new version is available.
    |
    */
    'version_status'                            => env('ASSETIFY_VERSION_STATUS', true),

    /*
    |--------------------------------------------------------------------------
    | ℹ️ Assetify (Scripts)
    |--------------------------------------------------------------------------
    |
    | Srylius lets you include javascript files globally when managing assets,
    | allowing you to easily define the assets you need to use throughout your
    | application. Set the assets that should be used globally.
    |
    */
    'scripts'                                   => ['sui-localization', 'sui-core', 'sui-plugins'],

    /*
    |--------------------------------------------------------------------------
    | ℹ️ Assetify (Styles)
    |--------------------------------------------------------------------------
    |
    | Srylius lets you include stylesheet files globally when managing assets,
    | allowing you to easily define the assets you need to use throughout your
    | application. Set the assets that should be used globally.
    |
    */
    'styles'                                    => ['sui-core', 'sui-plugins', 'sui-progress'],

    /*
    |--------------------------------------------------------------------------
    | ℹ️ Assetify (Resources)
    |--------------------------------------------------------------------------
    |
    | Srylius supports advanced methods to provide a structure that can organize
    | all defined resources globally using aliases and default settings to process
    | and prepare assets for use. You can set assets so that they can be lazily used
    | wherever you need them throughout the application.
    |
    */
    'resources'                                 => [
        'scripts'   => [
            'sui-core'               => [
                'use_cdn'   => false,
                'location'  => 'footer',
                'src'       => [
                    'local' => '/javascripts/scripts.bundle.js',
                    'cdn'   => '//cdn.srylius.com/assets/javascripts/scripts.bundle.js',
                ],
            ],
            'sui-plugins'            => [
                'use_cdn'   => false,
                'location'  => 'footer',
                'src'       => [
                    'local' => '/plugins/plugins.bundle.js',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/plugins.bundle.js',
                ],
            ],
            'sui-localization'       => [
                'use_cdn'   => false,
                'location'  => 'footer',
                'src'       => [
                    'local' => '/javascripts/localization.bundle.js',
                    'cdn'   => '//cdn.srylius.com/assets/javascripts/localization.bundle.js',
                ],
            ],
            'ckeditor-classic'       => [
                'use_cdn'   => false,
                'location'  => 'footer',
                'src'       => [
                    'local' => '/plugins/custom/ckeditor/ckeditor-classic.bundle.js',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js',
                ],
            ],
            'ckeditor-balloon'       => [
                'use_cdn'   => false,
                'location'  => 'footer',
                'src'       => [
                    'local' => '/plugins/custom/ckeditor/ckeditor-balloon.bundle.js',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/ckeditor/ckeditor-balloon.bundle.js',
                ],
            ],
            'ckeditor-balloon-block' => [
                'use_cdn'   => false,
                'location'  => 'footer',
                'src'       => [
                    'local' => '/plugins/custom/ckeditor/ckeditor-balloon-block.bundle.js',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/ckeditor/ckeditor-balloon-block.bundle.js',
                ],
            ],
            'ckeditor-document'      => [
                'use_cdn'   => false,
                'location'  => 'footer',
                'src'       => [
                    'local' => '/plugins/custom/ckeditor/ckeditor-document.bundle.js',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/ckeditor/ckeditor-document.bundle.js',
                ],
            ],
            'ckeditor-inline'        => [
                'use_cdn'   => false,
                'location'  => 'footer',
                'src'       => [
                    'local' => '/plugins/custom/ckeditor/ckeditor-inline.bundle.js',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/ckeditor/ckeditor-inline.bundle.js',
                ],
            ],
            'cookie-alert'           => [
                'use_cdn'   => false,
                'location'  => 'footer',
                'src'       => [
                    'local' => '/plugins/custom/cookie-alert/cookie-alert.bundle.js',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/cookie-alert/cookie-alert.bundle.js',
                ],
            ],
            'cropper'                => [
                'use_cdn'   => false,
                'location'  => 'footer',
                'src'       => [
                    'local' => '/plugins/custom/cropper/cropper.bundle.js',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/cropper/cropper.bundle.js',
                ],
            ],
            'datatables'             => [
                'use_cdn'   => false,
                'location'  => 'footer',
                'src'       => [
                    'local' => '/plugins/custom/datatables/datatables.bundle.js',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/datatables/datatables.bundle.js',
                ],
            ],
            'draggable'              => [
                'use_cdn'   => false,
                'location'  => 'footer',
                'src'       => [
                    'local' => '/plugins/custom/draggable/draggable.bundle.js',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/draggable/draggable.bundle.js',
                ],
            ],
            'flotcharts'             => [
                'use_cdn'   => false,
                'location'  => 'footer',
                'src'       => [
                    'local' => '/plugins/custom/flotcharts/flotcharts.bundle.js',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/flotcharts/flotcharts.bundle.js',
                ],
            ],
            'formrepeater'           => [
                'use_cdn'   => false,
                'location'  => 'footer',
                'src'       => [
                    'local' => '/plugins/custom/formrepeater/formrepeater.bundle.js',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/formrepeater/formrepeater.bundle.js',
                ],
            ],
            'fslightbox'             => [
                'use_cdn'   => false,
                'location'  => 'footer',
                'src'       => [
                    'local' => '/plugins/custom/fslightbox/fslightbox.bundle.js',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/fslightbox/fslightbox.bundle.js',
                ],
            ],
            'fullcalendar'           => [
                'use_cdn'   => false,
                'location'  => 'footer',
                'src'       => [
                    'local' => '/plugins/custom/fullcalendar/fullcalendar.bundle.js',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js',
                ],
            ],
            'jkanban'                => [
                'use_cdn'   => false,
                'location'  => 'footer',
                'src'       => [
                    'local' => '/plugins/custom/jkanban/jkanban.bundle.js',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/jkanban/jkanban.bundle.js',
                ],
            ],
            'jstree'                 => [
                'use_cdn'   => false,
                'location'  => 'footer',
                'src'       => [
                    'local' => '/plugins/custom/jstree/jstree.bundle.js',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/jstree/jstree.bundle.js',
                ],
            ],
            'leaflet'                => [
                'use_cdn'   => false,
                'location'  => 'header',
                'src'       => [
                    'local' => '/plugins/custom/leaflet/leaflet.bundle.css',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/leaflet/leaflet.bundle.css',
                ],
            ],
            'prismjs'                => [
                'use_cdn'   => false,
                'location'  => 'footer',
                'src'       => [
                    'local' => '/plugins/custom/leaflet/leaflet.bundle.js',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/leaflet/leaflet.bundle.js',
                ],
            ],
            'qr-code'                => [
                'use_cdn'   => false,
                'location'  => 'footer',
                'src'       => [
                    'local' => '/plugins/custom/qr-code/srylius-qr-code.js',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/qr-code/srylius-qr-code.js',
                ],
            ],
            'timeline'               => [
                'use_cdn'   => false,
                'location'  => 'footer',
                'src'       => [
                    'local' => '/plugins/custom/timeline/timeline.bundle.js',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/timeline/timeline.bundle.js',
                ],
            ],
            'typedjs'                => [
                'use_cdn'   => false,
                'location'  => 'footer',
                'src'       => [
                    'local' => '/plugins/custom/typedjs/typedjs.bundle.js',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/typedjs/typedjs.bundle.js',
                ],
            ],

            'auth-login'             => [
                'use_cdn'   => false,
                'location'  => 'footer',
                'src'       => [
                    'local' => '/javascripts/custom/auth/login.js',
                    'cdn'   => '//cdn.srylius.com/assets/javascripts/custom/auth/login.js',
                ],
            ],
        ],
        'styles'    => [
            'sui-plugins'   => [
                'use_cdn'       => false,
                'location'      => 'header',
                'src'           => [
                    'local' => '/plugins/plugins.bundle.css',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/plugins.bundle.css',
                ],
                'attributes'    => [],
            ],
            'sui-core'      => [
                'use_cdn'       => false,
                'location'      => 'header',
                'src'           => [
                    'local' => '/stylesheets/style.bundle.css',
                    'cdn'   => '//cdn.srylius.com/assets/stylesheets/style.bundle.css',
                ],
                'attributes'    => [],
            ],
            'sui-progress'  => [
                'use_cdn'       => false,
                'location'      => 'header',
                'src'           => [
                    'local' => '/stylesheets/progress.css',
                    'cdn'   => '//cdn.srylius.com/assets/stylesheets/progress.css',
                ],
                'attributes'    => [],
            ],
            'cookie-alert'  => [
                'use_cdn'   => false,
                'location'  => 'header',
                'src'       => [
                    'local' => '/plugins/custom/cookie-alert/cookie-alert.bundle.css',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/cookie-alert/cookie-alert.bundle.css',
                ],
            ],
            'cropper'       => [
                'use_cdn'   => false,
                'location'  => 'header',
                'src'       => [
                    'local' => '/plugins/custom/cropper/cropper.bundle.css',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/cropper/cropper.bundle.css',
                ],
            ],
            'datatables'    => [
                'use_cdn'   => false,
                'location'  => 'header',
                'src'       => [
                    'local' => '/plugins/custom/datatables/datatables.bundle.css',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/datatables/datatables.bundle.css',
                ],
            ],
            'fullcalendar'  => [
                'use_cdn'   => false,
                'location'  => 'header',
                'src'       => [
                    'local' => '/plugins/custom/fullcalendar/fullcalendar.bundle.css',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css',
                ],
            ],
            'jkanban'       => [
                'use_cdn'   => false,
                'location'  => 'header',
                'src'       => [
                    'local' => '/plugins/custom/jkanban/jkanban.bundle.css',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/jkanban/jkanban.bundle.css',
                ],
            ],
            'jstree'        => [
                'use_cdn'   => false,
                'location'  => 'header',
                'src'       => [
                    'local' => '/plugins/custom/jstree/jstree.bundle.css',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/jstree/jstree.bundle.css',
                ],
            ],
            'leaflet'       => [
                'use_cdn'   => false,
                'location'  => 'header',
                'src'       => [
                    'local' => '/plugins/custom/leaflet/leaflet.bundle.css',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/leaflet/leaflet.bundle.css',
                ],
            ],
            'prismjs'       => [
                'use_cdn'   => false,
                'location'  => 'header',
                'src'       => [
                    'local' => '/plugins/custom/prismjs/prismjs.bundle.css',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/prismjs/prismjs.bundle.css',
                ],
            ],
            'qr-code'       => [
                'use_cdn'   => false,
                'location'  => 'header',
                'src'       => [
                    'local' => '/plugins/custom/qr-code/srylius-qr-code.css',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/qr-code/srylius-qr-code.css',
                ],
            ],
            'timeline'      => [
                'use_cdn'   => false,
                'location'  => 'header',
                'src'       => [
                    'local' => '/plugins/custom/timeline/timeline.bundle.css',
                    'cdn'   => '//cdn.srylius.com/assets/plugins/custom/timeline/timeline.bundle.css',
                ],
            ],
        ],
    ],
];
