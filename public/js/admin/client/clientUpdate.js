$('#clientSaveBtn').click(function () {
    var inputVal = '{';
    $('.updateRow').each(function () {
        var userId = $(this).attr('id');
        inputVal += '"'+userId+'":{';
        if ($(this).find('#updateClientName').val() !== "") {
            inputVal += '"name":"'+$(this).find('#updateClientName').val()+'",';
        }
        if ($(this).find('#updateClientEmail').val()  !== "") {
            inputVal += '"email":"'+$(this).find('#updateClientEmail').val()+'",';
        }
        if ($(this).find('#updateClientFirstName').val() !== "") {
            inputVal += '"first_name":"'+$(this).find('#updateClientFirstName').val()+'",';
        }
        if ($(this).find('#updateClientPatronymic').val() !== "") {
            inputVal += '"patronymic":"'+$(this).find('#updateClientPatronymic').val()+'",';
        }
        if ($(this).find('#updateClientLastName').val() !== "") {
            inputVal += '"last_name":"'+$(this).find('#updateClientLastName').val()+'",';
        }
        if ($(this).find('#updateClientPhoneNumber').val() !== "") {
            inputVal += '"phone_number":"'+$(this).find('#updateClientPhoneNumber').val()+'",';
        }
        if ($(this).find('#updateClientPassSerial').val() !== "") {
            inputVal += '"pass_serial":"'+$(this).find('#updateClientPassSerial').val()+'",';
        }
        if ($(this).find('#updateClientPassNumber').val() !== "") {
            inputVal += '"pass_number":"'+$(this).find('#updateClientPassNumber').val()+'",';
        }
        if ($(this).find('#updateClientPassDate').val() !== "") {
            inputVal += '"pass_date":"'+$(this).find('#updateClientPassDate').val()+'",';
        }
        if ($(this).find('#updateClientCity').val() !== "") {
            inputVal += '"city":"'+$(this).find('#updateClientCity').val()+'"';
        }
        inputVal += '},';
    });
    inputVal = inputVal.substring(0, inputVal.length - 1);
    inputVal += '}';
    $.ajax({
        url: '/updateUsers',
        type: 'POST',
        dataType: 'HTML',
        data: {'inputVal': inputVal},
        success: function (rezult) {
            $('#resultWrapper').empty();
            $('#resultWrapper').html(rezult);
        }
    });
});