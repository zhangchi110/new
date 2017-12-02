<?php 
    namespace backend\models;
    use yii\base\Model;
    class Admin extends Model{
        public $verifyCode;
        public function rules()
        {
            return [
                [['username', 'password'], 'required'],
                [['username', 'password'], 'string', 'max' => 255],
                ['verifyCode','captcha']
            ];
        }
    }

 ?>