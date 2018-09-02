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
	public static function getRole()
	{
		$role = [
			'administrator'=>'Администратор',
			'observer'=>'Наблюдатель',
			'executor'=>'Исполнитель',
			'operator'=>'Оператор',
		];
		return $role;
	}
}