<?php
/**
 * Room.php - Room Entity
 *
 * Entity Model for Room
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

use Application\Model\CoreEntityModel;

class Furniture extends CoreEntityModel {
    public $label;

    /**
     * Room constructor.
     *
     * @param AdapterInterface $oDbAdapter
     * @since 1.0.0
     */
    public function __construct($oDbAdapter) {
        parent::__construct($oDbAdapter);

        # Set Single Form Name
        $this->sSingleForm = 'roomfurniture-single';

        # Attach Dynamic Fields to Entity Model
        $this->attachDynamicFields();
    }

    /**
     * Set Entity Data based on Data given
     *
     * @param array $aData
     * @since 1.0.0
     */
    public function exchangeArray(array $aData) {
        $this->id = !empty($aData['Furniture_ID']) ? $aData['Furniture_ID'] : 0;
        $this->label = !empty($aData['label']) ? $aData['label'] : '';

        $this->updateDynamicFields($aData);
    }

}