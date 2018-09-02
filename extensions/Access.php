<?php

namespace app\extensions;

use app\models\User;
use yii\base\BaseObject;

/**
 * Класс проверки прав доступа
 */
class Access extends BaseObject
{
	/**
	 * Проверяет права доступа
	 * @param array $roles массив ролей
	 * @return bool
	 */
	public static function checkAccess(array $roles)
	{
		if($user = User::findOne(\Yii::$app->user->id)) {
			return in_array($user->role, $roles);
		}
		return false;
	}
}