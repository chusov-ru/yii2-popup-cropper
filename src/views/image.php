<div class="ch-cropper-block" data-id="<?= $id ?>"><?= $content ?></div>

<div class="ch-cropper-fileuploader" data-id="<?= $id ?>" style="display:none">
<input type="file" class="ch-cropper-file" data-id="<?= $id ?>" name="ch-cropper-file"/>
</div>

<div class="ch-cropper-popup modal fade cropper" data-id="<?= $id ?>" role="dialog">

    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><?= $popupTitle ?></h4>
        </div>
        <div class="modal-body ">
            <div class="img-container" style="min-height: 400px">
              <img id="image" alt="Изображение">
            </div>
        </div>
        <div class="modal-footer">
            <div class="docs-buttons clearfix">
              <div class="btn-group btn-group-crop pull-right">
                <button type="button" class="btn btn-contrast" data-method="saveCanvas">
                  <span class="docs-tooltip" title="Сохранить изображение">Сохранить</span>
                </button>
              </div><!-- btn-group -->
            </div><!-- docs-buttons -->
        </div>
      </div>
    </div>

</div>

