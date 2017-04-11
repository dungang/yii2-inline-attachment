<?php
/**
 * Author: dungang
 * Date: 2017/4/11
 * Time: 8:19
 */

namespace dungang\inlineattachment\assets;


use yii\web\AssetBundle;

class CodeMirror4InlineAttachmentAsset extends AssetBundle
{
    public $sourcePath = '@bower/inline-attachment/dist';

    public function init()
    {
        if(YII_DEBUG) {
            $this->js = ['codemirror-4.inline-attachment.js'];
            $this->publishOptions = [
                'only'=>['codemirror-4.inline-attachment.js']
            ];

        } else {
            $this->js = ['codemirror-4.inline-attachment.min.js'];
            $this->publishOptions = [
                'only'=>['codemirror-4.inline-attachment.min.js']
            ];
        }
    }
}