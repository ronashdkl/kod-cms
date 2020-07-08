<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%json}}`.
 */
class m200107_075706_create_json_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%json}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(100)->notNull(),
            'data'=>$this->json()->notNull(),
            'created_at'=>$this->dateTime()->null(),
            'updated_at'=>$this->dateTime()->null()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%json}}');
    }
}
