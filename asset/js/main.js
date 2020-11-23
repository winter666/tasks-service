$(document).ready(function() {
    $('#content').on('submit', '.pass_work', helpers.passWork);
    $('#headerBtns').on('click', '.modal-loader', loaders.loadToModal);
    $('#headerBtns').on('submit', '#logout', helpers.logoutReq);
    $('#content').on('click', '#scrollToBtns', helpers.scrollToElement);
    
    loaders.pageLoader();

});