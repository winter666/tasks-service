$(document).ready(function() {

    helpers.setBgOfDayTime();
    
    $('#content').on('submit', '.pass_work', helpers.passWork);
    $('#content').on('click', '.modal-loader', loaders.loadToModal);
    $('#headerBtns').on('click', '.modal-loader', loaders.loadToModal);
    $('#headerBtns').on('submit', '#logout', helpers.logoutReq);
    $('#content').on('click', '#scrollToBtns', helpers.scrollToElement);
    
    loaders.pageLoader();

});