<?php

namespace app\controllers;

use yii;
use yii\web\Controller;
use app\models\Test;

class TestController extends Controller {

    public function actionIndex() {

        $model = new Test();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->session->setFlash('success','Yes It Is Success');
        }

        return $this->render('Index', [
                    'model' => $model
        ]);
    }

}

?>