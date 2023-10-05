import "./bootstrap";
// Validação de todos os inputs para criar usuário
import "./user-create/validate-inputs/index";
// Troca de bloco de inputs do formulário para criar usuário
import "./user-create/process-block/index";
// Envio do formulário para criar usuário
import "./user-create/user-create";
// Validação dos inputs para login do usuário
import "./user-login/validate-inputs/index";
// Login usuário
import "./user-login/index";
// Api para busca do cep
import "./utils/apis/api-via-cep";

import "./create-service/validate-inputs/index";
import "./create-service/index";
import "./delete-service/index";

import "./edit-service/modal-id/index";
import "./edit-service/validate-inputs/index";
import "./edit-service/reset-modal/index";
import "./edit-service/index";

import.meta.glob(["../images/**"]);
