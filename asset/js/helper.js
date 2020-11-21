const helpers = {

    sendAuth (evt) {
        let form = $(evt.currentTarget);

        function successCallBack(data) {
            if (data.result) {
                $('#modalBody').html(helpers.alertTemplate(data.message, 'success'));
                $('#modalSave').hide();
                if (data.html) {
                    $('#headerBtns').html(data.html);
                    loaders.initBtnsHeader();
                    loaders.pageLoader();
                }
                
            } else {
                form.find('.message-report').html(helpers.alertTemplate(data.message, 'danger'));
            }
        }
        function errorCallBack(error) {
            console.log(error);
        }

        helpers.sendPOST(form, successCallBack, errorCallBack)

        return false;
    },

    sendPOST(form, success, error) {
        $.ajax({
            method: 'POST',
            url: form.attr('action'),
            data: form.serialize(),
            dataType: 'json',
            success: success,
            error: error
        });
    },

    alertTemplate(message, alertStatus = 'primary') {
        let template = `<div class="alert alert-${alertStatus}">${message}</div>`;
        return template;
    },

    logoutReq(evt) { 
        let form = $(evt.currentTarget);
        if (confirm('Are you sure?')) {
            function successCallBack (data) {
                if (data.result) {
                    if (data.html) {
                        $('#headerBtns').html(data.html);
                        loaders.initBtnsHeader();
                        loaders.pageLoader();
                        $('#scrollToBtns').click(helpers.scrollToElement);
                    }
                } else {
                    let button = form.find('button');
                    button.attr('class', 'btn btn-danger');
                    button.text(data.message);
                }
            }
            function errorCallBack (error) {
                console.log(error);
            }

            helpers.sendPOST(form, successCallBack, errorCallBack)
        }
        return false;
    },

    scrollToElement(evt) {
        let btn = $(evt.currentTarget);
        console.log(btn);
        $('html, body').animate({
            scrollTop: $(btn.attr('data-for')).offset().top  // класс объекта к которому приезжаем
        }, 1000); // Скорость прокрутки
    }

}