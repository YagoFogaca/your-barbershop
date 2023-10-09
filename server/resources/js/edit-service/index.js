$('form[name="edit-service"]').on("submit", function (event) {
    event.preventDefault();

    if ($("#invalid-edit-service").css("display") !== "none") {
        $("#invalid-edit-service").html("").css("display", "none");
    }

    const serviceUpdate = {
        id: event.target.service_id.value,
        name: event.target.name_service_edit.value,
        price: event.target.price_service_edit.value,
        status: event.target.status.checked,
    };
    const validatedStatus =
        event.target.status.value === "active" ? true : false;
    if (
        serviceUpdate.name === "" &&
        serviceUpdate.price === "" &&
        validatedStatus === serviceUpdate.status
    ) {
        $("#invalid-edit-service")
            .html("Pelo menos um dos campos devem ser preenchidos")
            .css("display", "block");
        return false;
    }

    $("#loading-edit-service").css("display", "block");
    $("#btn-edit-service").css("display", "none");
    $.ajax({
        type: "PATCH",
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/services/" + serviceUpdate.id,
        data: JSON.stringify(serviceUpdate),
        dataType: "json",
        contentType: "application/json",
        success: function (response) {
            $("#loading-edit-service").css("display", "none");
            $("#btn-edit-service").css("display", "block");
            $(".alert-service-edit").css("display", "block");
            $(`#line-service-${serviceUpdate.id} > #line-service-name`).html(
                response.data.name
            );
            $(`#line-service-${serviceUpdate.id} > #line-service-price`).html(
                "R$ " + response.data.price
            );
            $(`#line-service-${serviceUpdate.id} > #line-service-status`).html(
                response.data.status === "active" ? "Ativo" : "Desativado"
            );
            setInterval(function () {
                $(".alert-service-edit").css("display", "none");
            }, 10000);
        },
        error: function (response) {
            $("#loading-edit-service").css("display", "none");
            $("#btn-edit-service").css("display", "block");
            if (response.status === 419) {
                return window.location.reload(true);
            }
            $("#invalid-edit-service")
                .html(response.responseJSON.message)
                .css("display", "block");
        },
    });
});
