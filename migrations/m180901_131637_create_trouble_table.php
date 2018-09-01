<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trouble`.
 */
class m180901_131637_create_trouble_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('trouble', [
	        'id' => $this->primaryKey(),
	        'physical_address' => $this->text(),
	        'ip_address' => $this->integer(),
	        'executor' => $this->text(),
	        'author' => $this->text(),
	        'deadline' => $this->date(),
	        'stages' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('trouble');
    }
}
