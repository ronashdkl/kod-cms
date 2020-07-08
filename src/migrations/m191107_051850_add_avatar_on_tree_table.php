<?php

use ronashdkl\kodCms\migrations\TableNames;
use yii\db\Migration;

/**
 * Class m191107_051850_add_avatar_on_tree_table
 */
class m191107_051850_add_avatar_on_tree_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(TableNames::TREE,'avatar',$this->text()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191107_051850_add_avatar_on_tree_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191107_051850_add_avatar_on_tree_table cannot be reverted.\n";

        return false;
    }
    */
}
