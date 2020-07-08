<?php

use yii\db\Migration;

/**
 * Class m190923_085424_add_new_table_post
 */
class m190923_085424_add_new_table_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable(\ronashdkl\kodCms\migrations\TableNames::POST, [
            'id' => $this->primaryKey(),
            'tree_id'=>$this->integer(),
            'slug' => $this->string(255)->notNull(),
            'title' => $this->string(200)->notNull(),
            'images' => $this->text(),
            'body' => $this->text()->notNull(),
            'draft' => $this->smallInteger(),
            'featured'=>$this->smallInteger(),
            'published'=>$this->smallInteger()->defaultValue(0),
            'schedule_date'=>$this->date(),
            'published_date'=>$this->date(),
            'created_at' => $this->dateTime()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'updated_by' => $this->integer()->notNull(),
            'removed_at' => $this->dateTime(),
            'removed_by' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(\ronashdkl\kodCms\migrations\TableNames::POST);
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190923_085424_add_new_table_post cannot be reverted.\n";

        return false;
    }
    */
}
