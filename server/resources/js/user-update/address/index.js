$('form[name="user-address"]').on("submit", function (event) {
    event.preventDefault();
    if ($("#invalid-update-address-user").css("display") !== "none") {
        $("#invalid-update-address-user")
            .html("Ocorreu um erro ao atualizar o endereço")
            .css("display", "none");
    }
    const address = {
        cep: event.target.cep_edit.value,
        address: event.target.address.value,
        number: event.target.number_edit.value,
        complement: event.target.complement.value,
        neighborhood: event.target.neighborhood.value,
        city: event.target.city.value,
        state: event.target.state.value,
    };

    $("#user-address-edit").css("display", "none");
    $("#loading-address").css("display", "block");

    $.ajax({
        type: "PATCH",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/users/" + event.target.user_id.value,
        data: JSON.stringify(address),
        dataType: "json",
        contentType: "application/json",
        success: function (response) {
            $("#user-address-edit").css("display", "block");
            $("#loading-address").css("display", "none");

            $(".alert-address").css("display", "block");
            setInterval(function () {
                $(".alert-address").css("display", "none");
            }, 10000);
        },
        error: function (response) {
            $("#user-address-edit").css("display", "block");
            $("#loading-address").css("display", "none");
            $("#invalid-update-address-user")
                .html("Ocorreu um erro ao atualizar o endereço")
                .css("display", "block");
        },
    });
});
