<?php
/**
 * module.config.php - Room Config
 *
 * Main Config File for Room Module
 *
 * @category Config
 * @package Room
 * @author Verein onePlace
 * @copyright (C) 2020  Verein onePlace <admin@1plc.ch>
 * @license https://opensource.org/licenses/BSD-3-Clause
 * @version 1.0.0
 * @since 1.0.0
 */

namespace OnePlace\Room;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    # Room Module - Routes
    'router' => [
        'routes' => [
            # Module Basic Route
            'room' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/room[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\RoomController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'room-api' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/room/api[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\ApiController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'room-export' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/room/export[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\ExportController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'room-search' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/room/search[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\SearchController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'room-plugin' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/room/plugin[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\PluginController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'roomfurniture' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/room/furniture[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\FurnitureController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'roomfurniture-api' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/room/furniture/api[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\FurnitureApiController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    # View Settings
    'view_manager' => [
        'template_path_stack' => [
            'room' => __DIR__ . '/../view',
        ],
    ],

    # Translator
    'translator' => [
        'locale' => 'de_DE',
        'translation_file_patterns' => [
            [
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ],
        ],
    ],
];
