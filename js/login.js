let form = document.querySelector("form");
form.addEventListener("submit", (event) => {
    event.preventDefault()


    const inputPseudoEmailLog = document.getElementById("inputPseudoEmailLogin");
    const inputPwdLog = document.getElementById("inputPwdLogin");
    const btnValidLog = document.getElementById("btn-valid-login");
    
    inputPseudoEmailLog.addEventListener("keyup", validateFormLog);
    inputPwdLog.addEventListener("keyup", validateFormLog);
    
    // Fonction valide le formulaire
    function validateFormLog() {
        const idLogOk = validateIdLog(inputIdLog);
        const pwdLogOk = validatePwdLog(inputPwdLog);
    
        // Pour que le bouton soit cliquable
        if (idLogOk && pwdLogOk) {
            btnValidLog.disabled = false;
        }
        else {
            btnValidLog.disabled = true;
        }
    }
    
    // Fonction valide l'identifant
    function validateIdLog(input) {
        const idCoRegex = /^[a-zA-Z0-9._-]{3,50}$/;
        const idCoUser = input.value;
        if (idCoUser.match(idCoRegex)) {
            input.classList.add("valid-feedback");
            input.classList.remove("invalid-feedback");
            return true;
        }
        else {
            input.classList.remove("is-valid");
            input.classList.add("is-invalid");
            return false;
        }
    }
    
    // Fonction valide le mot de passe
    function validatePwdLog(input) {
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8,}$/;
        const passwordUser = input.value;
        if (passwordUser.match(passwordRegex)) {
            input.classList.add("is-valid");
            input.classList.remove("is-invalid");
            return true;
        }
        else {
            input.classList.remove("is-valid");
            input.classList.add("is-invalid");
            return false;
        }
    }

});