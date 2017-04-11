<?php
/**
 * Author: dungang
 * Date: 2017/4/11
 * Time: 8:47
 */

namespace dungang\inlineattachment\widgets;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\widgets\InputWidget;

class CodeMirrorInlineAttachment extends InputWidget
{

    public $version = '4'; //3,4s

    public $clientOptions = [];

    public function run()
    {
        $this->clientOptions = ArrayHelper::merge([
            'lineNumbers'=>true,
            'matchBrackets'=> true,
            'indentUnit'=> 4,
            'indentWithTabs'=>true,
            'enterMode'=>"keep",
            'tabMode'=> "shift"
        ],$this->clientOptions);
        if(empty($this->clientOptions['uploadUrl'])) {
            $this->clientOptions['uploadUrl'] = Url::to('/inline-attachment/file');
        }
        $id = $this->options['id'];
        $inlineAttachment = 'dungang\inlineattachment\assets\CodeMirror'.$this->version.'InlineAttachmentAsset';
        call_user_func($inlineAttachment . '::register',$this->view);
        $options = Json::encode($this->clientOptions);
        $this->view->
        registerJs("inlineAttachment.editors.codemirror$this->version.attach(
        CodeMirror.fromTextArea(document.getElementById('$id',$options))
        );");
        if ($this->hasModel()) {
            return Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            return Html::textarea($this->id, $this->value, $this->options);
        }
    }
}