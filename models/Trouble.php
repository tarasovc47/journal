<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trouble".
 *
 * @property int $id
 * @property string $physical_address
 * @property int $ip_address
 * @property string $executor
 * @property string $author
 * @property string $deadline
 * @property string $stages
 *
 * relation
 * @property User exec
 * @property User regUser
 */
class Trouble extends \yii\db\ActiveRecord
{
	/** Состояния аварии */
	const STATE_NEW = 0; //новая
	const STATE_OPEN = 1; //в работе
	const STATE_COMPLETE = 2; //решена
	const STATE_CANCELED = 3; //отменена
	const STATE_CLOSED = 4; //закрыта

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trouble';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['physical_address', 'executor', 'author', 'ip_address', 'comment'], 'string'],
	        [['physical_address', 'executor', 'author', 'ip_address', 'stages', 'deadline'], 'required'],
	        [['stages'], 'in', 'range' => array_keys(self::getTroubleStages())],
            [['deadline'], 'safe'],
	        [['deadline'], 'date', 'format'=>'php:Y-m-d'],
	        [['deadline'], 'default', 'value' => date('Y-m-d')],
            [['stages'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'physical_address' => 'Physical Address',
            'ip_address' => 'Ip Address',
            'executor' => 'Executor',
            'author' => 'Author',
            'deadline' => 'Deadline',
	        'comment' => 'Comment',
            'stages' => 'Stages',
        ];
    }

    public function getExec()
    {
    	return $this->hasOne(User::class, ['id' => 'executor']);
    }

    public function getRegUser()
    {
	    return $this->hasOne(User::class, ['id' => 'author']);
    }

	/**
	 * Возвращает массив состояний аварии
	 * @return array
	 */
	public static function getTroubleStages()
	{
		return [
			self::STATE_NEW => 'Новая',
			self::STATE_OPEN => 'В работе',
			self::STATE_COMPLETE => 'Решена',
			self::STATE_CANCELED => 'Отменена',
			self::STATE_CLOSED => 'Закрыта'
		];
	}
}
