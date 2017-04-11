<?php
/**
 * Author: dungang
 * Date: 2017/4/11
 * Time: 8:47
 */

namespace dungang\inlineattachment\widgets;


use dungang\inlineattachment\assets\InlineAttachmentAsset;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\widgets\InputWidget;

class InlineAttachment extends InputWidget
{

    public $clientOptions = [];

    public function run()
    {
        if(empty($this->clientOptions['uploadUrl'])) {
            $this->clientOptions['uploadUrl'] = Url::to('/inline-attachment/file');
        }
        $id = $this->options['id'];
        InlineAttachmentAsset::register($this->view);
        $options = Json::encode($this->clientOptions);
        $this->view->
        registerJs("inlineAttachment.editors.input.attachToInput(document.getElementById('$id',$options));");
        if ($this->hasModel()) {
            return Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            return Html::textarea($this->id, $this->value, $this->options);
        }
    }
}