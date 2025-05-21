function validationContact() {
    const title = document.getElementById("inputTitle");
    const email = document.getElementById("inputEmailContact");
    const message = document.getElementById("inputMsgContact");
    const btnContact = document.getElementById("btn-valid-contact");

    function validateFormContact() {
        const titleOk = validateTitleContact(title);
        const emailOk = validateEmailContact(email);
        const messageOk = validateMessageContact(message);
        btnContact.disabled = !(titleOk && emailOk && messageOk);
    }

    title.addEventListener("keyup", validateFormContact);
    email.addEventListener("keyup", validateFormContact);
    message.addEventListener("keyup", validateFormContact);

    function validateTitleContact(input) {
        const titleRegex = /^.{5,}$/;
        const titleUser = input.value.trim();
        const invalidFeedback = input.parentElement.querySelector(".invalid-feedback");
        if (titleRegex.test(titleUser)) {
            invalidFeedback.style.display = "none";
            return true;
        } else {
            invalidFeedback.style.display = "block";
            return false;
        }
    }

    function validateEmailContact(input) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const emailUser = input.value.trim();
        const invalidFeedback = input.parentElement.querySelector(".invalid-feedback");
        if (emailRegex.test(emailUser)) {
            invalidFeedback.style.display = "none";
            return true;
        } else {
            invalidFeedback.style.display = "block";
            return false;
        }
    }

    function validateMessageContact(input) {
        const messageRegex = /^.{20,}$/;
        const messageUser = input.value.trim();
        const invalidFeedback = input.parentElement.querySelector(".invalid-feedback");
        if (messageRegex.test(messageUser)) {
            invalidFeedback.style.display = "none";
            return true;
        } else {
            invalidFeedback.style.display = "block";
            return false;
        }
    }
}
