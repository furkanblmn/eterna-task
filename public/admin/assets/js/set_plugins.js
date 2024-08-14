
function set_datatable() {
    datatable = $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            "url": $('.datatable').data('url'),
            "type": "GET",
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: function (d) {
                $(".loading").LoadingOverlay("show");
                $(".loading").LoadingOverlay("hide", true);

                var datatableFilters = [];

                $.each($(".datatable").data("filters"), function (index, val) {
                    datatableFilters[val] = $('#' + val).val()
                })

                return $.extend({}, d, datatableFilters);
            }
        },
        language: {
            url: '/admin/assets/plugins/custom/datatables/tr.json'
        },
        columns: datatableColumns,
        order: [[0, "desc"]],
        searching: true
    });
}
function set_tinymce() {
    tinymce.init({
        selector: '.tinymce',
        plugins: 'print preview searchreplace autolink autosave save directionality visualblocks visualchars fullscreen image link media table hr anchor toc insertdatetime advlist lists imagetools textpattern noneditable quickbars',
        toolbar: 'undo redo | bold underline | fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange  removeformat | fullscreen | insertfile image media link | ltr rtl | showcomments addcomment',
        language: 'tr',
        height: "380",
        toolbar_mode: 'sliding',
        menubar: 'file edit view insert format table',
        language: 'tr_TR',
        language_url: `/admin/assets/plugins/custom/tinymce/tr_TR.js`,
    });
}

function set_calendar() {
    $(".date_picker").flatpickr({
        minDate: "today",
        locale: "tr",
        enableTime: true,
        dateFormat: "Y-m-d H:i"
    })
}