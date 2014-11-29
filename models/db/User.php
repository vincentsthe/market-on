<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $fullname
 * @property integer $is_seller
 * @property double $lat
 * @property double $lng
 * @property integer $category_id
 * @property string $description
 *
 * @property Cod[] $cods
 * @property Category $category
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'fullname', 'lat', 'lng', 'category_id'], 'required'],
            [['is_seller', 'category_id'], 'integer'],
            [['lat', 'lng'], 'number'],
            [['description'], 'string'],
            [['username', 'password', 'fullname'], 'string', 'max' => 100],
            [['username'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'fullname' => 'Fullname',
            'is_seller' => 'Is Seller',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'category_id' => 'Category ID',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCods()
    {
        return $this->hasMany(Cod::className(), ['buyer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new Exception("Unsupported operation exception");
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
}
