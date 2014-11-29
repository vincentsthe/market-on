<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "reminder".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $date
 * @property string $description
 * @property string $transaksi
 *
 * @property User $user
 */
class Reminder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reminder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'description', 'transaksi'], 'required'],
            [['user_id'], 'integer'],
            [['date'], 'safe'],
            [['description', 'transaksi'], 'string']
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
            'date' => 'Date',
            'description' => 'Description',
            'transaksi' => 'Transaksi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
