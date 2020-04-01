<?php

namespace app\models;

use Exception;
use RuntimeException;
use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    /** @var string */
    public string $username = '';
    /** @var string */
    public string $password = '';
    /** @var User|null */
    private $user;

    /**
     * {@inheritdoc}
     */
    public function rules(): array
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
     */
    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Неверное имя пользователя или пароль');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login(): bool
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser());
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
        if ($this->user === null) {
            $this->user = User::findByUsername($this->username);
        }

        return $this->user;
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function generateAccessToken(): bool
    {
        $user = $this->getUser();
        if ($user === null) {
            throw new RuntimeException('Пользователь не найден');
        }
        $user->setAccessToken();

        return $user->save();
    }

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
        ];
    }
}
