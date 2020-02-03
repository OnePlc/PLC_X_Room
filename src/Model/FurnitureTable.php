<?php
/**
 * FurnitureTable.php - Furniture Table
 *
 * Table Model for Furniture
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

class FurnitureTable extends CoreEntityTable {

    /**
     * FurnitureTable constructor.
     *
     * @param TableGateway $tableGateway
     * @since 1.0.0
     */
    public function __construct(TableGateway $tableGateway) {
        parent::__construct($tableGateway);

        # Set Single Form Name
        $this->sSingleForm = 'roomfurniture-single';
    }

    /**
     * Get Furniture Entity
     *
     * @param int $id
     * @return mixed
     * @since 1.0.0
     */
    public function getSingle($id) {
        # Use core function
        return $this->getSingleEntity($id,'Furniture_ID');
    }

    /**
     * Save Furniture Entity
     *
     * @param Furniture $oFurniture
     * @return int Furniture ID
     * @since 1.0.0
     */
    public function saveSingle(Furniture $oFurniture) {
        $aData = [
            'label' => $oFurniture->label,
        ];

        $aData = $this->attachDynamicFields($aData,$oFurniture);

        $id = (int) $oFurniture->id;

        if ($id === 0) {
            # Add Metadata
            $aData['created_by'] = CoreController::$oSession->oUser->getID();
            $aData['created_date'] = date('Y-m-d H:i:s',time());
            $aData['modified_by'] = CoreController::$oSession->oUser->getID();
            $aData['modified_date'] = date('Y-m-d H:i:s',time());

            # Insert Furniture
            $this->oTableGateway->insert($aData);

            # Return ID
            return $this->oTableGateway->lastInsertValue;
        }

        # Check if Furniture Entity already exists
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

        # Update Furniture
        $this->oTableGateway->update($aData, ['Furniture_ID' => $id]);

        return $id;
    }

    /**
     * Generate new single Entity
     *
     * @return Furniture
     * @since 1.0.0
     */
    public function generateNew() {
        return new Furniture($this->oTableGateway->getAdapter());
    }
}