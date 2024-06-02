import $ from 'jquery';
window.$ = $;

// 口コミ星の塗りつぶし機能
$(document).ready(function () {
    var initialScore = $('#score-value').val();
    $('.star').each(function () {
        if ($(this).data('value') <= initialScore) {
            $(this).addClass('filled');
        } else {
            $(this).removeClass('filled');
        }
    });
    $('.star').on('click', function () {
        var score = $(this).data('value');
        $('#score-value').val(score);
        $('.star').each(function () {
            if ($(this).data('value') <= score) {
                $(this).addClass('filled');
            } else {
                $(this).removeClass('filled');
            }
        });
    });
});

// 口コミtextarea入力文字数のカウント機能
$(function(){
    $('#text-count').keyup(function(){
        var count = $(this).val().length;
        $('.limit-number').text(count);
    });
});