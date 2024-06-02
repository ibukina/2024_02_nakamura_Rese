import $ from 'jquery';
window.$ = $;

$(document).ready(function () {
    $('.star').on('click', function () {
        var score = $(this).data('value');
        $('#score-value').val(score);
        $('.star').each(function () {
            if ($(this).data('value') <= score) {
                $(this).addClass('filled');
            } else {
                $(this).removeClass('filled');
            }
        })
    })
})