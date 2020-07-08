<?php

use yii\db\Migration;

/**
 * Class m200507_125048_add_column
 */
class m200507_125048_add_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tree','display_form',$this->boolean()->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200507_125048_add_column cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200507_125048_add_column cannot be reverted.\n";

        return false;
    }
    */
}
