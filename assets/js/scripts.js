jQuery(document).ready(function($) {
    $('#add-row').on('click', function() {
        var row = $('.empty-row').clone(true);
        row.removeClass('empty-row');
        row.insertBefore('.repeatable-row:last');
        return false;
    });

    $('.remove-row').on('click', function() {
        $(this).closest('.repeatable-row').remove();
        return false;
    });
});