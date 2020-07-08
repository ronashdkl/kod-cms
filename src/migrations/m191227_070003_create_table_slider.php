<?php

use yii\db\Migration;

/**
 * Class m191227_070003_create_table_slider
 */
class m191227_070003_create_table_slider extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('slider_main', [
            'id' => $this->primaryKey(),
            'image' => $this->text(),
            'summary' => $this->string(200),
            'title' => $this->string(200),
            'button' => $this->text(),
            'snow' => $this->boolean(),
            'text_class' => $this->string(20)
        ]);
        $this->createTable('slider_main_button', [
            'id' => $this->primaryKey(),
            'slider_main_id' => $this->integer(),
            'code' => $this->string(255)
        ]);
        $this->addForeignKey('FK_sliderMain_sliderMainButton',     'slider_main_button',    'slider_main_id', 'slider_main', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_sliderMain_sliderMainButton','slider_main_button');
        $this->dropTable('slider_main');
        $this->dropTable('slider_main_button');


    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191227_070003_create_table_slider cannot be reverted.\n";

        return false;
    }
    */
}
