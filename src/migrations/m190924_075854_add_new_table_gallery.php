<?php

use yii\db\Migration;

/**
 * Class m190924_075854_add_new_table_gallery
 */
class m190924_075854_add_new_table_gallery extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(\ronashdkl\kodCms\migrations\TableNames::GALLERY, [
            'id' => $this->primaryKey(),
            'slug' => $this->string(255)->notNull(),
            'name' => $this->string(200)->notNull(),
            'body' => $this->text(),
            'images'=>$this->text(),
            'draft' => $this->smallInteger(),
            'featured'=>$this->smallInteger(),
            'published'=>$this->smallInteger()->defaultValue(0),
            'created_at' => $this->dateTime()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'updated_by' => $this->integer()->notNull(),
            'removed_at' => $this->dateTime(),
            'removed_by' => $this->integer(),
        ]);
        $this->createTable(\ronashdkl\kodCms\migrations\TableNames::VIDEO, [
            'id' => $this->primaryKey(),
            'url' => $this->string(255),
            'video'=>$this->string(255),
            'draft' => $this->smallInteger(),
            'featured'=>$this->smallInteger(),
            'published'=>$this->smallInteger()->defaultValue(0),
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
        echo "m190924_075854_add_new_table_gallery cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190924_075854_add_new_table_gallery cannot be reverted.\n";

        return false;
    }
    */
}
