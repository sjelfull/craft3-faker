<?php
/**
 * Faker plugin for Craft CMS 3.x
 *
 * Fake data
 *
 * @link      https://superbig.co
 * @copyright Copyright (c) 2017 Superbig
 */

namespace superbig\faker\utilities;

use superbig\faker\Faker;
use superbig\faker\assetbundles\fakerutilityutility\FakerUtilityUtilityAsset;

use Craft;
use craft\base\Utility;

/**
 * Faker Utility
 *
 * @author    Superbig
 * @package   Faker
 * @since     2.0.0.
 */
class FakerUtility extends Utility
{
    // Static
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('faker', 'FakerUtility');
    }

    /**
     * @inheritdoc
     */
    public static function id(): string
    {
        return 'faker-faker-utility';
    }

    /**
     * @inheritdoc
     */
    public static function iconPath()
    {
        return Craft::getAlias("@superbig/faker/assetbundles/fakerutilityutility/dist/img/FakerUtility-icon.svg");
    }

    /**
     * @inheritdoc
     */
    public static function badgeCount(): int
    {
        return 0;
    }

    /**
     * @inheritdoc
     */
    public static function contentHtml(): string
    {
        Craft::$app->getView()->registerAssetBundle(FakerUtilityUtilityAsset::class);

        $someVar = 'Have a nice day!';
        return Craft::$app->getView()->renderTemplate(
            'faker/_components/utilities/FakerUtility_content',
            [
                'someVar' => $someVar
            ]
        );
    }
}
