<?php

use ronashdkl\kodCms\migrations\TableNames;
use yii\db\Migration;

/**
 * Class m191105_074132_add_language_column_on_tree
 */
class m191105_074132_add_language_column_on_tree extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
$this->addColumn(TableNames::TREE,'language',$this->text()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191105_074132_add_language_column_on_tree cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191105_074132_add_language_column_on_tree cannot be reverted.\n";

        return false;
    }
    */
}
