<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "New".
 *
 * @property integer $new_id
 * @property string $new_name
 * @property string $new_content
 * @property string $new_fid
 * @property string $new_time
 * @property string $new_uid
 * @property string $new_status
 * @property string $new_endtime
 * @property string $new_desc
 * @property string $imageFile
 * @property string $new_authour
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'New';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['new_time', 'new_endtime'], 'safe'],
            [['new_name', 'new_content', 'new_fid', 'new_uid', 'new_status', 'new_desc', 'imageFile', 'new_authour'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'new_id' => 'New ID',
            'new_name' => 'New Name',
            'new_content' => 'New Content',
            'new_fid' => 'New Fid',
            'new_time' => 'New Time',
            'new_uid' => 'New Uid',
            'new_status' => 'New Status',
            'new_endtime' => 'New Endtime',
            'new_desc' => 'New Desc',
            'imageFile' => 'Image File',
            'new_authour' => 'New Authour',
        ];
    }
}
