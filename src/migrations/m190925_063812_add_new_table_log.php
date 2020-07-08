<?php

use yii\db\Migration;

/**
 * Class m190925_063812_add_new_table_log
 */
class m190925_063812_add_new_table_log extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(\ronashdkl\kodCms\migrations\TableNames::LOG, [
            'id' => $this->primaryKey(),
            'log' => $this->text(),
            'created_at' => $this->dateTime(),
            'created_by' => $this->integer(),
            'ip_address'=>$this->string(40),
            'data'=>$this->text()

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190925_063812_add_new_table_log cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190925_063812_add_new_table_log cannot be reverted.\n";

        return false;
    }
    */
}
