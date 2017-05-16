<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;
use yii\db\ActiveRecord;

/**
 * Description of Category
 *
 * @author User
 */
class Category extends ActiveRecord 
{
    
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
    public static function tableName() 
    {
        return 'category';
    }
    
    public function getProduct()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
}
