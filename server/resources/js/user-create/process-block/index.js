const processBlocks = $(".process-block");
let currentBlockIndex = 0;

$("#continue").on("click", function () {
    // Remova a classe "active-process-block" ou "active-process-block-flex" do bloco atual
    if (currentBlockIndex < 2) {
        processBlocks
            .eq(currentBlockIndex)
            .removeClass(
                currentBlockIndex === 1
                    ? "active-process-block-flex"
                    : "active-process-block"
            );

        // Avance para o próximo bloco
        currentBlockIndex++;

        if (currentBlockIndex === 2) {
            $(this).attr("type", "submit");
            $(this).text("Criar conta");
        }

        // Verifique se atingimos o último bloco
        if (currentBlockIndex !== 3) {
            // Adicione a classe "active-process-block" ou "active-process-block-flex ao próximo bloco
            processBlocks
                .eq(currentBlockIndex)
                .addClass(
                    currentBlockIndex === 1
                        ? "active-process-block-flex"
                        : "active-process-block"
                );
            $(this).prop("disabled", true);
            return true;
        }
    }
});
