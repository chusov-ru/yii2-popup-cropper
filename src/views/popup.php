<div class="ch-cropper-popup modal fade cropper" data-id="<?= $id ?>" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Обрезка изображения</h4>
      </div>
      <div class="modal-body ">

                <div class="img-container">
                  <img id="image" alt="Изображение">
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="docs-data">
                      <p>Размеры изображения</p>
                      <div class="input-group input-group-sm">
                        <label class="input-group-addon" for="dataWidth">Ширина:</label>
                        <input type="text" class="form-control" id="dataWidth" placeholder="...">
                        <span class="input-group-addon">px</span>
                      </div>
                      <div class="input-group input-group-sm">
                        <label class="input-group-addon" for="dataHeight">Высота:</label>
                        <input type="text" class="form-control" id="dataHeight" placeholder="...">
                        <span class="input-group-addon">px</span>
                      </div>
                    </div><!-- docs-data -->
                  </div><!-- col-md-4 -->

                  <div class="col-md-8">
                    <div class="docs-toggles">
                      <p>Соотношение ширины изображения и высоты</p>
                      <div class="btn-group btn-group-justified" data-toggle="buttons">
                        <label class="btn eip-btn active">
                          <input type="radio" class="sr-only" id="aspectRatio0" name="aspectRatio" value="2.28571428">
                          <span class="docs-tooltip" title="соотношение: 16 / 7">16:7</span>
                        </label>
                        <label class="btn eip-btn">
                          <input type="radio" class="sr-only" id="aspectRatio0" name="aspectRatio" value="1.7777777777777777">
                          <span class="docs-tooltip" title="соотношение: 16 / 9">16:9</span>
                        </label>
                        <label class="btn eip-btn">
                          <input type="radio" class="sr-only" id="aspectRatio1" name="aspectRatio" value="1.3333333333333333">
                          <span class="docs-tooltip"  title="соотношение: 4 / 3">4:3</span>
                        </label>
                        <label class="btn eip-btn">
                          <input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1">
                          <span class="docs-tooltip" title="соотношение: 1 / 1">1:1</span>
                        </label>
                        <label class="btn eip-btn">
                          <input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="">
                          <span class="docs-tooltip" title="соотношение: свое ">свое</span>
                        </label>
                      </div><!-- btn-group -->
                    </div><!-- docs-toggles -->
                  </div><!-- col -->
                </div><!-- row -->

                <div class="docs-buttons clearfix">
                  <div class="btn-group btn-group-crop pull-right">
                    <button type="button" class="btn btn-contrast" data-method="saveCanvas">
                      <span class="docs-tooltip" title="Сохранить изображение">Сохранить</span>
                    </button>
                  </div><!-- btn-group -->
                </div><!-- docs-buttons -->

      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>

