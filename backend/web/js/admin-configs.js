/**
 * Created by CrazyBobik on 25.01.2016.
 */
$(function () {
    var config = $('#settings');

    $('.toggle-config').on({
        mouseenter: function () {
            $(this).find('.fa-cog').addClass('fa-spin');
        },
        mouseleave: function () {
            $(this).find('.fa-cog').removeClass('fa-spin');
        },
        click: function () {
            toggleConfig();
        }
    });
    config.on('click', '.one-tab', function () {
        var id = $(this).data('id');

        $('.one-tab').removeClass('active');
        $(this).addClass('active');
        $('.tab-context.active').fadeOut(300, function () {
            $(this).removeClass('active');
            $('.tab-context[data-id="' + id + '"]').fadeIn(300, function () {
                $(this).addClass('active');
            });
        });
    });

    $('.style-btn').on('click', function(){
        var color = $(this).data('style');

        $.ajax({
            url: '/backend/helpers/style',
            data: {
                color: color
            },
            success: function (result) {
                if(result){
                    location.reload();
                }
            }
        });
    });
});

function toggleConfig(){
    var config = $('#settings');

    if(parseInt(config.css('width')) == 0) {
        config.css({'width': '230px'});
    } else{
        config.css({'width': '0'});
    }
}