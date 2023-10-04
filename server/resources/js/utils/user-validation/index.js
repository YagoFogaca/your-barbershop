import { classManipulationInput } from "../element-manipulation/index.input";
import { propManipulationBtn } from "../element-manipulation/index.btn";

export class UserValidation {
    // Validar Nome do Proprietário
    static ownerName(inputElement, eventElement, btnElement) {
        $(inputElement).on(eventElement, function (event) {
            const value = $(this).val();

            if (value.length <= 3) {
                classManipulationInput(false, $(this));
                propManipulationBtn(false, btnElement);
            } else {
                classManipulationInput(true, $(this));
                propManipulationBtn(true, btnElement);
            }
        });
    }

    // Validar Nome da Barbearia/Salão
    static companyName(inputElement, eventElement, btnElement) {
        $(inputElement).on(eventElement, function (event) {
            const value = $(this).val();
            if (value.length <= 2) {
                classManipulationInput(false, $(this));
                propManipulationBtn(false, btnElement);
            } else {
                classManipulationInput(true, $(this));
                propManipulationBtn(true, btnElement);
            }
        });
    }

    // Validar Email
    static email(inputElement, eventElement, btnElement) {
        const regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        $(inputElement).on(eventElement, function (event) {
            const value = $(this).val();
            if (!regex.test(value)) {
                classManipulationInput(false, $(this));
                propManipulationBtn(false, btnElement);
            } else {
                classManipulationInput(true, $(this));
                propManipulationBtn(true, btnElement);
            }
        });
    }

    // Validar Telefone
    static telephone(inputElement, eventElement, btnElement) {
        const regex = /^\d{11}$/;
        $(inputElement).on(eventElement, function (event) {
            const value = $(this).val();
            if (!regex.test(value)) {
                classManipulationInput(false, $(this));
                propManipulationBtn(false, btnElement);
            } else {
                classManipulationInput(true, $(this));
                propManipulationBtn(true, btnElement);
            }
        });
    }

    // Validar CEP
    static cep(inputElement, eventElement, btnElement) {
        const regex = /^\d{8}$/;
        $(inputElement).on(eventElement, function (event) {
            const value = $(this).val();
            if (!regex.test(value)) {
                classManipulationInput(false, $(this));
                propManipulationBtn(false, btnElement);
            } else {
                classManipulationInput(true, $(this));
                propManipulationBtn(true, btnElement);
            }
        });
    }

    // Validar número do estabelecimento
    static number(inputElement, eventElement, btnElement) {
        const regex = /^(?!0+$)(?!-)(?!0\d*$)\d+$/;
        $(inputElement).on(eventElement, function (event) {
            const value = $(this).val();
            if (!regex.test(value)) {
                classManipulationInput(false, $(this));
                propManipulationBtn(false, btnElement);
            } else {
                classManipulationInput(true, $(this));
                propManipulationBtn(true, btnElement);
            }
        });
    }

    // Validar senha
    static password(inputElement, eventElement, btnElement) {
        $(inputElement).on(eventElement, function (event) {
            const value = $(this).val();

            if (value.length <= 7) {
                classManipulationInput(false, $(this));
                propManipulationBtn(false, btnElement);
            } else {
                classManipulationInput(true, $(this));
                propManipulationBtn(true, btnElement);
            }
        });
    }

    // Confirmar senha
    static confirmPassword(
        inputElement,
        passwordCompare,
        eventElement,
        btnElement
    ) {
        $(inputElement).on(eventElement, function (event) {
            const value = $(this).val();
            const password = $(passwordCompare).val() !== value;

            if (value.length <= 7 || password) {
                classManipulationInput(false, $(this));
                propManipulationBtn(false, btnElement);
            } else {
                classManipulationInput(true, $(this));
                propManipulationBtn(true, btnElement);
            }
        });
    }
}
