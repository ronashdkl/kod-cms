<?php

use yii\db\Migration;

/**
 * Class m200609_102438_add_sticky_option_in_post
 */
class m200609_102438_add_sticky_option_in_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('post','sticky_avatar',$this->boolean());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200609_102438_add_sticky_option_in_post cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200609_102438_add_sticky_option_in_post cannot be reverted.\n";

        return false;
    }
    */
}
