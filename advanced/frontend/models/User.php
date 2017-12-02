<?php 
	namespace frontend\models;
	use yii\base\Model;
	class User extends Model{
		public $verifyCode;
	    public function rules()
	    {
	        return [
	            [['username', 'password', 'email'], 'required'],
	            [['username', 'password'], 'string', 'max' => 255],
	            ['verifyCode','captcha']
	        ];
	    }
	}

 ?>