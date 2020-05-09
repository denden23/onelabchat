<?php
/**
 * Created by PhpStorm.
 * User: OneLab
 * Date: 04/05/2020
 * Time: 22:00
 */

namespace common\modules\message\models;


class ChatContacts extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'tbl_contacts';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('messagedb');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'string', 'max' => 255],
            [['timestamp'], 'safe'],
            [['contact_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'contact_id' => 'Contact ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChats()
    {
        return $this->hasMany(Chat::className(), ['contact_id' => 'contact_id']);
    }
}