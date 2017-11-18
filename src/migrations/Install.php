<?php
/**
 * Faker plugin for Craft CMS 3.x
 *
 * Fake data
 *
 * @link      https://superbig.co
 * @copyright Copyright (c) 2017 Superbig
 */

namespace superbig\faker\migrations;

use superbig\faker\Faker;

use Craft;
use craft\config\DbConfig;
use craft\db\Migration;

/**
 * @author    Superbig
 * @package   Faker
 * @since     2.0.0.
 */
class Install extends Migration
{
    // Public Properties
    // =========================================================================

    /**
     * @var string The database driver to use
     */
    public $driver;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function safeUp ()
    {
        $this->driver = Craft::$app->getConfig()->getDb()->driver;
        if ( $this->createTables() ) {
            $this->createIndexes();
            $this->addForeignKeys();
            // Refresh the db schema caches
            Craft::$app->db->schema->refresh();
            $this->insertDefaultData();
        }

        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown ()
    {
        $this->driver = Craft::$app->getConfig()->getDb()->driver;
        $this->removeTables();

        return true;
    }

    // Protected Methods
    // =========================================================================

    /**
     * @return bool
     */
    protected function createTables ()
    {
        $tablesCreated = false;

        $tableSchema = Craft::$app->db->schema->getTableSchema('{{%faker_element}}');
        if ( $tableSchema === null ) {
            $tablesCreated = true;
            $this->createTable(
                '{{%faker_element}}',
                [
                    'id'          => $this->primaryKey(),
                    'dateCreated' => $this->dateTime()->notNull(),
                    'dateUpdated' => $this->dateTime()->notNull(),
                    'uid'         => $this->uid(),
                    'siteId'      => $this->integer()->notNull(),

                    'elementId'   => $this->integer()->notNull(),
                    'elementType' => $this->string()->notNull(),
                ]
            );
        }

        return $tablesCreated;
    }

    /**
     * @return void
     */
    protected function createIndexes ()
    {
        $this->createIndex(
            $this->db->getIndexName(
                '{{%faker_element}}',
                'elementId',
                true
            ),
            '{{%faker_element}}',
            'elementId',
            true
        );
        // Additional commands depending on the db driver
        switch ($this->driver) {
            case DbConfig::DRIVER_MYSQL:
                break;
            case DbConfig::DRIVER_PGSQL:
                break;
        }
    }

    /**
     * @return void
     */
    protected function addForeignKeys ()
    {
        $this->addForeignKey(
            $this->db->getForeignKeyName('{{%faker_element}}', 'siteId'),
            '{{%faker_element}}',
            'siteId',
            '{{%sites}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            $this->db->getForeignKeyName('{{%faker_element}}', 'elementId'),
            '{{%faker_element}}',
            'elementId',
            '{{%elements}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * @return void
     */
    protected function insertDefaultData ()
    {
    }

    /**
     * @return void
     */
    protected function removeTables ()
    {
        $this->dropTableIfExists('{{%faker_element}}');
    }
}
