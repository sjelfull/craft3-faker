<?php
/**
 * Faker plugin for Craft CMS 3.x
 *
 * Fake data
 *
 * @link      https://superbig.co
 * @copyright Copyright (c) 2017 Superbig
 */

namespace superbig\faker\assetbundles\fakerutilityutility;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Superbig
 * @package   Faker
 * @since     2.0.0.
 */
class FakerUtilityUtilityAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@superbig/faker/assetbundles/fakerutilityutility/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/FakerUtility.js',
        ];

        $this->css = [
            'css/FakerUtility.css',
        ];

        parent::init();
    }
}
