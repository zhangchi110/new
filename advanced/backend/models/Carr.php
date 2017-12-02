<?php

namespace backend\models;

use Yii;
class Carr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Carr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['carr_time'], 'safe'],
            
        ];
    }

}
