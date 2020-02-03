<?php
/**
 * Module.php - Module Class
 *
 * Module Class File for Room Module
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

use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\Mvc\MvcEvent;
use Laminas\ModuleManager\ModuleManager;
use Laminas\Session\Config\StandardConfig;
use Laminas\Session\SessionManager;
use Laminas\Session\Container;
use Application\Controller\CoreEntityController;
use OnePlace\Room\Controller\PluginController;

class Module {
    /**
     * Module Version
     *
     * @since 1.0.0
     */
    const VERSION = '1.0.0';

    /**
     * Load module config file
     *
     * @since 1.0.0
     * @return array
     */
    public function getConfig() : array {
        return include __DIR__ . '/../config/module.config.php';
    }

    /**
     * Load Models
     */
    public function getServiceConfig() : array {
        return [
            'factories' => [
                # Room Module - Base Model
                Model\RoomTable::class => function($container) {
                    $tableGateway = $container->get(Model\RoomTableGateway::class);
                    return new Model\RoomTable($tableGateway,$container);
                },
                # Room Module - Base Model
                Model\FurnitureTable::class => function($container) {
                    $tableGateway = $container->get(Model\FurnitureTableGateway::class);
                    return new Model\FurnitureTable($tableGateway,$container);
                },
                Model\RoomTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Room($dbAdapter));
                    return new TableGateway('room', $dbAdapter, null, $resultSetPrototype);
                },
                Model\FurnitureTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Furniture($dbAdapter));
                    return new TableGateway('room_furniture', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }

    /**
     * Load Controllers
     */
    public function getControllerConfig() : array {
        return [
            'factories' => [
                # Plugin Example Controller
                Controller\PluginController::class => function($container) {
                    $oDbAdapter = $container->get(AdapterInterface::class);
                    return new Controller\PluginController(
                        $oDbAdapter,
                        $container->get(Model\RoomTable::class),
                        $container
                    );
                },
                # Room Main Controller
                Controller\RoomController::class => function($container) {
                    $oDbAdapter = $container->get(AdapterInterface::class);
                    $tableGateway = $container->get(Model\RoomTable::class);
                    # hook plugin
                    CoreEntityController::addHook('room-add-before',(object)['sFunction'=>'testFunction','oItem'=>new PluginController($oDbAdapter,$tableGateway,$container)]);
                    return new Controller\RoomController(
                        $oDbAdapter,
                        $container->get(Model\RoomTable::class),
                        $container
                    );
                },
                # Furniture Main Controller
                Controller\FurnitureController::class => function($container) {
                    $oDbAdapter = $container->get(AdapterInterface::class);
                    # hook plugin

                    return new Controller\FurnitureController(
                        $oDbAdapter,
                        $container->get(Model\FurnitureTable::class),
                        $container
                    );
                },
                # Api Plugin
                Controller\ApiController::class => function($container) {
                    $oDbAdapter = $container->get(AdapterInterface::class);
                    return new Controller\ApiController(
                        $oDbAdapter,
                        $container->get(Model\RoomTable::class),
                        $container
                    );
                },
                # Export Plugin
                Controller\ExportController::class => function($container) {
                    $oDbAdapter = $container->get(AdapterInterface::class);
                    return new Controller\ExportController(
                        $oDbAdapter,
                        $container->get(Model\RoomTable::class),
                        $container
                    );
                },
                # Search Plugin
                Controller\SearchController::class => function($container) {
                    $oDbAdapter = $container->get(AdapterInterface::class);
                    return new Controller\SearchController(
                        $oDbAdapter,
                        $container->get(Model\RoomTable::class),
                        $container
                    );
                },
            ],
        ];
    }
}
