<?php
use Tonis\Router\Plates\RouteExtension;
use Tonis\View\Strategy\PlatesStrategy;

return [
    'plates' => [
        'folders' => [
            'error' => __DIR__ . '/../view/plates/error',
            'layout' => __DIR__ . '/../view/plates/layout'
        ],
        'extensions' => [
            RouteExtension::class
        ],
        'functions' => [],
    ],
    'twig' => [
        'options' => [
            'cache' => getenv('TONIS_DEBUG') ? null : 'cache/twig'
        ],
        'extensions' => [],
        'namespaces' => [
            'error' => __DIR__ . '/../view/twig/error',
            'layout' => __DIR__ . '/../view/twig/layout'
        ]
    ],
    'tonis' => [
        'subscribers' => [],
        'view_manager' => [
            'fallback_strategy' => PlatesStrategy::class,
            'not_found_template' => '@error/404',
            'error_template' => '@error/error',
            'strategies' => [],
        ]
    ]
];
