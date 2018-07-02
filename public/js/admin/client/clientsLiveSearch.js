$('#clientsSearch').bind("change keyup", function () {
    if(this.value.length >= 2){
        $.ajax({
            url: '/clientsDataLiveSearch',
            type: 'POST',
            data: {'referal':this.value},
            dataType: 'HTML',
            success: function(data){
                $(".liveSearchResult").empty();
                $(".liveSearchResult").html(data);
            }
        });
    } else if (this.value.length == 0) {
        $.ajax({
            url: '/clientsDataLiveSearchReset',
            type: 'POST',
            data: {'referal':this.value},
            dataType: 'HTML',
            success: function(data){
                $(".liveSearchResult").empty();
                $(".liveSearchResult").html(data);
            }
        });
    }
});