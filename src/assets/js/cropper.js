
$(function(){

    $.EipCropperClose = function(imageKey){
          var key = imageKey.split('-')[0];
          $("#cropper_" + key).modal('hide');
    }

    $.EipCropperOpen = function(imageKey, cropUrl, src, callback, fixedCrop){

          var key = imageKey.split('-')[0];
          var $window = $('#cropper_'  + key);
          var $visualBox = $window.find('.img-container');

          $visualBox.css('visibility', 'hidden');
          $window.modal();

          setTimeout( function(){
              initCropper(imageKey, cropUrl, src, callback, fixedCrop);
          }, 400);
    }

});

/**
 * Cropper initialization
 */
var initCropper = (function(imageKey, cropUrl, src, callback, fixedCrop) {

    'use strict';

    var key = imageKey.split('-')[0];
    var $window = $('#cropper_' + key);

    var $visualBox = $window.find('.img-container');
    var console = window.console || { log: function () {} };

    var $object = $('[data-key="' + imageKey + '"]');
    var $image = $window.find('#image');
    var $download = $window.find('#download');
    var $dataX = $window.find('#dataX');
    var $dataY = $window.find('#dataY');
    var $dataHeight = $window.find('#dataHeight');
    var $dataWidth = $window.find('#dataWidth');
    var $dataRotate = $window.find('#dataRotate');
    var $dataScaleX = $window.find('#dataScaleX');
    var $dataScaleY = $window.find('#dataScaleY');

    // Tooltip
    //$visualBox.css('visibility', 'hidden');

    //
    $window.find('[data-toggle="tooltip"]').tooltip();

    // Устанавливаем картинку
    $image.attr('src', src);

    /**
     * Options
     */
    var $cropSize = $('.docs-toggles');
    if( fixedCrop ){
        $cropSize.hide();
    } else {
        $cropSize.show();
    }

    var options = {
        aspectRatio: fixedCrop ? fixedCrop : $('.docs-toggles label.active input').val(),
        preview: '.img-preview',
        dragMode: 'move',
        movable: true,
        viewMode: 1,
        autoCropArea: 1,
        crop: function (e) {
            $dataX.val(Math.round(e.x));
            $dataY.val(Math.round(e.y));
            $dataHeight.val(Math.round(e.height));
            $dataWidth.val(Math.round(e.width));
            $dataRotate.val(e.rotate);
            $dataScaleX.val(e.scaleX);
            $dataScaleY.val(e.scaleY);
        }
    }

    $image.on('built.cropper', function(){
        $visualBox.css('visibility', 'visible');
    })

    // init or replace image
    $image.data('init', true);
    $image.cropper('destroy').cropper(options);

    // set aspect ration
    $window.find('.docs-toggles').on('change', 'input', function () {
        var $this = $(this);
        var name = $this.attr('name');
        $image.cropper('setAspectRatio', $this.val());
    });

    // Options
    $window.find('[data-method="saveCanvas"]').unbind().on('click', function (e) {

        e.preventDefault();

        var data = $image.cropper('getData', true);
        data.src = $image.attr('src');

        // Данные картинки
        data.pk = $object.attr('data-id');

        $.ajax( cropUrl, {
            type: 'post',
            data: data,
            dataType: 'json',
            success: function (data) {
                callback( imageKey, data.src + '?' + (new Date()).getTime() );
            },
        });

        return false;
    });

    // Keyboard
    $(document.body).on('keydown', function (e) {

        if (!$image.data('cropper') || this.scrollTop > 300) {
          return;
        }

        switch (e.which) {
          case 37:
            e.preventDefault();
            $image.cropper('move', -1, 0);
            break;

          case 38:
            e.preventDefault();
            $image.cropper('move', 0, -1);
            break;

          case 39:
            e.preventDefault();
            $image.cropper('move', 1, 0);
            break;

          case 40:
            e.preventDefault();
            $image.cropper('move', 0, 1);
            break;
        }

    });

});
