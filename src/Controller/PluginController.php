<?php
/**
 * RoomController.php - Main Controller
 *
 * Main Controller Room Module
 *
 * @category Controller
 * @package Room
 * @author Verein onePlace
 * @copyright (C) 2020  Verein onePlace <admin@1plc.ch>
 * @license https://opensource.org/licenses/BSD-3-Clause
 * @version 1.0.0
 * @since 1.0.0
 */

declare(strict_types=1);

namespace OnePlace\Room\Controller;

use Application\Controller\CoreEntityController;
use Application\Model\CoreEntityModel;
use OnePlace\Room\Model\Room;
use OnePlace\Room\Model\RoomTable;
use Laminas\View\Model\ViewModel;
use Laminas\Db\Adapter\AdapterInterface;

class PluginController extends CoreEntityController {
    /**
     * Room Table Object
     *
     * @since 1.0.0
     */
    protected $oTableGateway;

    /**
     * RoomController constructor.
     *
     * @param AdapterInterface $oDbAdapter
     * @param RoomTable $oTableGateway
     * @since 1.0.0
     */
    public function __construct(AdapterInterface $oDbAdapter,RoomTable $oTableGateway,$oServiceManager) {
        $this->oTableGateway = $oTableGateway;
        $this->sSingleForm = 'room-single';
        parent::__construct($oDbAdapter,$oTableGateway,$oServiceManager);

        if($oTableGateway) {
            # Attach TableGateway to Entity Models
            if(!isset(CoreEntityModel::$aEntityTables[$this->sSingleForm])) {
                CoreEntityModel::$aEntityTables[$this->sSingleForm] = $oTableGateway;
            }
        }
    }

    public function testFunction() {
        /**
         * Execute your hook code here
         *
         * optional: return an array to attach data to View
         * otherwise return true
         */
        return ['testData'=>'here i am'];
    }

    public function indexAction() {
        $this->layout('layout/json');

        echo 'index';

        return false;
    }
}
