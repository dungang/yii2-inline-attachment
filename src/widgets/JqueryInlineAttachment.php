<?php
/**
 * Author: dungang
 * Date: 2017/4/11
 * Time: 8:53
 */

namespace dungang\inlineattachment\widgets;



use dungang\inlineattachment\assets\JqueryInlineAttachmentAsset;
use yii\bootstrap\Html;
use yii\bootstrap\InputWidget;
use yii\helpers\Url;

class JqueryInlineAttachment extends InputWidget
{

    public function run()
    {
        if(empty($this->clientOptions['uploadUrl'])) {
            $this->clientOptions['uploadUrl'] = Url::to('/inline-attachment/file');
        }
        JqueryInlineAttachmentAsset::register($this->view);
        $this->registerPlugin('inlineattachment');
        if ($this->hasModel()) {
            return Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            return Html::textarea($this->name, $this->value, $this->options);
        }
    }

}