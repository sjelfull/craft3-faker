<?php
/**
 * Faker plugin for Craft CMS 3.x
 *
 * Fake data
 *
 * @link      https://superbig.co
 * @copyright Copyright (c) 2017 Superbig
 */

namespace superbig\faker;

use superbig\faker\services\Entry as EntryService;
use superbig\faker\services\Commerce as CommerceService;
use superbig\faker\services\FakerService;
use superbig\faker\services\Tag as TagService;
use superbig\faker\models\Settings;
use superbig\faker\utilities\FakerUtility as FakerUtilityUtility;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\console\Application as ConsoleApplication;
use craft\services\Utilities;
use craft\events\RegisterComponentTypesEvent;

use yii\base\Event;

/**
 * Class Faker
 *
 * @author    Superbig
 * @package   Faker
 * @since     2.0.0.
 *
 * @property  EntryService    $entry
 * @property  CommerceService $commerce
 * @property  TagService      $tag
 * @property  FakerService    $fakerService
 *
 * @method  Settings getSettings();
 */
class Faker extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var Faker
     */
    public static $plugin;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init ()
    {
        parent::init();
        self::$plugin = $this;

        if ( Craft::$app instanceof ConsoleApplication ) {
            $this->controllerNamespace = 'superbig\faker\console\controllers';
        }

        Event::on(
            Utilities::class,
            Utilities::EVENT_REGISTER_UTILITY_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = FakerUtilityUtility::class;
            }
        );

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ( $event->plugin === $this ) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'faker',
                '{name} plugin loaded',
                [ 'name' => $this->name ]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createSettingsModel ()
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml (): string
    {
        return Craft::$app->view->renderTemplate(
            'faker/settings',
            [
                'settings' => $this->getSettings()
            ]
        );
    }
}
