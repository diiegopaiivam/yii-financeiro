<?php 

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Bill;

class ReportsController extends Controller
{
    public function actionIndex()
    {

        /** @var Bill[] $billsAll */
        $billsAll = Bill::find()->orderBy('date ASC')->all();

        $results = [];

        foreach($billsAll as $bills) {
            $results[$bills->date][] = $bills;
        }

        return $this->render('index', [
            'data' => $results
            ]
        );
    }
}

