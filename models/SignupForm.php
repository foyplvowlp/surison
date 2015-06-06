<?php

namespace app\models;

use app\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model {

    public $first_name;
    public $last_name;
    public $username;
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['first_name', 'required', 'message' => 'ท่านลืมกรอกชื่อ กรุณากรอกชื่อด้วยค่ะ'],
            ['last_name', 'required', 'message' => 'ท่านลืมกรอกนามสกุล กรุณากรอกนามสกุลด้วยค่ะ'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required', 'message' => 'ท่านลืมกรอก E-Mail กรุณากรอก E-Mail สกุลด้วยค่ะ'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required', 'message' => 'ท่านลืมกรอกรหัสผ่าน กรุณากรอกรหัสผ่านด้วยค่ะ'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup() {
        if ($this->validate()) {
            $user = new User();
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }

    public function attributeLabels() {
        return [
            'first_name' => 'ชื่อ',
            'last_name' => 'นามสกุล',
            'username' => 'ชื่อผู้ใช้งาน',
            'email' => 'อีเมลล์',
            'password' => 'รหัสผ่าน',
        ];
    }

}
