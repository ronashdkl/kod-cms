<?php

use ronashdkl\kodCms\migrations\TableNames;
use yii\db\Migration;

/**
 * Class m191020_041327_add_table_newsletter
 */
class m191020_041327_add_table_newsletter extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    $this->createTable(TableNames::NEWSLETTER,[
        'id'=>$this->primaryKey(),
        'email'=>$this->string(100)->unique()->notNull(),
        'subscribe'=>$this->boolean()->defaultValue(1),
        'created_at' => $this->dateTime()->notNull(),
        'updated_at' => $this->dateTime()->notNull(),
        'ip'=>$this->string(90),
    ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191020_041327_add_table_newsletter cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191020_041327_add_table_newsletter cannot be reverted.\n";

        return false;
    }
    */
}
