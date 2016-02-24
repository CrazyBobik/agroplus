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
            url: '/file/delete',
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

    initTinyMCE();
});

function reloadChoiceFile(){
    $.ajax({
        url: '/admin/choicefile/genHTML/ajax',
        success: function (html) {
            $('.choice-img').fadeOut(300, function () {
                $(this).html(html).fadeIn(300);
            });
        }
    });
}

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
        url: '/file/all-img',
        success: function (html) {
            $('.choice-img-container').html(html);
        }
    })
}