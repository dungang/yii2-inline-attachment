<?php
/**
 * Author: dungang
 * Date: 2017/4/11
 * Time: 8:20
 */

namespace dungang\inlineattachment\assets;


use yii\web\AssetBundle;

class AngularInlineAttachmentAsset extends AssetBundle
{
    public $sourcePath = '@bower/inline-attachment/dist';

    public $depends = ['dungang\inlineattachment\assets\InputInlineAttachmentAsset'];

    public function init()
    {
        if(YII_DEBUG) {
            $this->js = ['angularjs.inline-attachment.js'];

        } else {
            $this->js = ['angularjs.inline-attachment.min.js'];
        }
    }
}