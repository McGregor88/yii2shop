<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Description of ltAppAsset
 *
 * @author User
 */
class ltAppAsset  extends AssetBundle 
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    public $js = [
        'js/html5shiv.js',
        'js/respond.min.js',
    ];
    
    public $jsOptions = [
        'condition' => 'lte IE9',
        'position' => \yii\web\View::POS_HEAD
    ];
}
