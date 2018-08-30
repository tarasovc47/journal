<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comment`.
 */
class m180830_055022_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
	        'text' => $this->text(),
	        'user_id' => $this->integer(),
	        'trouble_id' => $this->integer()
        ]);
        // Создать индекс для колонки 'users_id'
	    $this->createIndex(
	    'idx-post-user_id',
	    'comment',
	    'user_id'
	    );
	    //Добавить удалённый ключ для таблицы 'users'
	    $this->addForeignKey(
	    	'fk-post-user_id',
		    'comment',
		    'user_id',
		    'user',
		    'id',
		    'CASCADE'
	    );
	    // Создать индекс для таблицы 'trouble'
	    $this->createIndex(
	    	'idx-post-trouble_id',
	        'comment',
		    'trouble_id'
	    );
	    $this->addForeignKey(
	    	'fk-trouble_id',
		    'comment',
		    'trouble_id',
		    'trouble',
		    'id',
		    'CASCADE'
	    );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('comment');
    }
}
