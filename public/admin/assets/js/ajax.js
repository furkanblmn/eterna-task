$(document).ready(function () {
    // Delegate click event for delete_item
    $(document).delegate(".delete_item, .dbl_click_delete_item", "click dblclick", function () {
        let url = $(this).data('url');
        confirmDelete(url);
    });

    // Delegate click event for change_status
    $(document).delegate(".change_status", "click", function () {
        let id = $(this).data('id');
        let column = $(this).data('column');
        changeStatus(id, column);
    });
});

// Function to confirm and perform deletion
function confirmDelete(url) {
    Swal.fire({
        title: "Are you sure?",
        text: "This action cannot be undone!",
        icon: "question",
        dangerMode: true,
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.isConfirmed) {
            performDelete(url);
        }
    });
}

// Function to perform the AJAX deletion
function performDelete(url) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        method: 'DELETE',
        success: function (data) {
            if (data == "1") {
                Swal.fire({
                    title: "Success!",
                    text: "The deletion was successfully completed.",
                    icon: "success",
                    confirmButtonText: 'Close',
                }).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire({
                    title: "Failed!",
                    text: data,
                    icon: "error",
                    confirmButtonText: 'Close',
                });
            }
        },
        error: function () {
            Swal.fire({
                title: "Failed!",
                text: "An error occurred during the deletion process.",
                icon: "error",
                confirmButtonText: 'Close',
            });
        }
    });
}

// Function to change status via AJAX
function changeStatus(id, column) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: `change-status/${default_page}/${id}/${column}`,
        method: 'GET',
        success: function () {
            datatable.draw();
        },
        error: function () {
            Swal.fire({
                title: "Failed!",
                text: "An error occurred while changing the status.",
                icon: "error",
                confirmButtonText: 'Close',
            });
        }
    });
}
