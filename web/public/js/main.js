 window.getData = function(listNumber){
		$.ajax({
            type: "POST",
            dataType: 'json',
            url: "/",
            data: {
                'listNumber': listNumber,
            },
            async: true
        })
        .done(function (response) {
            alert('+');
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.log('Error : ' + errorThrown);
        });
 }

 window.switchTabs = function (flag) {



     if(flag == 'left'){
         $('#rightTab').addClass('hidden');
         $('#leftTab').removeClass('hidden');

         $('#rightM').removeClass('current');
         $('#leftM').addClass('current');
     }else{
         $('#rightTab').removeClass('hidden');
         $('#leftTab').addClass('hidden');

         $('#leftM').removeClass('current');
         $('#rightM').addClass('current')
     }
 }

