import { classManipulationInput } from "../element-manipulation/index.input";

$('input[name="cep"]').on("input", function () {
    const regexCep = /^[0-9]{8}$/;
    if (regexCep.test(this.value)) {
        $.ajax({
            type: "GET",
            url: "https://viacep.com.br/ws/" + this.value + "/json/",
            success: function (response) {
                if (response.erro) {
                    classManipulationInput(false, $('input[name="cep"]'));
                }
                // Rua
                $('input[name="address"]').val(response.logradouro);
                // Bairro
                $('input[name="neighborhood"]').val(response.bairro);
                //Cidade
                $('input[name="city"]').val(response.localidade);
                // Estado
                $('input[name="state"]').val(response.uf);
                return;
            },
        });
    }
});
