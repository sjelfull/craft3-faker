<?php
/**
 * Faker plugin for Craft CMS 3.x
 *
 * Fake data
 *
 * @link      https://superbig.co
 * @copyright Copyright (c) 2017 Superbig
 */

namespace superbig\faker\records;

use superbig\faker\Faker;

use Craft;
use craft\db\ActiveRecord;

/**
 * @author    Superbig
 * @package   Faker
 * @since     2.0.0.
 *
 * @property integer id
 * @property integer siteId
 * @property integer elementId
 * @property string  elementType
 */
class FakerRecord extends ActiveRecord
{
    // Public Static Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function tableName ()
    {
        return '{{%faker_element}}';
    }
}
