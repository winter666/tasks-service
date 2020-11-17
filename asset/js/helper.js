const helpers = {

    sendModal (evt) {
        let form = $(evt.currentTarget);
        console.log(form);
        $.ajax({
            method: 'POST',
            url: form.attr('action'),
            data: form.serialize(),
            dataType: 'json',
            success: function(data) {
                if (data.result) {
                    $('#modalBody').html(`<div class="alert alert-success">${data.message}</div>`);
                    // setTimeout(function(){
                    //     $('#modalBody').html('');
                    // }, 1000 * 3);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });

        return false;
    },

}