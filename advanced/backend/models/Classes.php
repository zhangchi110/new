<?php

namespace backend\models;

use Yii;
class Classes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'New_class';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['f_status'], 'safe'],
            
        ];
    }

}
