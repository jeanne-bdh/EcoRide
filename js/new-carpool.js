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
    const citiesNewCarpoolOk = validateCities(localDepartInput, localArrivalInput);
    const dateNewCarpoolOk = validateDate(dateInput);
    const priceNewCarpoolOk = validatePrice(priceInput);
    const timeNewCarpoolOk = validateTime(timeDepartInput, timeArrivalInput);
    
    if (citiesNewCarpoolOk && dateNewCarpoolOk && priceNewCarpoolOk && timeNewCarpoolOk) {
        btnNewCarpool.disabled = false;
    }
    else {
        btnNewCarpool.disabled = true;
    }
}

function validateCities(input) {
    const citiesRegex = /^[^\d]$/;
    const citiesValid = input.value.trim();
    const invalidFeedback = input.parentElement.querySelector(".invalid-feedback");

    if (citiesRegex.test(citiesValid)) {
        invalidFeedback.style.display = "none";
        return true;
    } else {
        invalidFeedback.style.display = "block";
        return false;
    }
}

function validateDate(input) {
    const dateRegex = /[1-9]\d*$/;
    const dateValid = input.value.trim();
    const invalidFeedback = input.parentElement.querySelector(".invalid-feedback");

    if (dateRegex.test(dateValid)) {
        invalidFeedback.style.display = "none";
        return true;
    } else {
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