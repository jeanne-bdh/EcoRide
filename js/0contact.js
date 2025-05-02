document.getElementById("contactForm").addEventListener("submit", async function (e) {
    e.preventDefault();

    const title = document.getElementById("inputTitle").value;
    const email = document.getElementById("inputEmailContact").value;
    const message = document.getElementById("inputMsgContact").value;

    const res = await fetch("/pages/contact/contact_process.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ title, email, message })
    });

    const result = await res.json();
    if (result.status === "success") {
        alert("Message envoyé avec succès !");
    } else {
        alert("Erreur : " + result.message);
    }
});