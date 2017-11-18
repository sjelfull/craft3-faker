<?php
/**
 * Faker plugin for Craft CMS 3.x
 *
 * Fake data
 *
 * @link      https://superbig.co
 * @copyright Copyright (c) 2017 Superbig
 */

namespace superbig\faker\assetbundles\Faker;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Superbig
 * @package   Faker
 * @since     2.0.0.
 */
class FakerAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@superbig/faker/assetbundles/faker/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/Faker.js',
        ];

        $this->css = [
            'css/Faker.css',
        ];

        parent::init();
    }
}
