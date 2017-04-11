<?php
/**
 * Author: dungang
 * Date: 2017/4/11
 * Time: 8:27
 */

namespace dungang\inlineattachment\actions;


use dungang\storage\ActionTrait;
use yii\base\Action;
use yii\helpers\Json;

class UploadAction extends Action
{

    use ActionTrait;

    public function run()
    {
        if ($post = \Yii::$app->request->post()) {
            unset($post[\Yii::$app->request->csrfParam]);
            $this->instanceDriver($post);
            $rst = $this->driverInstance->save();
            if ($rst['code'] == 0 ) {
                /* @var $file \dungang\storage\File */
                $file = $rst['object'];
                return Json::encode([
                    'success'=>true,
                    'url'=>$file->url,
                    'place'=>$file->provider,
                    'path'=>$file->object,
                ]);

            } else {
                return Json::encode([
                    'success'=>false,
                    'message' => $rst['message']
                ]);
            }

        }

        return Json::encode([
            'success'=>false,
            'message' => '请求不正确'
        ]);
    }
}