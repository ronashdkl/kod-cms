<?php

use yii\db\Migration;

/**
 * Class m191112_102238_create_table_post_enquiry
 */
class m191112_102238_create_table_post_enquiry extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post_enquiry}}', [
            'id' => $this->primaryKey(),
            'post_id'=>$this->integer()->notNull(),
            'full_name' => $this->string(200)->notNull(),
            'email' => $this->string(30)->notNull(),
            'message' => $this->text()->notNull(),
            'seen'=>$this->boolean(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%post_enquiry}}');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191112_102238_create_table_post_enquiry cannot be reverted.\n";

        return false;
    }
    */
}
