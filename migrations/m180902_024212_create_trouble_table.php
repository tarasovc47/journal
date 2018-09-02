<?php

use yii\db\Migration;

/**
 * Handles the creation of table `trouble`.
 */
class m180902_024212_create_trouble_table extends Migration
{
    /**
     * {@inheritdoc}
     */
	public function safeUp()
	{
		$this->createTable('trouble', [
			'id' => $this->primaryKey(),
			'physical_address' => $this->text(),
			'ip_address' => $this->text(),
			'executor' => $this->text(),
			'author' => $this->text(),
			'deadline' => $this->date(),
			'comment' => $this->text(),
			'stages' => $this->string()
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
