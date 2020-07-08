<?php

use yii\db\Migration;

/**
 * Class m190926_075854_alter_table_video
 */
class m190926_075854_alter_table_video extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(\ronashdkl\kodCms\migrations\TableNames::VIDEO, 'title', $this->string(200));
        $this->addColumn(\ronashdkl\kodCms\migrations\TableNames::VIDEO, 'body', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190926_075854_alter_table_video cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190926_075854_alter_table_video cannot be reverted.\n";

        return false;
    }
    */
}
