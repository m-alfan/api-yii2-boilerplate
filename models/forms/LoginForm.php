<?php

namespace app\models\forms;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * @SWG\Definition(
 *   definition="LoginForm",
 *   type="object",
 *   required={"username", "email", "token", "updated_at", "created_at"},
 *   @SWG\Property(property="name", type="string"),
 *   @SWG\Property(property="username", type="string"),
 *   @SWG\Property(property="token", type="string"),
 *   @SWG\Property(property="email", type="string"),
 *   @SWG\Property(property="updated_at", type="string"),
 *   @SWG\Property(property="created_at", type="string")
 * )
 *
 * @SWG\Definition(
 *   definition="CurrentUser",
 *   type="object",
 *   required={"username", "email", "token", "updated_at", "created_at"},
 *   allOf={
 *     @SWG\Schema(ref="#/definitions/LoginForm")
 *   }
 * )
 */
class LoginForm extends Model
{
    /**
     * @SWG\Property();
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $password;

    private $_user;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            $user = $this->getUser();
            Yii::$app->user->login($user);
            return $user;
        }

        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }
        return $this->_user;
    }
}