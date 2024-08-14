
$(document).ready(function () {
    set_datatable();
    set_tinymce();
    set_form_repeater();
    set_calendar();
    current_element = pond['dete'];

});
var datatableColumns = [];
$('.datatable th').each(function () {
    var column = $(this).data('column');
    datatableColumns.push({
        data: column,
        name: column
    });
});
setTimeout(function () {
    $("[rel='tooltip']").tooltip();
}, 1000);

function set_form_repeater() {
    $('#kt_docs_repeater_basic').repeater({
        initEmpty: false,

        defaultValues: {
            'text-input': 'foo'
        },
        show: function () {
            $(this).slideDown();
        },

        hide: function (deleteElement) {
            $(this).slideUp(deleteElement);
        }
    });
}