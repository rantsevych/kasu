/**
 * Created by Юрий on 19.09.2018.
 */
window.getContent = function (type) {
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: '/get-content',
        data: {
            'type':type
        },
        async: true
    })
        .done(function (response) {
            $('#content').html(response.content);
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.log('Error : ' + errorThrown);
        });
};

$(document).ready(function () {
    getContent(0);
});