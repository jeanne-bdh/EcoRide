document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("contactForm");
    if (!form) return;
    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        const title = document.getElementById("inputTitle").value;
        const email = document.getElementById("inputEmailContact").value;
        const message = document.getElementById("inputMsgContact").value;

        try {
            const res = await fetch("/contact/show/", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ title, email, message })
            });

            const data = await res.json();
            const form = document.getElementById("contactForm");
            const messageContainer = document.createElement("div");
            messageContainer.className = "success";
            messageContainer.innerText = data.success ?? data.error ?? "Erreur inconnue";

            form.prepend(messageContainer);
        } catch (err) {
            console.error("Erreur réseau :", err);
        }
    });
})