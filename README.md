# Faker plugin for Craft CMS 3.x

Create elements with fake data, swiftly.

![Screenshot](resources/img/icon.png)

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require superbig/craft3-faker

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Faker.

## Faker Overview

-Insert text here-

## Configuring Faker

Add jobs in the config file. 

Typehint the element type and the Faker Generator (autoinjected) to autocomplete method in IDEs like PHPStorm.

```php
<?php
use craft\elements\Tag;
use Faker\Generator;

return [
    // Add your fakery jobs
    "jobs" => [
        'tag' => function (Tag $tag, Generator $faker) {
            $tag->title   = $faker->company;
            $tag->groupId = 1;

            return $tag;
        }
    ],
];

```

## Using Faker

Run the jobs through the console command `./craft faker --job=tag --count=100 --element=tag`

## Faker Roadmap

* Try to make it more flexible/support any elements?

Brought to you by [Superbig](https://superbig.co)
