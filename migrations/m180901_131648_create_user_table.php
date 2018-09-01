<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180901_131648_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
	        'name' => $this->text(),
	        'password' =>$this->text(),
	        'role' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
