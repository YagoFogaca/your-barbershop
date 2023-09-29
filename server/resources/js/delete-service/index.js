$(document).on("click", 'button[name="delete-service"]', function (event) {
    const id = $(this).attr("id");

    $.ajax({
        type: "DELETE",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/services/" + id,
        success: function (response) {
            const idElement = "#line-service-" + id;
            $(idElement).remove();
            $("#toast-service").addClass("show");
        },
        error: function (response) {
            console.log("error", response);
        },
    });
});
