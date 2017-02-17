$( function(){

    // Open file upload dialog
    $(document).on('click', '.ch-cropper-block', function(){

        var id = $(this).data('id');
        var $file = $('.ch-cropper-file[data-id="'+id+'"]');

        $file.click();
    });

    // File upload process
    $(document).on('change', 'input.ch-cropper-file', function(){

        var $input = $(this);
        var id = $input.data('id');

        var formData = new FormData();

        formData.append('ch-cropper-tmp-ajax', 1);
        formData.append('ch-cropper-file', $input[0].files[0]);

        $.ajax({
               url : '',
               type : 'POST',
               data : formData,
               processData: false,  // tell jQuery not to process the data
               contentType: false,  // tell jQuery not to set contentType
               success : function(data) {

                  // путь до файла
                  // открываем кроппер
                  alert(data.path)
               }
        });

       // alert($input.val());
    });



});
