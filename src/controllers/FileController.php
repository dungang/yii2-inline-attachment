<?php
/**
 * Author: dungang
 * Date: 2017/4/11
 * Time: 8:37
 */

namespace dungang\inlineattachment\controllers;


use dungang\storage\ControllerTrait;
use yii\web\Controller;

class FileController extends Controller
{
    use ControllerTrait;

    public function actions()
    {
        $module = $this->module;
        return [
            'index'=>[
                'class'=>'dungang\inlineattachment\actions\UploadAction',
                'accept' => $module->accept
            ]
        ];
    }
}