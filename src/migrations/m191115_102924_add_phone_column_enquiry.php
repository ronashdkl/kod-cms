<?php

use ronashdkl\kodCms\migrations\TableNames;
use yii\db\Migration;

/**
 * Class m191115_102924_add_phone_column_enquiry
 */
class m191115_102924_add_phone_column_enquiry extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('post_enquiry', 'phone', $this->string('14'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191115_102924_add_phone_column_enquiry cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191115_102924_add_phone_column_enquiry cannot be reverted.\n";

        return false;
    }
    */
}
