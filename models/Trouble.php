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
 * @property string $operator
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
            [['physical_address', 'executor', 'operator', 'ip_address'], 'string'],
            [['deadline'], 'safe'],
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
            'operator' => 'Operator',
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
