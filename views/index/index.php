<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\SupperSearch;

?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">供应商列表</h3>
            </div>
            <div class="box-body table-responsive">
                <?php
                echo GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,

                    'emptyText' => '当前没有内容',
                    'emptyTextOptions' => ['style' => 'color:red;font-weight:bold'],
                    //给所有的行属性增加id，或class，方便后面选择后整行改变颜色
                    'rowOptions' => function ($model) {
                        return ['id' => "tr-" . $model->id];
                    },
                    'showFooter' => true,
                    // 'showHeader' => false,
                    'columns' => [

                        [
                            'class' => 'yii\grid\CheckboxColumn', //ActionColumn 显示多选框CheckboxColumn
                            //'footerOptions' => ['colspan' => 1],
                            'footer' => '<a href="javascript:;" class="_delete_all" data-url="' . Yii::$app->urlManager->createUrl(['/attend/delete_all']) . '">删除全部</a>',
                        ],
                        /* [
                            'class' => 'yii\grid\SerialColumn', //显示单选框SerialColumn 显示行号
                            'header' => '序号',
                            'headerOptions' => ['width' => '50'],
                        ],
                        [
                            'class' => 'yii\grid\RadioButtonColumn', //显示复选框RadioButtonColumn
                            'radioOptions' => function ($model) {
                                return [
                                    'value' => 1,
                                    'checked' => 2 == 2
                                ];
                            }
                        ], */
                        [
                            'attribute' => 'id',
                            'filter' => SupperSearch::selectList('id'), //下拉选择内容
                            'headerOptions' => ['width' => '120'],
                            //'footerOptions' => ['class' => 'hide'], //隐藏底部的当前列
                        ],
                        'name',
                        'code',
                        [
                            'attribute' => 't_status',
                            'value' => function ($data) {
                                return SupperSearch::selectList('t_status', $data->t_status);
                            },
                            'filter' => SupperSearch::selectList('t_status'), //下拉选择内容
                            //'footerOptions' => ['class' => 'hide'], //隐藏底部的当前列        
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn', //显示操作按钮等
                            //控制
                            "header" => "操作",
                            'headerOptions' => ['width' => '100'],
                            'template' => '{get} {yes} {no} {update} {delete}',

                            "buttons" => [
                                "delete" => function ($url, $model, $key) {
                                    return "<a href='javascript:;' class='_delete' data-url='" . Yii::$app->urlManager->createUrl(['/attend/delete_js', 'id' => $model->id]) . "'>删除</a>";
                                },
                                "update" => function ($url, $model, $key) {
                                    $str = '';
                                    $str = Html::a('<span class="glyphicon glyphicon-pencil"></span>', Url::to(['attend/edit', 'id' => $model->id]), ['title' => '修改']);
                                    return $str;
                                },
                            ],
                            'footerOptions' => ['class' => 'hide'],
                        ],
                    ]
                ]);
                ?>
            </div>
        </div>
        <style>
            .select_bg {
                background: BCC8D0;
            }
        </style>