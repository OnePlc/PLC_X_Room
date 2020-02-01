<?php
/**
 * RoomTable.php - Room Table
 *
 * Table Model for Room
 *
 * @category Model
 * @package Room
 * @author Verein onePlace
 * @copyright (C) 2020 Verein onePlace <admin@1plc.ch>
 * @license https://opensource.org/licenses/BSD-3-Clause
 * @version 1.0.0
 * @since 1.0.0
 */

namespace OnePlace\Room\Model;

use Application\Controller\CoreController;
use Application\Model\CoreEntityTable;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\Sql\Select;
use Laminas\Db\Sql\Where;
use Laminas\Paginator\Paginator;
use Laminas\Paginator\Adapter\DbSelect;

class RoomTable extends CoreEntityTable {

    /**
     * RoomTable constructor.
     *
     * @param TableGateway $tableGateway
     * @since 1.0.0
     */
    public function __construct(TableGateway $tableGateway) {
        parent::__construct($tableGateway);

        # Set Single Form Name
        $this->sSingleForm = 'room-single';
    }

    /**
     * Get Room Entity
     *
     * @param int $id
     * @return mixed
     * @since 1.0.0
     */
    public function getSingle($id) {
        # Use core function
        return $this->getSingleEntity($id,'Room_ID');
    }

    /**
     * Save Room Entity
     *
     * @param Room $oRoom
     * @return int Room ID
     * @since 1.0.0
     */
    public function saveSingle(Room $oRoom) {
        $aData = [
            'label' => $oRoom->label,
        ];

        $aData = $this->attachDynamicFields($aData,$oRoom);

        $id = (int) $oRoom->id;

        if ($id === 0) {
            # Add Metadata
            $aData['created_by'] = CoreController::$oSession->oUser->getID();
            $aData['created_date'] = date('Y-m-d H:i:s',time());
            $aData['modified_by'] = CoreController::$oSession->oUser->getID();
            $aData['modified_date'] = date('Y-m-d H:i:s',time());

            # Insert Room
            $this->oTableGateway->insert($aData);

            # Return ID
            return $this->oTableGateway->lastInsertValue;
        }

        # Check if Room Entity already exists
        try {
            $this->getSingle($id);
        } catch (\RuntimeException $e) {
            throw new \RuntimeException(sprintf(
                'Cannot update room with identifier %d; does not exist',
                $id
            ));
        }

        # Update Metadata
        $aData['modified_by'] = CoreController::$oSession->oUser->getID();
        $aData['modified_date'] = date('Y-m-d H:i:s',time());

        # Update Room
        $this->oTableGateway->update($aData, ['Room_ID' => $id]);

        return $id;
    }

    /**
     * Generate new single Entity
     *
     * @return Room
     * @since 1.0.0
     */
    public function generateNew() {
        return new Room($this->oTableGateway->getAdapter());
    }
}