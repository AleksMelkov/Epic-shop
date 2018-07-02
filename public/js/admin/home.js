$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#personalSave').click(function () {
        var data = [];
        data['phoneNumber'] = $('#InputPhone').val();
        data['email'] = $('#exampleInputEmail').val();
        data['firstName'] = $('#InputFirstName').val();
        data['patronymic'] = $('#InputPatronymic').val();
        data['lastName'] = $('#InputLastName').val();
        data['passSerial'] = $('#InputPassSerial').val();
        data['passNumber'] = $('#InputPassNumber').val();
        data['passDate'] = $('#InputPassDate').val();
        data['city'] = $('#City').val();
        var userId = $('.userInfo').attr('userId');
        // alert('123');
        $.ajax({
            url: '/personalSaveData',
            type: 'POST',
            dataType: 'HTML',
            data: {
                'inputPhone':data['phoneNumber'],
                'inputEmail':data['email'],
                'inputFirstName':data['firstName'],
                'inputPatronymic':data['patronymic'],
                'inputLastName':data['lastName'],
                'inputPassSerial':data['passSerial'],
                'inputPassNumber':data['passNumber'],
                'inputPassDate':data['passDate'],
                'inputCity':data['city'],
                'userInfo':userId
            },
            success: function (rezult) {
                alert('Данные успешно обновлены');
            }
        });
    });
    $('#personalAdminMenu').click(function () {
        $('.active').removeClass('active');
        $(this).addClass('active');
        $.ajax({
            url: '/home',
            type: 'GET',
            dataType: 'HTML',
            success: function (rezult) {
                $('body').html(rezult);
            }
        });
    });
    $('#personalOrdersAdminMenu').click(function () {
        $('.active').removeClass('active');
        $(this).addClass('active');
        $.ajax({
            url: '/personalOrders',
            type: 'POST',
            dataType: 'HTML',
            success: function (rezult) {
                $('#resultWrapper').html(rezult);
            }
        });
    });
    $('#clientsAdminMenu').click(function () {
        $('.active').removeClass('active');
        $(this).addClass('active');
        $.ajax({
            url: '/clientsAdmin',
            type: 'POST',
            dataType: 'HTML',
            success: function (rezult) {
                $('#resultWrapper').html(rezult);
            }
        });
    });
    $('#ordersAdminMenu').click(function () {
        $('.active').removeClass('active');
        $(this).addClass('active');
        $.ajax({
            url: '/ordersAdmin',
            type: 'POST',
            dataType: 'HTML',
            success: function (rezult) {
                $('#resultWrapper').html(rezult);
            }
        });
    });
    $('#couponsAdminMenu').click(function () {
        $('.active').removeClass('active');
        $(this).addClass('active');
        $.ajax({
            url: '/couponsAdmin',
            type: 'POST',
            dataType: 'HTML',
            success: function (rezult) {
                $('#resultWrapper').html(rezult);
            }
        });
    });
    $('#productsAdminMenu').click(function () {
        $('.active').removeClass('active');
        $(this).addClass('active');
        $.ajax({
            url: '/productsAdmin',
            type: 'POST',
            dataType: 'HTML',
            success: function (rezult) {
                $('#resultWrapper').html(rezult);
            }
        });
    });
    $('#postsAdminMenu').click(function () {
        $('.active').removeClass('active');
        $(this).addClass('active');
        $.ajax({
            url: '/postsAdmin',
            type: 'POST',
            dataType: 'HTML',
            success: function (rezult) {
                $('#resultWrapper').html(rezult);
            }
        });
    });
});