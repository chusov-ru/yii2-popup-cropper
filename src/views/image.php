<div class="ch-cropper-block" data-id="<?= $id ?>"><?= $template ?></div>

<div class="ch-cropper-fileuploader" data-id="<?= $id ?>" style="display:none">
<input type="file" class="ch-cropper-file" data-id="<?= $id ?>" name="ch-cropper-file"/>
</div>

<div class="ch-cropper-popup modal fade cropper" data-id="<?= $id ?>" role="dialog">
<?= $this->render('popup'); ?>
</div>
