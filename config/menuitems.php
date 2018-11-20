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
            'title' => 'Posts',
            'top' => [
                [
                    'page' => 'Add',
                    'route' => 'owl/posts/add',
                    'class' => '',
                    'icon' => 'fa fa-plus'
                ],
                [
                    'page' => 'Add',
                    'route' => 'owl/posts/edit',
                    'class' => '',
                    'icon' => 'fa fa-pencil'
                ],
                [
                    'page' => 'Delete',
                    'route' => 'owl/posts/delete',
                    'class' => '',
                    'icon' => 'fa fa-trash'
                ]
            ],
            'bottom' => [],
        ]
    ];    
?>
