const editModal = document.getElementById("edit-service-modal");
editModal.addEventListener("show.bs.modal", (event) => {
    const id = event.relatedTarget.id.replace("edit-", "");
    $('input[name="service_id"]').val(id);
});
