<?php
/**
 * Faker plugin for Craft CMS 3.x
 *
 * Fake data
 *
 * @link      https://superbig.co
 * @copyright Copyright (c) 2017 Superbig
 */

namespace superbig\faker\console\controllers;

use superbig\faker\Faker;

use Craft;
use yii\console\Controller;
use yii\helpers\Console;

/**
 * Default Command
 *
 * @author    Superbig
 * @package   Faker
 * @since     2.0.0.
 */
class DefaultController extends Controller
{
    // Public Methods
    // =========================================================================

    public $job;
    public $element;
    public $count             = 0;
    public $supportedElements = [ 'Tag' ];

    public function options ($actionId)
    {
        return [ 'job', 'count', 'element' ];
    }

    /**
     * Handle faker/default console commands
     *
     * @return mixed
     */
    public function actionIndex ()
    {
        if ( empty($this->job) ) {
            echo 'No job defined' . PHP_EOL;

            return 1;
        }

        if ( empty($this->count) ) {
            echo 'Invalid count' . PHP_EOL;

            return 1;
        }

        switch (strtolower($this->element)) {
            case 'tag':
                echo "Running " . $this->job . PHP_EOL;

                Faker::$plugin->tag->generateTags($this->job, $this->count);
                break;
        }

        return 0;
    }
}
