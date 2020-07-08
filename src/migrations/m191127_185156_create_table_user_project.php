<?php

use yii\db\Migration;

/**
 * Class m191127_185156_create_table_user_project
 */
class m191127_185156_create_table_user_project extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_project', [
            'user_id' => $this->integer()->notNull(),
            'project_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('fbk_user_project-project','user_project','project_id','post','id','cascade');
        $this->addForeignKey('fbk_user_project-user','user_project','user_id','user','id','cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191127_185156_create_table_user_project cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191127_185156_create_table_user_project cannot be reverted.\n";

        return false;
    }
    */
}
