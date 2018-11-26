<?php
    return [
        'default' => [
            'title' => 'Owl CMS',
            'top' => [
                [
                    'page' => 'Dashboard',
                    'route' => 'owl/dashboard',
                    'class' => '',
                    'icon' => 'fa fa-bar-chart'
                ], 
                [
                    'page' => 'Posts',
                    'route' => 'owl/posts',
                    'class' => 'has-sub-menu', // has-sub-menu
                    'icon' => 'fa fa-thumb-tack'
                ], 
                [
                    'page' => 'Pages',
                    'route' => 'owl/pages',
                    'class' => '',
                    'icon' => 'fa fa-files-o',
                ], 
                [
                    'page' => 'Media',
                    'route' => 'owl/media',
                    'class' => '',
                    'icon' => 'fa fa-film'
                ], 
                // [
                //     'page' => 'Comments',
                //     'route' => '',
                //     'icon' => 'fa fa-comment-o'
                // ]
            ],
            'bottom' => [
                [
                    'page' => 'Users',
                    'route' => 'owl/users',
                    'class' => 'has-sub-menu',
                    'icon' => 'fa fa-users'
                ], 
                [
                    'page' => 'Settings',
                    'route' => 'owl/settings',
                    'class' => '',
                    'icon' => 'fa fa-sliders'
                ]
            ]
        ],
        'posts' => [
            'title' => 'Posts',
            'top' => [
                [
                    'page' => 'Back',
                    'route' => 'owl/dashboard',
                    'class' => 'back-link',
                    'icon' => 'fa fa-long-arrow-left'
                ],
                [
                    'page' => 'All posts',
                    'route' => 'owl/posts',
                    'class' => 'has-sub-menu',
                    'icon' => 'fa fa-thumb-tack'
                ],
                [
                    'page' => 'Add new',
                    'route' => 'owl/posts/add',
                    'class' => '',
                    'icon' => 'fa fa-plus'
                ],
            ],
            'bottom' => [],
        ],
        'users' => [
            'title' => 'Users',
            'top' => [
                [
                    'page' => 'Back',
                    'route' => 'owl/dashboard',
                    'class' => 'back-link',
                    'icon' => 'fa fa-long-arrow-left'
                ],
                [
                    'page' => 'All users',
                    'route' => 'owl/users',
                    'class' => 'has-sub-menu',
                    'icon' => 'fa fa-users'
                ],
                // [
                //     'page' => 'Add new',
                //     'route' => 'owl/users/add',
                //     'class' => '',
                //     'icon' => 'fa fa-plus'
                // ],
            ],
            'bottom' => [],
        ],
    ];    
?>
