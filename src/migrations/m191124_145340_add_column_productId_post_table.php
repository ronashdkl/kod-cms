<?php

use yii\db\Migration;

/**
 * Class m191124_145340_add_column_productId_post_table
 */
class m191124_145340_add_column_productId_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(\ronashdkl\kodCms\migrations\TableNames::POST, 'project_id', $this->integer()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191124_145340_add_column_productId_post_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191124_145340_add_column_productId_post_table cannot be reverted.\n";

        return false;
    }
    */
}
