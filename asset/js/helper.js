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
                    $('#modalBody').html(helpers.alertTemplate(data.message, 'success'));
                    
                } else {
                    form.find('.message-report').html(helpers.alertTemplate(data.message, 'danger'));
                }
            },
            error: function (error) {
                console.log(error);
            }
        });

        return false;
    },

    alertTemplate(message, alertStatus = 'primary') {
        let template = `<div class="alert alert-${alertStatus}">${message}</div>`;
        return template;
    }

}