<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Yatim;

/**
 * YatimSearch represents the model behind the search form about `app\models\Yatim`.
 */
class YatimSearch extends Yatim
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'lembaga', 'tanggal_lahir', 'ukuran_baju', 'ukuran_sepatu', 'created_at', 'updated_at'], 'integer'],
            [['nama', 'tempat_lahir', 'jenis_kelamin', 'nama_ayah', 'nama_ibu', 'nomor_kk'], 'safe'],
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
        $query = Yatim::find();

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
            'lembaga' => $this->lembaga,
            'tanggal_lahir' => $this->tanggal_lahir,
            'ukuran_baju' => $this->ukuran_baju,
            'ukuran_sepatu' => $this->ukuran_sepatu,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'nama_ayah', $this->nama_ayah])
            ->andFilterWhere(['like', 'nama_ibu', $this->nama_ibu])
            ->andFilterWhere(['like', 'nomor_kk', $this->nomor_kk]);

        return $dataProvider;
    }
}
