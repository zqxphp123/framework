<?php
namespace frontend\controllers;

use Yii;
use common\models\T1;
use yii\web\Controller;

class TestController extends Controller
{
    //声明去掉当前控制器加载视图的头部底部公共部分，否则yii2会自动加载
    public $layout = false;

    public function actionIndex()
    {
        $t1_one=T1::findOne(1);
        $t1_two=T1::find()->where(['id'=>1])->one();
        echo '<pre />';
        echo $t1_one->uname;
        

    }

    public function actionAdd()
    {
     
    }
}