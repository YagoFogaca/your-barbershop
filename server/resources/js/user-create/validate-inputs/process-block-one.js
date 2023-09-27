import { validateInput } from "../../utils/validate-input";

// Validar Nome do Proprietário
validateInput('input[name="owner_name"]', 3, null, 1);

// Validar Nome da Barbearia/Salão
validateInput('input[name="company_name"]', 2, null, 1);

// Validar Email
validateInput('input[name="email"]', 1, /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/, 1);
