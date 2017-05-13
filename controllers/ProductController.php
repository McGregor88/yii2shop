<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;

/**
 * Description of ProductController
 *
 * @author User
 */
class ProductController extends AppController
{
    
    public function actionView($id)
    {
//        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if(empty($product)) {
            throw new \yii\web\HttpException(404, 'Такого товара не существует...');
        }
        return $this->render('view', compact('product'));
    }
    
}
