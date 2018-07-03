$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".couponValBtn").click(function () {
        $(".couponValBtn").removeClass('btnActive');
        $(this).addClass('btnActive');
    });

    $('#adminPanelCouponUpdate').click(function () {
        var checked = '{';
        $('.adminPanelTableRow input:checkbox:checked').each(function () {
            checked += '"id'+$(this).attr('userId') + '":' + $(this).attr('userId')+',';
        });
        checked = checked.substring(0, checked.length - 1);
        checked += '}';
        if (checked !== '}') {
            $.ajax({
                url: '/updateCouponRow',
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

    $(".couponValBtn").click(function () {
        var parentId = $(this).closest(".updateRow").attr("id");
        var id = "#"+parentId+" .couponValBtn";
        $(id).removeClass("btnActive");
        $(this).addClass("btnActive");
    });
    
    $('#updateRow').ready(function () {
        $('.adminPanelSaveBtn').click(function () {
            var couponUpd = '{';
            $('.updateRow').each(function () {
                var UserId = $(this).attr('id');
                var couponVal = $(this).find('.btnActive').attr('id');
                couponUpd += '"'+UserId+'":"'+couponVal+'",';
            });
            couponUpd = couponUpd.substring(0, couponUpd.length - 1);
            couponUpd += '}';
            $.ajax({
                url: '/updateCoupons',
                type: 'POST',
                dataType: 'HTML',
                data: {'couponUpd': couponUpd},
                success: function (rezult) {
                    $('#resultWrapper').empty();
                    $('#resultWrapper').html(rezult);
                }
            });
        });
    });

    $('#adminPanelCancelBtn').click(function () {
        $.ajax({
            url: '/cancelUpdateCoupons',
            type: 'POST',
            dataType: 'HTML',
            success: function (rezult) {
                $('#resultWrapper').empty();
                $('#resultWrapper').html(rezult);
            }
        });
    });

    $('#adminPanelCouponAdd').click(function () {
        $.ajax({
            url: '/addCouponsRow',
            type: 'POST',
            dataType: 'HTML',
            success: function (rezult) {
                $('.liveSearchResult').append(rezult);
                $('.updateBtns').removeClass('updateBtns');
            }
        });
    });

    $('#clientCouponSearch').bind("change keyup", function () {
        if(this.value.length >= 2){
            $.ajax({
                url: '/couponsDataLiveSearch',
                type: 'POST',
                data: {'referal':this.value},
                dataType: 'HTML',
                success: function(data){
                    // $(".searchResultWrapper").empty();
                    $(".searchResultWrapper").html(data);
                }
            });
        }
    });

    $('.searchResult').click(function () {
        var lastName = $('#searchResultLastName').text();
        var firstName = $('#searchResultFirstName').text();
        var userId = $(this).attr('id');
        $('#newCouponUserLastName').text(lastName);
        $('#newCouponUserFirstName').text(firstName);
        $('.adminPanelTableRowAdd').attr('userId',userId);
        $('.searchResultWrapper').remove();
        $('#clientCouponSearch').val('');
    });
});