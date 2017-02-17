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

    public $template;

    /*
    // Primary key value записи
    public $pk;
    public $key = 'key';

    // Директория файлы которой выводятся для выбора изображения
    public $folder;

    // Путь до выбранной картинки
    public $path;

    // Путь до картинки по умолчанию
    public $defaultPath = '/common/img/spacer.gif';

    public $editMode = null;

    // Шаблон для картинки в режиме просмотра
    public $showTpl = '<img src="{src}" style="{showStyle}">';

    // Шаблон картинки в режиме редактирования
    public $editTpl = '<img src="{src}" style="{editStyle}"><span data-function="eip-image-remove" class="eip-img-remove" style="{removeStyle}" title="удалить изображение"></span>';

    // Если нужно сгенерировать новый диалог под данный набор записей
    public $dialogId = null;

    // Url для сохранения значения в поле объекта
    public $saveUrl;

    // Функция, вызываемая после удаления картинки файла
    public $removeCallback = 'function(){
        window.EipFileSave($object, "");
        $object.find("img").attr("src", "/common/img/spacer.gif");
        $object.find("[data-function=\'eip-image-remove\']").hide();
    }';

    public $getvalueCallback = 'function(){
        var value = $object.find("img").attr("src");
        return value;
    }';

    // Функция, вызываемая после выбора файла изображения в редакторе
    // для случая когда нужно выставить значение не в img.src, а куда либо еще
    public $returnCallback = 'function(src){
        window.EipFileSave($object, src, function(data){
            $object.find("img").attr("src", data.value);
            $object.find("[data-function=\'eip-image-remove\']").show();
        })
    }';

    // Сохранять ли url картинки для сущности
    public $saveFile = true;

    // Фильтр файлов в диалоге
    public $fileFilter = 'image';

    // Inline стиль картинки для режима редактирования
    // для случая когда не хочется изменять editTpl
    public $editStyle = '';

    // Inline стиль картинки для режима просмотра
    // для случая когда не хочется изменять showTpl
    public $showStyle = '';

    public static $dialogInstance = [];

    public function getKey(){
        return $this->key . '-' . $this->pk;
    }
    */

    /**
     * Widget init
     */
    public function init() {

        CropperAsset::register($this->view);
        parent::init();

        /*
        $this->folder = Yii::getAlias($this->folder);

        if(empty($this->language)) {
            $this->language = ElFinder::getSupportedLanguage(\Yii::$app->language);
        }

        if( $this->editMode === null ){
            $this->editMode = Yii::$app->access->canEditPage(true);
        }
        */
    }

    /**
     * Run widget
     */
    public function run() {

        echo $this->render('image', [
            'id' => $this->id,
            'template' => $this->template
        ]);

        /*
        $dialogId = $this->dialogId ? $this->dialogId : $this->key;

        // режим просмотра
        $replace = [
            '{src}' => $this->path,
            '{showStyle}' => $this->showStyle,
            '{key}' => $this->key,
            '{data-id}' => $this->pk,
        ];

        echo '<div class="ImageContainerBlock">';

        if($this->editMode) {

            $src = empty($this->path) ? $this->defaultPath : str_replace("//",'/',$this->path);

            $replace = [

                // url адрес файла
                '{src}' => $src,
                // идентификатор записи в бд
                '{data-id}' => $this->pk,
                // необходим для обращения к конкретному блоку
                '{data-key}' => $this->getKey(),

                // идентификатор файлового диалога
                '{data-dialog-id}' => $dialogId,

                // стили для виджета редактирования
                '{editStyle}' => $this->editStyle,

                // стили кнопки удаления
                '{removeStyle}' => empty($this->path) ? 'display:none' : '',

                // адрес для сохранения данных поля
                '{data-url}' => Url::to($this->saveUrl),

                // класс, определяющий что файл не выбран
                '{noset}' => ( empty($this->path) ? 'eip-noset' : '' ),
            ];

            $template = '<div class="eip-edit_block eip-image_block {noset}" data-module="eip-image" data-id="{data-id}" data-url="{data-url}" data-key="{data-key}" data-dialog-id="{data-dialog-id}" style="{editStyle}">' . $this->editTpl . '</div>';

            echo str_replace(array_keys($replace), $replace, $template);

        } else {
            echo '<div class="eip-view_block">';
            echo str_replace(array_keys($replace), $replace, $this->showTpl);
            echo '</div>';
        }
        echo '</div>';

        // Elfinder для режима редактирования
        if($this->editMode) {

            // Create callback functions
            echo "<script>(function(){ \n" .
                'var $object = $("[data-key=\'' . $this->getKey() . '\']");' . "\n" .
                'window.EipFileData = window.EipFileData || {};' . "\n" .
                'window.EipFileData["' . $this->getKey() . '"] = {};' . "\n" .
                'window.EipFileData["' . $this->getKey() . '"]["get"] = ' . $this->getvalueCallback . ';' . "\n" .
                'window.EipFileData["' . $this->getKey() . '"]["remove"] = ' . $this->removeCallback . ';' . "\n" .
                'window.EipFileData["' . $this->getKey() . '"]["select"] = ' . $this->returnCallback . ';' . "\n" .
            '})();</script>';

            // Add elfinder dialog widget
            if( !isset(self::$dialogInstance[$dialogId]) ){

                // Добавляем cropper
                echo $this->render('cropper_popup', ['id' => $this->key, 'path' => $this->path]);

                // Добавляем elfinder
                self::$dialogInstance[$dialogId] = 1;

                echo Html::beginTag('div', ['class' => $dialogId . '-dialog', 'style' => 'display: none;' ]);

                echo ElFinder::widget([
                    'language' => $this->language,
                    'controller' => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
                    'path' => $this->folder, // будет открыта папка из настроек контроллера с добавлением указанной поддеритории
                    'filter' => $this->fileFilter,    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes

                    'callbackFunction' => new JsExpression('function(file, id) {

                        var imageId = window.EipFileCurrentDialog["' . $dialogId . '"];
                        var $object = $("[data-key=\'"+imageId+"\']");
                        var filename = file.url;
                        var dialogId = "' . $dialogId .'";

                        // Запускаем callback
                        window.EipFileFunction($object).select(filename);

                        // закрываем диалог
                        $(".' . $dialogId . '-dialog").dialog("close");

                    }'), // id - id виджета
                    'frameOptions' => [
                        'style' => 'width: 100%; height: 500px; border: 0px;',
                    ]
                ]);

                echo Html::endTag('div');

            }

        }*/

    }
}
