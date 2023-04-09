<?php

declare(strict_types=1);

namespace Application;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;
use Laminas\Mvc\Controller\LazyControllerAbstractFactory as ControllerFactory;

return [
    'app_data' => [
        'services' => [
            [
                'item'     => 'Range Fee',
                'duration' => '1 Hour',
                'cost'     => '25',
            ],
            [
                'item'     => 'Recurve Shooting Experience',
                'duration' => '1 Hour',
                'cost'     => '30',
            ],
            [
                'item'     => 'Private Lesson',
                'duration' => '1 Hour',
                'cost'     => '1 Hour',
            ],
            [
                'item'     => 'Monthly Membership',
                'duration' => '1 Month',
                'cost'     => '110',
            ],
            [
                'item'     => 'Yearly Membership',
                'duration' => '1 Year',
                'cost'     => '800',
            ],
        ],
    ],
    'router' => [
        'routes' => [
            'home' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'app' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => ControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
