document.addEventListener("DOMContentLoaded", function () {
const pseudoRegisterInput = document.getElementById("inputPseudoRegister");
const emailRegisterInput = document.getElementById("inputEmailRegister");
const pwdRegisterInput = document.getElementById("inputPwdRegister");
const validPwdRegisterInput = document.getElementById("inputValidPwdReg");
const btnRegister = document.getElementById("btn-valid-register");

btnRegister.disabled = true;
pseudoRegisterInput.addEventListener("keyup", validateFormRegister);
emailRegisterInput.addEventListener("keyup", validateFormRegister);
pwdRegisterInput.addEventListener("keyup", validateFormRegister);
validPwdRegisterInput.addEventListener("keyup", validateFormRegister);

function validateFormRegister() {
    const pseudoRegOk = validatePseudoReg(pseudoRegisterInput);
    const emailRegOk = validateEmailReg(emailRegisterInput);
    const pwdRegOk = validatePwdReg(pwdRegisterInput);
    const validPwdRegOk = validateConfirmPwdReg(pwdRegisterInput, validPwdRegisterInput);
    
    if (pseudoRegOk && emailRegOk && pwdRegOk && validPwdRegOk) {
        btnRegister.disabled = false;
    }
    else {
        btnRegister.disabled = true;
    }
}

function validatePseudoReg(input) {
    const emailRegRegex = /^[a-zA-Z0-9]{2,}$/;
    const emailRegUser = input.value.trim();
    const validFeedback = input.parentElement.querySelector(".valid-feedback");
    const invalidFeedback = input.parentElement.querySelector(".invalid-feedback");

    if (emailRegRegex.test(emailRegUser)) {
        validFeedback.style.display = "block";
        invalidFeedback.style.display = "none";
        return true;
    } else {
        validFeedback.style.display = "none";
        invalidFeedback.style.display = "block";
        return false;
    }
}

function validateEmailReg(input) {
    const emailRegRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const emailRegUser = input.value.trim();
    const validFeedback = input.parentElement.querySelector(".valid-feedback");
    const invalidFeedback = input.parentElement.querySelector(".invalid-feedback");

    if (emailRegRegex.test(emailRegUser)) {
        validFeedback.style.display = "block";
        invalidFeedback.style.display = "none";
        return true;
    } else {
        validFeedback.style.display = "none";
        invalidFeedback.style.display = "block";
        return false;
    }
}

function validatePwdReg(input) {
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8,}$/;
    const passwordUser = input.value.trim();
    const validFeedback = input.parentElement.querySelector(".valid-feedback");
    const invalidFeedback = input.parentElement.querySelector(".invalid-feedback");

    if (passwordUser.match(passwordRegex)) {
        validFeedback.style.display = "block";
        invalidFeedback.style.display = "none";
        return true;
    } else {
        validFeedback.style.display = "none";
        invalidFeedback.style.display = "block";
        return false;
    }
}

function validateConfirmPwdReg(pwdRegisterInput, validPwdRegisterInput) {
    const validFeedback = validPwdRegisterInput.parentElement.querySelector(".valid-feedback");
    const invalidFeedback = validPwdRegisterInput.parentElement.querySelector(".invalid-feedback");
    if (pwdRegisterInput.value === validPwdRegisterInput.value) {
        validFeedback.style.display = "block";
        invalidFeedback.style.display = "none";
        return true;
    }
    else {
        validFeedback.style.display = "none";
        invalidFeedback.style.display = "block";
        return false;
    }
}

});