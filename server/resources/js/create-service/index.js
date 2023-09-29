$('form[name="create-service"]').on("submit", function (event) {
    event.preventDefault();

    const service = {
        name: event.target.name_service.value,
        price: event.target.price_service.value,
    };

    $("#loading").css("display", "block");
    $("#btn-create-service").css("display", "none");

    $.ajax({
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/services",
        data: JSON.stringify(service),
        dataType: "json",
        contentType: "application/json",
        success: function (response) {
            $("#loading").css("display", "none");
            $("#btn-create-service").css("display", "block");
            console.log(response);
            const dataService = response.data;
            const lineTable = `
            <tr>
                <td class="width">${dataService.name}</td>
                <td class="width">R$ ${dataService.price}</td>
                <td class="active">${
                    dataService.status ? "Ativo" : "Desativado"
                }</td>
                <td class="config">
                    <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Editar</a></li>
                        <li><a class="dropdown-item" href="#">Apagar</a></li>
                    </ul>
                </td>
            </tr>`;
            $("#display-services").append(lineTable);
            $(".alert-display").css("display", "block");
            $('input[name="name_service"]').val("");
            $('input[name="price_service"]').val("");
        },
        error: function (response) {
            $("#loading").css("display", "none");
            $("#btn-create-service").css("display", "block");
            $("#invalid-create-service")
                .html(response.responseJSON.message)
                .css("display", "block");
        },
    });
});
