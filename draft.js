document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("contactForm");
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

    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        const res = await fetch("/processes/contact_process.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                title: title.value,
                email: email.value,
                message: message.value
            })
        });

        const data = await res.json();
        const messageContainer = document.createElement("div");
        messageContainer.className = "success";
        messageContainer.innerText = data[0] || "Message envoyé";
        form.prepend(messageContainer);
    });

    function validateTitleContact(input) {
        const titleRegex = /^[a-zA-Z0-9]{5,}$/;
        const titleUser = input.value.trim();
        const validFeedback = input.parentElement.querySelector(".valid-feedback");
        const invalidFeedback = input.parentElement.querySelector(".invalid-feedback");
        if (titleRegex.test(titleUser)) {
            validFeedback.style.display = "block";
            invalidFeedback.style.display = "none";
            return true;
        } else {
            validFeedback.style.display = "none";
            invalidFeedback.style.display = "block";
            return false;
        }
    }

    function validateEmailContact(input) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const emailUser = input.value.trim();
        const validFeedback = input.parentElement.querySelector(".valid-feedback");
        const invalidFeedback = input.parentElement.querySelector(".invalid-feedback");
        if (emailRegex.test(emailUser)) {
            validFeedback.style.display = "block";
            invalidFeedback.style.display = "none";
            return true;
        } else {
            validFeedback.style.display = "none";
            invalidFeedback.style.display = "block";
            return false;
        }
    }

    function validateMessageContact(input) {
        const messageRegex = /^[a-zA-Z0-9\s]{20,}$/;
        const messageUser = input.value.trim();
        const validFeedback = input.parentElement.querySelector(".valid-feedback");
        const invalidFeedback = input.parentElement.querySelector(".invalid-feedback");
        if (messageRegex.test(messageUser)) {
            validFeedback.style.display = "block";
            invalidFeedback.style.display = "none";
            return true;
        } else {
            validFeedback.style.display = "none";
            invalidFeedback.style.display = "block";
            return false;
        }
    }
});
