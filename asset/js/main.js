$(document).ready(function() {

    helpers.agent();
    
    $('#content').on('submit', '.pass_work', helpers.passWork);
    $('#content').on('click', '.modal-loader', loaders.loadToModal);
    $('#headerBtns').on('click', '.modal-loader', loaders.loadToModal);
    $('#headerBtns').on('submit', '#logout', helpers.logoutReq);
    $('#content').on('click', '#scrollToBtns', helpers.scrollToElement);
    $('#content').on('click', '#editProfile', helpers.undisabledForm);
    $('#content').on('click', '#resetProfile', helpers.resetChanges);
    $('#content').on('click', '#saveProfile', saveFormProfile);
    
    loaders.pageLoader();

});

const saveFormProfile = () => {
    let button = $(this);
    let editBlock = button.closest('.profile-editable');
    let form = editBlock.find('form');
    console.log('В разработке...');
}