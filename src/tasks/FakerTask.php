<?php
/**
 * Faker plugin for Craft CMS 3.x
 *
 * Fake data
 *
 * @link      https://superbig.co
 * @copyright Copyright (c) 2017 Superbig
 */

namespace superbig\faker\tasks;

use superbig\faker\Faker;

use Craft;
use craft\base\Task;

/**
 * @author    Superbig
 * @package   Faker
 * @since     2.0.0.
 */
class FakerTask extends Task
{
    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $someAttribute = 'Some Default';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['someAttribute', 'string'],
            ['someAttribute', 'default', 'value' => 'Some Default'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function getTotalSteps(): int
    {
        return 1;
    }

    /**
     * @inheritdoc
     */
    public function runStep(int $step)
    {
        return true;
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function defaultDescription(): string
    {
        return Craft::t('faker', 'FakerTask');
    }
}
