document.getElementById("contactForm").addEventListener("submit", async function (e) {
    e.preventDefault();

    const titre = document.getElementById("inputTitle").value;
    const email = document.getElementById("inputEmailContact").value;
    const message = document.getElementById("inputMsgContact").value;

    const res = await fetch("submit_contact.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ titre, email, message })
    });

    const result = await res.json();
    if (result.status === "success") {
        alert("Message envoyé avec succès !");
    } else {
        alert("Erreur : " + result.message);
    }
});