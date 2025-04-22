const localDepartInput = document.getElementById("localDepart");
const localArrivalInput = document.getElementById("localArrival");
const dateInput = document.getElementById("date");
const priceInput = document.getElementById("price");
const timeDepartInput = document.getElementById("timeDepart");
const timeArrivalInput = document.getElementById("timeArrival");
const btnNewCarpool = document.getElementById("btn-valid-new-carpool");

btnNewCarpool.disabled = true;
localDepartInput.addEventListener("keyup", validateFormNewCarpool);
localArrivalInput.addEventListener("keyup", validateFormNewCarpool);
dateInput.addEventListener("keyup", validateFormNewCarpool);
priceInput.addEventListener("keyup", validateFormNewCarpool);
timeDepartInput.addEventListener("keyup", validateFormNewCarpool);
timeArrivalInput.addEventListener("keyup", validateFormNewCarpool);

function validateFormNewCarpool() {
    const pseudoRegOk = validatePseudoReg(localDepartInput);
    const emailRegOk = validateEmailReg(localArrivalInput);
    const pwdRegOk = validatePwdReg(pwdRegisterInput);
    const validPwdRegOk = validateConfirmPwdReg(pwdRegisterInput, validPwdRegisterInput);
    
    if (pseudoRegOk && emailRegOk && pwdRegOk && validPwdRegOk) {
        btnRegister.disabled = false;
    }
    else {
        btnRegister.disabled = true;
    }
}

function validateCities(input) {
    const citiesRegex = /^[^\d]$/;
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