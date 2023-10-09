const editModal = document.getElementById("edit-service-modal");
if (editModal) {
    editModal.addEventListener("show.bs.modal", (event) => {
        const id = event.relatedTarget.id.replace("edit-", "");

        $.ajax({
            type: "GET",
            url: "/services/" + id,
            dataType: "json",
            contentType: "application/json",
            success: function (response) {
                $('input[name="service_id"]').val(response.data.id);
                $('input[name="status"]').attr(
                    "checked",
                    response.data.status === "active" ? true : false
                );
                $('input[name="status"]').val(response.data.status);
                $('input[name="service_id"]').val(response.data.id);
                $(".spinner-container").css("display", "none");
                $('form[name="edit-service"]').css("display", "block");
            },
        });
    });
}
