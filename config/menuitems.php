<?php
    return [
        'default' => [
            'top' => [
                [
                    'page' => 'Dashboard',
                    'route' => 'owl/dashboard',
                    'icon' => 'fa fa-bar-chart'
                ], [
                    'page' => 'Posts',
                    'route' => 'owl/posts',
                    'icon' => 'fa fa-thumb-tack'
                ], [
                    'page' => 'Pages',
                    'route' => 'owl/pages',
                    'icon' => 'fa fa-files-o'
                ], [
                    'page' => 'Media',
                    'route' => 'owl/media',
                    'icon' => 'fa fa-film'
                ], 
                // [
                //     'page' => 'Comments',
                //     'route' => '',
                //     'icon' => 'fa fa-comment-o'
                // ]
            ],
            'bottom' => [
                // [
                //     'page' => 'Users',
                //     'route' => '',
                //     'icon' => 'fa fa-users'
                // ], [
                //     'page' => 'Settings',
                //     'route' => '',
                //     'icon' => 'fa fa-sliders'
                // ]
            ]
        ],
        'posts' => [
            'top' => [],
            'bottom' => [],
        ]
    ];    
?>
