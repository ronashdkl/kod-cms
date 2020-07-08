<?php

use yii\db\Migration;

/**
 * Class m191127_213916_add_primarykey_userproject
 */
class m191127_213916_add_primarykey_userproject extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
$this->addColumn('user_project','id',$this->primaryKey());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191127_213916_add_primarykey_userproject cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191127_213916_add_primarykey_userproject cannot be reverted.\n";

        return false;
    }
    */
}
