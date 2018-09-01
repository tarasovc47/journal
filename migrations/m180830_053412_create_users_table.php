<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m180830_053412_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
	        'name' => $this->text(),
	        'password' => $this->text(),
	        'role' => $this->text()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
