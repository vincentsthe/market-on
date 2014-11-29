<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "cod".
 *
 * @property integer $id
 * @property string $date
 * @property string $description
 * @property integer $buyer_id
 * @property integer $seller_id
 * @property integer $quantity
 * @property double $lat
 * @property double $lng
 * @property integer $item_id
 *
 * @property User $seller
 * @property Item $item
 * @property User $buyer
 */
class Cod extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cod';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['description', 'buyer_id', 'seller_id', 'quantity', 'lat', 'lng', 'item_id'], 'required'],
            [['description'], 'string'],
            [['buyer_id', 'seller_id', 'quantity', 'item_id'], 'integer'],
            [['lat', 'lng'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Tanggal Bertemu',
            'description' => 'Deskripsi',
            'buyer_id' => 'Buyer ID',
            'seller_id' => 'Seller ID',
            'quantity' => 'Kuantitas',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'item_id' => 'Item ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeller()
    {
        return $this->hasOne(User::className(), ['id' => 'seller_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['id' => 'item_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuyer()
    {
        return $this->hasOne(User::className(), ['id' => 'buyer_id']);
    }
}
