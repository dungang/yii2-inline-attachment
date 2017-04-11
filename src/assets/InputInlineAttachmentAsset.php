<?php
/**
 * Author: dungang
 * Date: 2017/4/11
 * Time: 12:53
 */

namespace dungang\inlineattachment\assets;


use yii\web\AssetBundle;

class InputInlineAttachmentAsset extends AssetBundle
{
    public $sourcePath = '@bower/inline-attachment/src';

    public $depends = ['dungang\inlineattachment\assets\InlineAttachmentAsset'];

    public function init()
    {
            $this->js = ['input.inline-attachment.js'];
            $this->publishOptions = [
                'only'=>['input.inline-attachment.js']
            ];
    }
}