function resetModal() {
    $('input[name="name_service_edit"').val("");
    $('input[name="price_service_edit"').val("");
}

const myModalEl = document.getElementById("edit-service-modal");
if (myModalEl) {
    myModalEl.addEventListener("hidden.bs.modal", (event) => {
        resetModal();
    });
}
