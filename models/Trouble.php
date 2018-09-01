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
 * @property Comment[] $comments
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
            [['physical_address', 'executor', 'ip_address', 'stages'], 'string'],
	        //[['physical_address', 'executor', 'ip-address', 'stages', 'deadline'], 'required'],
	        [['deadline'], 'date', 'format'=>'php:Y-m-d'],
	        [['deadline'], 'default', 'value' => date('Y-m-d')]];
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
            'author' => 'author',
            'deadline' => 'Deadline',
            'stages' => 'Stages',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['trouble_id' => 'id']);
    }
}
