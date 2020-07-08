<?php

use yii\db\Migration;

/**
 * Class m200522_102203_add_column_post
 */
class m200522_102203_add_column_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    $this->addColumn('post','avatar_position',$this->boolean());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200522_102203_add_column_post cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200522_102203_add_column_post cannot be reverted.\n";

        return false;
    }
    */
}
