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

use superbig\faker\Faker;

use Craft;
use craft\base\Component;

/**
 * @author    Superbig
 * @package   Faker
 * @since     2.0.0.
 */
class Entry extends Component
{
    // Public Methods
    // =========================================================================

    /*
     * @return mixed
     */
    public function exampleService()
    {
        $result = 'something';
        // Check our Plugin's settings for `someAttribute`
        if (Faker::$plugin->getSettings()->someAttribute) {
        }

        return $result;
    }
}
