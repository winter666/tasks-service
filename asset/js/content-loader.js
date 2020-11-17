const loaders = {
    pageLoader() {

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
                    $('#modalBody').html(data.html);
                    
                    let form = $('.form');
                    form.submit(helpers.sendModal);

                    $('.modal-save').on('click', function() {
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
    }
}


$(document).ready(function() {

    loaders.pageLoader();
    
    $('.modal-loader').on('click',loaders.loadToModal);
   

});