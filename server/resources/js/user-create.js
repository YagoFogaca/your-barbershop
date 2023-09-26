$('form[name="create-user"]').on("submit", function (event) {
    event.preventDefault();
    console.log({
        owner_name: event.target.owner_name.value,
        company_name: event.target.company_name.value,
        email: event.target.email.value,
    });
    const user = {
        owner_name: event.target.owner_name.value,
        company_name: event.target.company_name.value,
        email: event.target.email.value,
    };

    $("#loading").css("display", "block");
    $("#continue").css("display", "none");

    $.ajax({
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/users",
        data: JSON.stringify(user),
        dataType: "json",
        contentType: "application/json",
        success: function (response) {
            console.log("OK");
            console.log();
            console.log(response);
            $("#continue").css("display", "block");
            $("#loading").css("display", "none");
            // Redirecionar
        },
        error: function (response) {
            console.log("BAD");
            console.log();
            console.log(response.responseText);
            $("#continue").css("display", "block");
            $("#loading").css("display", "none");
            $("#invalid-create-user")
                .html(response.responseText)
                .css("display", "block");
        },
    });
});
