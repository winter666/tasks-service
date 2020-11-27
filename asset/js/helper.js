const helpers = {

    sendModal (evt) {
        let form = $(evt.currentTarget);

        function successCallBack(data) {
            if (data.result) {
                $('#modalBody').html(helpers.alertTemplate(data.message, 'success'));
                $('#modalAction').hide();
                if (data.html) {
                    $('#headerBtns').html(data.html);
                }
                loaders.pageLoader();
                
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
                    loaders.pageLoader();
                    if (data.html) {
                        $('#headerBtns').html(data.html);
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
        $('html, body').animate({
            scrollTop: $(btn.attr('data-for')).offset().top  // класс объекта к которому приезжаем
        }, 1000); // Скорость прокрутки
    },

    sendPOSTApiClickBtn (event) {
        let button = $(event.currentTarget);
        $.ajax({
            url: button.attr('data-api-url'),
            method: 'POST',
            data: {
                test: true,
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
            },
            error: function(error) {
                console.log(error);
            }
        });
    },

    passWork(event) {
        let form = $(event.currentTarget);
        let conf = true;
        if (form.hasClass('need_prove')) {
            conf = confirm('Are you sure?');
        }
        if (conf) {
            function success(data) {
                if (data.result) {
                    loaders.pageLoader(data.message);

                } else {
                    let messageContainer = form.find('.message-report');
                    console.log(messageContainer);
                    messageContainer.html(helpers.alertTemplate(data.message, 'danger'));
                }
            }
            function error (error) {
                console.log(error);
            }
            helpers.sendPOST(form, success, error);
        }
        return false;
    },

    clearBlock(block) {
        block.html('');
    },

    setBgOfDayTime() {
        let d = new Date();
        let hour = d.getHours();
        let nightTheme = {'background-color': '#3F3F3F', 'color': '#fff'};
        if (hour >= 20 || hour < 6) {
            $('body').css(nightTheme);
            $('header').css(nightTheme);
            $('footer').css(nightTheme);
        } 
    },

    agent() {
        setInterval(() => helpers.setBgOfDayTime(), 1000);
    },

    undisabledForm () {
        let button = $(this);
        
        let editBlock = button.closest('.profile-editable');

        editBlock.find('input').prop('disabled', false);
        editBlock.find('textarea').prop('disabled', false);
        editBlock.find('select').prop('disabled', false);
        editBlock.find('button').prop('disabled', false);

        let resetButton = document.createElement('button');
        $(resetButton).addClass('btn');
        $(resetButton).addClass('btn-danger');
        $(resetButton).attr('id', 'resetProfile');
        $(resetButton).text('Reset changes');

        editBlock.append(resetButton);

        let saveButton = document.createElement('button');
        $(saveButton).addClass('btn');
        $(saveButton).addClass('btn-success');
        $(saveButton).attr('id', 'saveProfile');
        $(saveButton).text('Save');

        editBlock.append(saveButton);
        button.prop('disabled', true);
    },

    resetChanges() {
        let button = $(this);

        console.log('В разработке...');

    }

}