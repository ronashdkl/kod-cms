<?php

use yii\db\Migration;
use ronashdkl\kodCms\migrations\TableNames;

/**
 * Class m191024_074013_add_price_column_in_post_table
 */
class m191024_074013_add_price_column_in_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(TableNames::POST,'price','float');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191024_074013_add_price_type_column_in_post_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191024_074013_add_price_type_column_in_post_table cannot be reverted.\n";

        return false;
    }
    */
}
