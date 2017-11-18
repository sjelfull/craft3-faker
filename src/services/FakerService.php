<?php
/**
 * Faker plugin for Craft CMS 3.x
 *
 * Fake data
 *
 * @link      https://superbig.co
 * @copyright Copyright (c) 2017 Superbig
 */

namespace superbig\faker\services;

use craft\base\ElementInterface;
use craft\elements\Tag as TagElement;
use Faker\Factory;
use Faker\Generator;
use superbig\faker\Faker;

use Craft;
use craft\base\Component;
use superbig\faker\models\FakerModel;
use superbig\faker\records\FakerRecord;

/**
 * @author    Superbig
 * @package   Faker
 * @since     2.0.0.
 */
class FakerService extends Component
{
    // Public Methods
    // =========================================================================

    public function init ()
    {
        parent::init();
    }

    public static function createFromElement (ElementInterface $element)
    {
        $model              = new FakerModel();
        $model->elementId   = $element->getId();
        $model->elementType = get_class($element);

        $record              = new FakerRecord();
        $record->siteId      = Craft::$app->getSites()->currentSite->id;
        $record->elementId   = $model->elementId;
        $record->elementType = $model->elementType;

        return $record->save();
    }

    public function saveRecord (FakerModel $model)
    {
        $record              = new FakerRecord();
        $record->siteId      = Craft::$app->getSites()->currentSite->id;
        $record->elementId   = $model->elementId;
        $record->elementType = $model->elementType;

        $record->save();
    }
}
