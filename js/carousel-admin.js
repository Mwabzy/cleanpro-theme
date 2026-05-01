jQuery(function ($) {

    // Open the WP media picker and set the selected image
    $(document).on('click', '.wf-upload', function (e) {
        e.preventDefault();

        var $btn       = $(this);
        var $row       = $btn.closest('.wf-slide-row');
        var $preview   = $row.find('.wf-preview');
        var $idInput   = $row.find('.wf-img-id');
        var $removeBtn = $row.find('.wf-remove');

        var frame = wp.media({
            title   : 'Select Slide Image',
            button  : { text: 'Use this image' },
            multiple: false
        });

        frame.on('select', function () {
            var att = frame.state().get('selection').first().toJSON();
            $idInput.val(att.id);
            $preview.html(
                '<img src="' + att.url + '" style="width:100%;height:100%;object-fit:cover;">'
            );
            $removeBtn.show();
            $btn.text('Change Image');
        });

        frame.open();
    });

    // Remove the selected image
    $(document).on('click', '.wf-remove', function (e) {
        e.preventDefault();
        var $row = $(this).closest('.wf-slide-row');
        $row.find('.wf-img-id').val('');
        $row.find('.wf-preview').html(
            '<span style="color:#999;font-size:11px;text-align:center;line-height:1.6;">No image<br>selected</span>'
        );
        $(this).hide();
        $row.find('.wf-upload').text('Upload / Select Image');
    });

});
