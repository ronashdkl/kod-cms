<?php

use yii\db\Migration;

/**
 * Class m200112_113343_add_link_to_tree_table
 */
class m200112_113343_add_link_to_tree_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
$this->addColumn('tree','link',$this->string(255)->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200112_113343_add_link_to_tree_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200112_113343_add_link_to_tree_table cannot be reverted.\n";

        return false;
    }
    */
}
