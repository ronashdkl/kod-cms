<?php

use ronashdkl\kodCms\migrations\TableNames;
use yii\db\Migration;

/**
 * Class m191023_070332_add_language_column_in_post_table
 */
class m191023_070332_add_language_column_in_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
$this->addColumn(TableNames::POST,'language','text');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191023_070332_add_language_column_in_post_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191023_070332_add_language_column_in_post_table cannot be reverted.\n";

        return false;
    }
    */
}
