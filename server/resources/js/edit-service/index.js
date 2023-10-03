$('form[name="edit-service"]').on("submit", function (event) {
    event.preventDefault();

    const serviceUpdate = {
        id: event.target.service_id.value,
        name: event.target.name_service_edit.value,
        price: event.target.price_service_edit.value,
    };

    if (serviceUpdate.name === "" && serviceUpdate.price === "") {
        $("#invalid-edit-service")
            .html("Pelo menos um dos campos devem ser preenchidos")
            .css("display", "block");
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
            $(".alert-display").css("display", "block");
            $(`#line-service-${serviceUpdate.id} > #line-service-name`).html(
                response.data.name
            );
            $(`#line-service-${serviceUpdate.id} > #line-service-price`).html(
                "R$ " + response.data.price
            );
            setInterval(function () {
                $(".alert-display").css("display", "none");
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
