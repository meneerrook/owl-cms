<?php

    // --------------{ Properties: }--------------
    // The following properties are required to declare for a menu item though some do not require a value:
    //
    // "page"   -   VALUE NOT REQUIRED  - defines the menu item name (als gives a specific class to the menuitem wrapper)
    // "route"  -   VALUE REQUIRED      - defines the route name (!IMPORTANT: not the actual route itself)
    // "hasid"  -   VALUE REQUIRED      - is used to check when rendering the menulist wether a link has any sort of id to load specific data.
    // "class"  -   VALUE NOT REQUIRED  - adds a class to the link (note: below are described some standard classes for specific cases)
    // "icon"   -   VALUE NOT REQUIRED  - every menu item has an icon (Font Awesome 4.7)

    // --------------{ Classes: }--------------
    // classes on the links have an important role to 
    // determine what kind of menu this will be next or 
    // what styling the item should have:
    //
    // "has-sub-menu"   - adding this class will open te next menu with submenu styling
    // "back-link"      - styles the link as a back button.


    $id = '';
    return [
        'pages' => [
            'title' => 'Pages',
            'top' => [
                [
                    'page' => 'Back',
                    'route' => 'owl/dashboard',
                    'hasid' => false,
                    'class' => 'back-link',
                    'icon' => 'fa fa-long-arrow-left',
                    'roles' => [
                        'admin',
                        'manager',
                        'editor'
                    ]
                ],
                [
                    'page' => 'All pages',
                    'route' => 'owl/pages',
                    'hasid' => false,
                    'class' => 'has-sub-menu',
                    'icon' => 'fa fa-files-o',
                    'roles' => [
                        'admin',
                        'manager',
                        'editor'
                    ]
                ],
                [
                    'page' => 'Add page',
                    'route' => 'owl/pages/add',
                    'hasid' => false,
                    'class' => 'has-sub-menu',
                    'icon' => 'fa fa-plus',
                    'roles' => [
                        'admin',
                        'manager',
                        'editor'
                    ]
                ],
            ],
            'bottom' => [],
        ],
        'page-add' => [
            'title' => 'Add page',
            'top' => [
                [
                    'page' => 'Back',
                    'route' => 'owl/pages',
                    'hasid' => false,
                    'class' => 'back-link has-sub-menu',
                    'icon' => 'fa fa-long-arrow-left',
                    'roles' => [
                        'admin',
                        'manager',
                        'editor'
                    ]
                ],
            ],
            'bottom' => [],
        ],
    ];    
?>
