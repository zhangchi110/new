<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\News;

/**
 * NewsSearch represents the model behind the search form about `backend\models\News`.
 */
class NewsSearch extends News
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['new_id'], 'integer'],
            [['new_name', 'new_content', 'new_fid', 'new_time', 'new_uid', 'new_status', 'new_endtime', 'new_desc', 'imageFile', 'new_authour'], 'safe'],
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
        $query = News::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'new_id' => $this->new_id,
            'new_time' => $this->new_time,
            'new_endtime' => $this->new_endtime,
        ]);

        $query->andFilterWhere(['like', 'new_name', $this->new_name])
            ->andFilterWhere(['like', 'new_content', $this->new_content])
            ->andFilterWhere(['like', 'new_fid', $this->new_fid])
            ->andFilterWhere(['like', 'new_uid', $this->new_uid])
            ->andFilterWhere(['like', 'new_status', $this->new_status])
            ->andFilterWhere(['like', 'new_desc', $this->new_desc])
            ->andFilterWhere(['like', 'imageFile', $this->imageFile])
            ->andFilterWhere(['like', 'new_authour', $this->new_authour]);

        return $dataProvider;
    }
}
