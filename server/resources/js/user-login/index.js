$('form[name="login-user"]').on("submit", function (event) {
    event.preventDefault();
    const user = {
        email: event.target.email_login.value,
        password: event.target.password_login.value,
    };
    $("#loading").css("display", "block");
    $("#login").css("display", "none");

    $.ajax({
        type: "POST",
        url: "/users/authenticate",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: JSON.stringify(user),
        dataType: "json",
        contentType: "application/json",
        success: function (response) {
            $("#login").css("display", "block");
            $("#loading").css("display", "none");
            window.location.assign("/platform");
        },
        error: function (response) {
            $("#login").css("display", "block");
            $("#loading").css("display", "none");
            $("#invalid-create-user")
                .html(response.responseJSON.message)
                .css("display", "block");
        },
    });
});
