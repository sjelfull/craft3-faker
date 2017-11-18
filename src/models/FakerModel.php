<?php
/**
 * Faker plugin for Craft CMS 3.x
 *
 * Fake data
 *
 * @link      https://superbig.co
 * @copyright Copyright (c) 2017 Superbig
 */

namespace superbig\faker\models;

use superbig\faker\Faker;

use Craft;
use craft\base\Model;

/**
 * @author    Superbig
 * @package   Faker
 * @since     2.0.0.
 */
class FakerModel extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * @var null/integer
     */
    public $elementId = null;

    /**
     * @var string
     */
    public $elementType = '';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules ()
    {
        return [
            [ 'elementId', 'integer' ],
            [ 'elementType', 'string' ],
        ];
    }
}
