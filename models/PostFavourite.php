<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_post_favourite".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $post_id
 * @property integer $created
 */
class PostFavourite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post_favourite}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'post_id'], 'required'],
            [['user_id', 'post_id', 'created'], 'integer'],
            [['user_id', 'post_id'], 'unique', 'targetAttribute' => ['user_id', 'post_id'], 'message' => 'The combination of User ID and Post ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'post_id' => 'Post ID',
            'created' => 'Created',
        ];
    }

    public function beforeSave($insert) 
    {   
        if (parent::beforeSave($insert)) 
        {
            if ($insert) 
            {
                $this->created = time();
            }  
            return true;
        } 
        else 
        {
            return false;
        } 
    } 
    
}