function initSlider(selector) {
    var count = selector.find('.slide-one').length;

    var bubbles = '<div class="bubbles">';
    for(var i = 1; i <= count; i++){
        var active = i == 1 ? ' active' : '';
        bubbles += '<div class="one-bubble' + active + '" data-id="' + i + '"></div>'
    }
    bubbles += '</div>';

    selector.append(bubbles);
    selector.find('.slide-one:nth-child(1)').addClass('active').find('img').fadeIn(0);

    $('.one-bubble').on('click', function () {
        $('.one-bubble').removeClass('active');
        $(this).addClass('active');
        var id = $(this).index();
        id++;

        selector.find('.slide-one.active').removeClass('active')
                .find('img').fadeOut(300, function () {
            selector.find('.slide-one:nth-child(' + id + ')').addClass('active')
                    .find('img').fadeIn(300);
        });
    });
}