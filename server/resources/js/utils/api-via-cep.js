$('input[name="cep"]').on("input", async (event) => {
    if (event.target.value.length === 8) {
        const response = await fetch(
            "https://viacep.com.br/ws/" + event.target.value + "/json/"
        );
        const data = await response.json();
        // Rua
        $('input[name="address"]').val(data.logradouro);
        // Bairro
        $('input[name="neighborhood"]').val(data.bairro);
        //Cidade
        $('input[name="city"]').val(data.localidade);
        // Estado
        $('input[name="state"]').val(data.uf);
        return;
    }
});
