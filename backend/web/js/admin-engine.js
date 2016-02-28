/**
 * Created by CrazyBobik on 13.10.2015.
 */
$(function () {
    var modal = $('#modal');
    var center = $('#center');

    center.on('click', '.delete-img', function () {
        var name = $(this).data('name');
        $('#' + name).val('');
        $('.prev-img[data-name="' + name + '"]').slideUp(300);
    });

    center.on('click', '.one-img .choice', function(){
        var val = $(this).attr('src');
        val = '<img src="' + val + '">';
        if(tinymce.activeEditor !== null) {
            tinymce.activeEditor.execCommand('mceInsertContent', false, val);
        }
    });
    center.on('click', '.one-img.upload', function(){
        $('#upload-new-file').click();
    });

    center.on('click', '.del-img', function () {
        var elem = $(this);
        var name = $(this).data('name');
        $.ajax({
            url: '/backend/file/delete',
            method: 'POST',
            data: {name: name},
            success: function (result) {
                if(result == true) {
                    elem.parent().slideUp(300, function () {
                        $(this).remove();
                    });
                }
            }
        })
    });
    center.on('change', '#objects-category', function () {
        var id = $(this).val();

        $.ajax({
            url: '/backend/objects/change-fields',
            method: 'get',
            data: {id: id},
            success: function (html) {
                $('.diff-fields').html(html);
            }
        })
    });

    initTinyMCE();
});

function initTinyMCE(){
    var selector = '.tinymce textarea';

    tinymce.init({
        selector: selector,
        plugins: 'autolink autoresize link image lists preview table code wordcount',
        autoresize_min_height: 250,
        autoresize_max_height: 500,
        image_dimensions: false
    });
    $(selector).each(function(){
        $(this).closest('.row').find('.row-item').css('width', '100%');
    });
    $('.tinymce').after('<div class="choice-img-container"></div>');
    loadAllFiles();
}

function loadAllFiles(){
    $.ajax({
        url: '/backend/file/all-img',
        success: function (html) {
            $('.choice-img-container').html(html);
        }
    })
}