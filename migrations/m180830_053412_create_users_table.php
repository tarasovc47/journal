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
	        'is_admin' => $this->boolean(),
	        'is_operator' => $this->boolean(),
	        'is_executor' => $this->boolean(),
	        'is_observer' => $this->boolean()
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
