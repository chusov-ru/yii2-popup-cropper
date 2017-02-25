<?php

namespace chusov\cropper;

use Yii;
use yii\base\Widget;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\JsExpression;

class Cropper extends Widget {

    public $content;
    public $popupTitle = 'Crop image';

    /**
     * If user has active avatar file
     * exits=true (use for show remove avatar button)
     */
    public $exists = false;

    /**
     * Widget init
     */
    public function init() {

        CropperlibAsset::register($this->view);
        CropperAsset::register($this->view);
        parent::init();
    }

    /**
     * Run widget
     */
    public function run() {

        echo $this->render('image', [
            'id' => $this->id,
            'content' => $this->content,
            'popupTitle' => $this->popupTitle,
            'exists' => $this->exists,
        ]);

    }
}
