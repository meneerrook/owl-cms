<?php

// read:    looking at a certain subject
// write:   encapsulates adding, editing and deleting items of this subject.

return [
    
    'admin' => [
        'config' => [
            
        ],
        'privileges' => [
            'modules' => [
                'posts' => [
                    'read' => true,
                    'write' => true
                ],
                'users' => [
                    'read' => true,
                    'write' => true
                ],
                'settings' => [
                    'read' => true,
                    'write' => true
                ],
                'system' => [
                    'read' => true,
                    'write' => true,
                ]
            ], 
            'other' => [
                
            ]
        ]
    ],
    'manager' => [
        'config' => [
            
        ],
        'privileges' => [
            'modules' => [
                'posts' => [
                    'read' => true,
                    'write' => true
                ],
                'users' => [
                    'read' => true,
                    'write' => true
                ],
                'settings' => [
                    'read' => true,
                    'write' => true
                ],
                'system' => [
                    'read' => false,
                    'write' => false,
                ]
            ], 
            'other' => [
                
            ]
        ]
    ],
    'editor' => [
        'config' => [
            
        ],
        'privileges' => [
            'modules' => [
                'posts' => [
                    'read' => true,
                    'write' => true
                ],
                'users' => [
                    'read' => true,
                    'write' => true
                ],
                'settings' => [
                    'read' => true,
                    'write' => false
                ],
                'system' => [
                    'read' => false,
                    'write' => false,
                ]
            ], 
            'other' => [

            ]
        ]
    ],
    'user' => [
        'config' => [
            
        ],
        'privileges' => [
            'modules' => [
                'posts' => [
                    'read' => false,
                    'write' => false
                ],
                'users' => [
                    'read' => false,
                    'write' => false
                ],
                'settings' => [
                    'read' => false,
                    'write' => false
                ],
                'system' => [
                    'read' => false,
                    'write' => false,
                ]
            ], 
            'other' => [
                
            ]
        ]
    ]

];


?>