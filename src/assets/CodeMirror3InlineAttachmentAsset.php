<?php
/**
 * Author: dungang
 * Date: 2017/4/11
 * Time: 8:17
 */

namespace dungang\inlineattachment\assets;


use yii\web\AssetBundle;

class CodeMirror3InlineAttachmentAsset extends AssetBundle
{
    public $sourcePath = '@bower/inline-attachment/dist';

    public function init()
    {
        if(YII_DEBUG) {
            $this->js = ['codemirror-3.inline-attachment.js'];
            $this->publishOptions = [
                'only'=>['codemirror-3.inline-attachment.js']
            ];

        } else {
            $this->js = ['codemirror-3.inline-attachment.min.js'];
            $this->publishOptions = [
                'only'=>['codemirror-3.inline-attachment.min.js']
            ];
        }
    }
}