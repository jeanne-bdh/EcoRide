function loginUser() {
    const inputEmailLog = document.getElementById("inputEmailLogin");
    const inputPwdLog = document.getElementById("inputPwdLogin");
    const btnValidLog = document.getElementById("btn-valid-login");

    if (!inputEmailLog || !inputPwdLog || !btnValidLog) return;
    
    btnValidLog.disabled = true;
    inputEmailLog.addEventListener("change", validateFormLog);
    inputPwdLog.addEventListener("keyup", validateFormLog);

    function validateFormLog() {
        const emailLogOk = validateEmailLog(inputEmailLog);
        const pwdLogOk = validatePwdLog(inputPwdLog);

        if (emailLogOk && pwdLogOk) {
            btnValidLog.disabled = false;
        }
        else {
            btnValidLog.disabled = true;
        }
    }

    function validateEmailLog(input) {
        const emailLogRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const emailLogUser = input.value.trim();
        const validFeedback = input.parentElement.querySelector(".valid-feedback");
        const invalidFeedback = input.parentElement.querySelector(".invalid-feedback");

        if (emailLogRegex.test(emailLogUser)) {
            validFeedback.style.display = "block";
            invalidFeedback.style.display = "none";
            return true;
        } else {
            validFeedback.style.display = "none";
            invalidFeedback.style.display = "block";
            return false;
        }
    }

    function validatePwdLog(input) {
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

}

document.addEventListener("DOMContentLoaded", () => {
    loginUser();
});