const loaders = {

    pageLoader() {
        console.log(1234);
        let urlSearch = new URLSearchParams(window.location);
        let page = urlSearch.get('page');
    
        let url = new URL(window.location);
    
        switch (page) {
            case null: 
                page = url.pathname;
                break;
        }
    
        $.ajax({
            url: '/app/handlers/pageHandler.php',
            method: 'GET',
            data: {page: page},
            dataType: 'json',
            success: function(data) {
                let content = $('#content');
                if (data.status === 200 && data.result === true) {
                    content.html(data.html);
                    $('#scrollToBtns').click(helpers.scrollToElement);
                    loaders.initBtnsHeader();
                }
            },
            error: function (error) {
    
            }
        });
    },

    loadToModal(evt) {
        let btn = $(this);
        let formType = btn.attr('data-form');
    
        $.ajax({
            method: "GET",
            url: '/app/handlers/modalHandler.php',
            data: {type: formType},
            dataType: 'json',
            success: function(data) {
                if (data.result) {
                    $('#exampleModalLabel').html(data.title);
                    $('#modalBody').html(data.html);
                    $('#modalAction').html(data.button_text);
                    $('#modalAction').show();

                    let form = $('#modalBody').find('.form');
                    form.submit(helpers.sendModal);

                    $('#modalAction').on('click', function() {
                        form.submit();
                    });

                } else {
                    $('#modalBody').html('<div class="alert alert-danger">Not found </div>');
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    },
    
    initBtnsHeader () {
        $('.modal-loader').on('click',loaders.loadToModal);
        $('#logout').on('submit', helpers.logoutReq);
    }
}
