<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\db\Cod;

/**
 * CodSearch represents the model behind the search form about `app\models\db\Cod`.
 */
class CodSearch extends Cod
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'buyer_id', 'seller_id', 'quantity', 'item_id'], 'integer'],
            [['date', 'description'], 'safe'],
            [['lat', 'lng'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Cod::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->andFilterWhere(['accepted' => 0]);
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            'buyer_id' => $this->buyer_id,
            'seller_id' => $this->seller_id,
            'quantity' => $this->quantity,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'item_id' => $this->item_id,
            'accepted' => $this->accepted,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
