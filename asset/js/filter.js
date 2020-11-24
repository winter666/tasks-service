const filterByStatus = (event) => {
    let button = $(event.currentTarget);
    let filterType = button.attr('data-filter');
    let filterBy = button.closest('.input-group').children('.form-control').val();
    let action = button.attr('data-action');

    let filterArea = $('.filter-area');
    let lastIndex = 0;
    filterArea.each((index, item) => {
        if ($(item).attr('data-filter') === filterType) {
            lastIndex = index;
        }
    });
    let area = $(filterArea[lastIndex]);
    let format = area.attr('data-element-format');
    
    if (format === 'table') {
        area.children('tr').each((index, item) => {
            if (action === 'filter') {
                if ($(item).attr('data-status') !== filterBy) {
                    $(item).hide();
                } else {
                    $(item).show();
                }
            }
            if (action === 'clear') {
                $(item).show();
            }
        });
    }
}

$(document).ready(function() {

    $('#content').on('click', '.filter', filterByStatus);

});