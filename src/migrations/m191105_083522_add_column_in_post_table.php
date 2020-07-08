<?php

use ronashdkl\kodCms\migrations\TableNames;
use yii\db\Migration;

/**
 * Class m191105_083522_add_column_in_post_table
 */
class m191105_083522_add_column_in_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(TableNames::POST,'avatar',$this->text()->null());
        $this->addColumn(TableNames::POST,'tag',$this->text()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191105_083522_add_column_in_post_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191105_083522_add_column_in_post_table cannot be reverted.\n";

        return false;
    }
    */
}
