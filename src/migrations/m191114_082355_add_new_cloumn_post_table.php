<?php

use ronashdkl\kodCms\migrations\TableNames;
use yii\db\Migration;

/**
 * Class m191114_082355_add_new_cloumn_post_table
 */
class m191114_082355_add_new_cloumn_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
$this->addColumn(TableNames::POST,'hide_language',$this->string(2)->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191114_082355_add_new_cloumn_post_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191114_082355_add_new_cloumn_post_table cannot be reverted.\n";

        return false;
    }
    */
}
