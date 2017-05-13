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
use yii\data\Pagination;

/**
 * Description of CategoryController
 *
 * @author User
 */
class CategoryController extends AppController
{
    
    public function actionIndex()
    {
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('E-SHOPPER');
        return $this->render('index', compact('hits'));
    }
    
    public function actionView($id)
    {
//        $id = Yii::$app->request->get('id');
        
        $category = Category::findOne($id);
        if(empty($category)) {
            throw new \yii\web\HttpException(404, 'Такой категории не существует...');
        }
        
//        $products = Product::find()->where(['category_id' => $id])->all();
        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta('E-SHOPPER | ' . $category->name, $category->keywords, $category->description);
        return $this->render('view', compact('products', 'pages', 'category'));
    }
    
    public function actionSearch()
    {
        $query = trim(Yii::$app->request->get('query'));
        $this->setMeta('E-SHOPPER | Поиск: ' . $query);
        if(!$query) {
            return $this->render('search');
        }
        $sql = Product::find()->where(['like', 'name', $query]);
        $pages = new Pagination([
            'totalCount' => $sql->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $sql->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('products', 'pages', 'query'));
    }
    
}
