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
            const dataService = response.data;
            const lineTable = `
            <tr id="line-service-${dataService.id}">
                <td class="width" id="line-service-name">${
                    dataService.name
                }</td>
                <td class="width" id="line-service-price">R$ ${
                    dataService.price
                }</td>
                <td class="active">${
                    dataService.status ? "Ativo" : "Desativado"
                }</td>
                <td class="config">
                    <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><button class="dropdown-item" data-bs-toggle="modal"
                        data-bs-target="#edit-service-modal" id="edit-${
                            dataService.id
                        }">Editar</button></li>
                        <li><button class="dropdown-item" id="${
                            dataService.id
                        }" name="delete-service">Apagar</button></li>
                    </ul>
                </td>
            </tr>`;
            $("#display-services").append(lineTable);
            $(".alert-service-create").css("display", "block");
            $('input[name="name_service"]').val("");
            $('input[name="price_service"]').val("");
            setInterval(function () {
                $(".alert-service-create").css("display", "none");
            }, 10000);
        },
        error: function (response) {
            $("#loading").css("display", "none");
            $("#btn-create-service").css("display", "block");
            if (response.status === 419) {
                return window.location.reload(true);
            }
            $("#invalid-create-service")
                .html(response.responseJSON.message)
                .css("display", "block");
        },
    });
});
