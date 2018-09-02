<?php
namespace app\models;
use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $role
 *
 * @property Comment[] $comments
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
	/** Роли */
	const ROLE_ADMIN = 0;
	const ROLE_OBSERVER = 1;
	const ROLE_EXECUTOR = 2;
	const ROLE_OPERATOR = 3;

	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'user';
	}
	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['name', 'password', 'role'], 'string'],
		];
	}
	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'Name',
			'password' => 'Password',
			'role' => 'Role',
		];
	}
	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getComments()
	{
		return $this->hasMany(Comment::className(), ['user_id' => 'id']);
	}
	public static function findByUsername($username)
	{
		return User::find()->where(['name'=> $username])->one();
	}
	public function validatePassword($password)
	{
		return ($this->password == $password) ? true : false;
	}
	public static function findIdentity($id)
	{
		return User::findOne($id);
	}
	public static function findIdentityByAccessToken($token, $type = null)
	{
		// TODO: Implement findIdentityByAccessToken() method.
	}
	public function getId()
	{
		return $this->id;
	}
	public static function getUsername()
	{
		return Yii::$app->user->identity->name;
	}
	public function getAuthKey()
	{
		// TODO: Implement getAuthKey() method.
	}
	public function validateAuthKey($authKey)
	{
		// TODO: Implement validateAuthKey() method.
	}
	public static function getRoles()
	{
		return [
			self::ROLE_ADMIN => 'Администратор',
			self::ROLE_OBSERVER => 'Наблюдатель',
			self::ROLE_EXECUTOR => 'Исполнитель',
			self::ROLE_OPERATOR => 'Оператор'
		];
	}

	/**
	 * @return User[]
	 */
	public static function getExecutor()
	{
		return self::findAll(['role' => self::ROLE_EXECUTOR]);
	}
}