<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_group`.
 */
class m180901_131729_create_user_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_group', [
            'id' => $this->primaryKey(),
	        'groupname' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_group');
    }
}
