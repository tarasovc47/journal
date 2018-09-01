<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_group".
 *
 * @property int $id
 * @property string $groupname
 */
class UserGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['groupname'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'groupname' => 'Groupname',
        ];
    }
}
