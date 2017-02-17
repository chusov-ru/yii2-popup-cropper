<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014
 * @package yii2-widgets
 * @subpackage yii2-widget-affix
 * @version 1.0.0
 */

namespace chusov\cropper;

/**
 * Asset bundle for Cropper bower lib Widget
 *
 * @author Eugene Chusov <eugene@chusov.ru>
 * @since 1.0
 */
class CropperlibAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@bower/cropper';

    public $css = [
        ['dist/cropper.min.css'],
    ];

    public $js = [
        ['dist/cropper.min.js'],
    ];

    public $depends = [];
}
