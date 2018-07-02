$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#adminClientUpdate').click(function () {
        var checked = '{';
        $('.clientsTableRow input:checkbox:checked').each(function () {
            checked += '"id'+$(this).attr('userId') + '":' + $(this).attr('userId')+',';
        });
        checked = checked.substring(0, checked.length - 1);
        checked += '}';
        if (checked !== '}') {
            $.ajax({
                url: '/updateUsersRow',
                type: 'POST',
                dataType: 'HTML',
                data: {'checked': checked},
                success: function (rezult) {
                    $('.liveSearchResult').empty();
                    $('.liveSearchResult').html(rezult);
                    $('.updateBtns').removeClass('updateBtns');
                }
            });
        } else {
            alert('Выберете пользователя');
        }
    });

    $('#adminClientDelete').click(function () {
        var confDel = confirm('Вы уверены, что хотите удалить пользователя?');
        if (confDel) {
            var checked = '{';
            $('.clientsTableRow input:checkbox:checked').each(function () {
                checked += '"'+$(this).attr('id') + '":' + $(this).attr('userId') +',';
            });
            checked = checked.substring(0, checked.length - 1);
            checked += '}';
            $.ajax({
                url: '/deleteUsers',
                type: 'POST',
                dataType: 'HTML',
                data: {'checked': checked},
                success: function (rezult) {
                    $(".liveSearchResult").empty();
                    $(".liveSearchResult").html(rezult);
                }
            });
        } else {
            alert('Отмена удаления');
        }
    });

    $('#clientCancelBtn').click(function () {
        $.ajax({
            url: '/clientsAdmin',
            type: 'POST',
            dataType: 'HTML',
            success: function (rezult) {
                $('#resultWrapper').html(rezult);
            }
        });
    });
});