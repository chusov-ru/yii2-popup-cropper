<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014
 * @package yii2-widgets
 * @subpackage yii2-widget-affix
 * @version 1.0.0
 */

namespace chusov\cropper;

/**
 * Asset bundle for Cropper Widget
 *
 * @author Eugene Chusov <eugene@chusov.ru>
 * @since 1.0
 */
class CropperAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@chusov/cropper/assets';

    public $css = [
        ['@bower/cropper/cropper.css'],
    ];

    public $js = [
        ['js/widget.js'],
        ['js/cropper.js'],
        ['@bower/cropper/cropper.js'],
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];

}
