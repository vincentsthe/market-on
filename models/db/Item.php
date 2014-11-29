<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property integer $id
 * @property string $name
 * @property integer $price
 * @property string $image_url
 * @property string $description
 * @property integer $quantity
 * @property integer $user_id
 * @property integer $category_id
 *
 * @property Cod[] $cods
 * @property Category $category
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price', 'description', 'quantity', 'user_id', 'category_id'], 'required'],
            [['price', 'quantity', 'user_id', 'category_id'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['image_url'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nama',
            'price' => 'Harga',
            'image_url' => 'Image Url',
            'description' => 'Deskripsi',
            'quantity' => 'Jumlah',
            'user_id' => 'ID Pengguna',
            'category_id' => 'Kategori',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCods()
    {
        return $this->hasMany(Cod::className(), ['item_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
