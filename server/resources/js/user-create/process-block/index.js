import { checkBlockValidity } from "./validate";

const processBlocks = $(".process-block");
let currentBlockIndex = 0;

// Troca de bloco de inputs do formulário
$("#continue-user-create").on("click", function () {
    // Verificação se os inputs do bloco estão preenchidos
    if (!checkBlockValidity(currentBlockIndex)) {
        $("#invalid-create-user")
            .html("Preencha todos os campos obrigatórios")
            .css("display", "block");
        return false;
    }

    //  Verifique se já atingimos o último bloco
    if (currentBlockIndex < 2) {
        // Remove a classe "active-process-block" ou "active-process-block-flex" do bloco atual
        processBlocks
            .eq(currentBlockIndex)
            .removeClass(
                currentBlockIndex === 1
                    ? "active-process-block-flex"
                    : "active-process-block"
            );

        // Incremento para o avance para o próximo bloco
        currentBlockIndex++;

        // Verifique se o proximo bloco é o último, com troca de btn par envio do formulário
        if (currentBlockIndex === 2) {
            $(this).remove();
            $("#user-create").css("display", "block");
        }

        // Adicione a classe "active-process-block" ou "active-process-block-flex ao próximo bloco
        processBlocks
            .eq(currentBlockIndex)
            .addClass(
                currentBlockIndex === 1
                    ? "active-process-block-flex"
                    : "active-process-block"
            );

        //Remove mensagem de erro caso os inputs estejam validados
        $("#invalid-create-user").html("").css("display", "none");
        return true;
    }
});
