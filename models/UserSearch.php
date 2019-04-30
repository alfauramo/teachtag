<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'rol'], 'integer'],
            [['username', 'password', 'name', 'email', 'birthday', 'centerCode', 'descripcion', 'img_perfil', 'img_cabecera', 'films', 'music', 'hobbies'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = User::find();

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
            'id' => $this->id,
            'rol' => $this->rol,
            'birthday' => $this->birthday, 
            'centerCode' => $this->centerCode,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'img_perfil', $this->img_perfil])
            ->andFilterWhere(['like', 'img_cabecera', $this->img_cabecera])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);
            ->andFilterWhere(['like', 'films', $this->films]);
            ->andFilterWhere(['like', 'music', $this->music]);
            ->andFilterWhere(['like', 'hobbies', $this->hobbies]);

        return $dataProvider;
    }
}
