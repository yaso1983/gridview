<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

class SupperSearch extends Supper
{

    public function rules()
    {
        // 只有在 rules() 函数中声明的字段才可以搜索,不声明不显示搜索框
        return [
            [['id', 'name', 'code', 't_status'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = Supper::find();

        if (!Yii::$app->request->get('sort')) {
            $query->orderBy('id desc');
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 2,
            ],
            //排序
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC]
            ]
        ]);

        // 从参数的数据中加载过滤条件，并验证
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        // 增加过滤条件来调整查询对象
        if ($this->name) {
            $query->andFilterWhere(['like', 'name', $this->name]);
        }
        if ($this->code) {
            $query->andFilterWhere(['like', 'code', $this->code]);
        }
        if ($this->t_status) {
            $query->andFilterWhere(['=', 't_status', $this->t_status]);
        }
        if ($this->id) {
            $value = explode(' ', trim($this->id));
            $query->andFilterWhere([$value[0], 'id', $value[1]]);
        }

        return $dataProvider;
    }
}
