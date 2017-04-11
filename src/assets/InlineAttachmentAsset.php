<?php
/**
 * Author: dungang
 * Date: 2017/4/10
 * Time: 19:23
 */

namespace dungang\inlineattachment\assets;


use yii\web\AssetBundle;

class InlineAttachmentAsset extends AssetBundle{

    public $sourcePath = '@bower/inline-attachment/dist';

    public function init()
    {
        if(YII_DEBUG) {
            $this->js = ['inline-attachment.js'];
        } else {
            $this->js = ['inline-attachment.min.js'];
        }
    }
}