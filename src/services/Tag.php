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

use craft\elements\Tag as TagElement;
use Faker\Factory;
use Faker\Generator;
use superbig\faker\Faker;

use Craft;
use craft\base\Component;

/**
 * @author    Superbig
 * @package   Faker
 * @since     2.0.0.
 */
class Tag extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * @var Generator
     */
    private $generator;

    public function init ()
    {
        parent::init();

        $this->generator = Factory::create();
    }

    /*
     * @return mixed
     */
    /**
     * @param     $job
     * @param int $count
     *
     * @return bool
     */
    public function generateTags ($job, $count = 0)
    {
        $elementService = Craft::$app->getElements();
        $settings       = Faker::$plugin->getSettings();

        if ( !isset($settings->jobs[ $job ]) ) {
            echo 'No job with id ' . $job . PHP_EOL;

            return true;
        }

        $job  = $settings->jobs[ $job ];
        $done = [];


        foreach (range(1, $count) as $index) {
            $tag = new TagElement();

            // Do the fakery
            $tag = $job($tag, $this->generator);

            if ( $elementService->saveElement($tag) ) {
                Faker::$plugin->fakerService::createFromElement($tag);

                $done[] = $tag->id;
            }
            else {
                return false;
            }
        }

        echo strtr('Created {count} elements.' . PHP_EOL, [ '{count}' => count($done) ]);

        return true;
    }
}
