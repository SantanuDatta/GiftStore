// For adding
function ajaxSubmit(formId, url, redirectUrl) {
    $("#" + formId).submit(function (event) {
        event.preventDefault();
        const formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false,
            processData: false,
            success: function () {
                // Redirect to another page without reloading
                window.location.href = redirectUrl;
            },
        });
    });
}

// for updating
function ajaxUpdate(formId, redirectUrl) {
    $("." + formId).submit(function (event) {
        event.preventDefault();
        const formData = new FormData(this);
        formData.append("_method", "PUT"); // Add this line
        const actionUrl = $(this).attr("action");
        $.ajax({
            type: "POST",
            url: actionUrl, // Append the ID to the URL
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data.status == 200) {
                    window.location.replace = redirectUrl;
                }
            },
        });
    });
}

// for deleting
function ajaxDelete(formId, url, redirectUrl) {
    $("#" + formId).submit(function (event) {
        event.preventDefault();
        const formData = new FormData(this);
        const id = formData.get("id");
        $.ajax({
            type: "DELETE",
            url: `${url}/${id}`,
            data: { _method: "DELETE" },
            success: function (response) {
                // Redirect to another page without reloading
                window.location.href = redirectUrl;
            },
        });
    });
}

// $(document).ready(function() {
//     $('#add-main-cat').submit(function(event) {
//         event.preventDefault();
//         $.ajax({
//             type: "POST",
//             url: $(this).attr('action'),
//             data: new FormData(this),
//             contentType: false,
//             processData: false,
//             success: function(response) {
//                 // Redirect to another page without reloading
//                 window.location.href = `{{ route('main.category') }}`;
//             }
//         });
//     });
// });
