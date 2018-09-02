<?php

namespace app\models;

use Yii;
/** Состояния аварии */
const STATE_NEW = 0; //новая
const STATE_OPEN = 1; //в работе
const STATE_COMPLETE = 2; //решена
const STATE_CANCELED = 3; //отменена
const STATE_CLOSED = 4; //закрыта
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
 */
class Trouble extends \yii\db\ActiveRecord
{
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
}
