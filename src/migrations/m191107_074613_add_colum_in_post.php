<?php

use ronashdkl\kodCms\migrations\TableNames;
use yii\db\Migration;

/**
 * Class m191107_074613_add_colum_in_post
 */
class m191107_074613_add_colum_in_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(TableNames::POST,'completed',$this->boolean()->defaultValue(0));
        $this->addColumn(TableNames::POST,'purchased',$this->boolean()->defaultValue(0));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191107_074613_add_colum_in_post cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191107_074613_add_colum_in_post cannot be reverted.\n";

        return false;
    }
    */
}
