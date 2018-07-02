$( document ).ready(function() {
    $('.adminPanelTableRow').click(function () {
        if ($(this).find('.form-check-input').prop("checked")) {
            $(this).find('.form-check-input').prop("checked", false);
            $(this).css('background-color', 'transparent');
        } else {
            $(this).css('background-color', '#d4d4d4');
            $(this).find('.form-check-input').prop("checked", true);
        }
    });

    $('.adminCheckerAll').click(function () {
        if ($(this).prop("checked")) {
            $('.adminPanelTableRow .tableChecker').prop("checked", true);
            $('.adminPanelTableRow').css('background-color', '#d4d4d4');
        } else {
            $('.adminPanelTableRow .tableChecker').prop("checked", false);
            $('.adminPanelTableRow').css('background-color', 'transparent');
        }
    });
});