document.getElementById("contactForm").addEventListener("submit", async function (e) {
    e.preventDefault();

    const title = document.getElementById("inputTitle").value;
    const email = document.getElementById("inputEmailContact").value;
    const message = document.getElementById("inputMsgContact").value;

    const res = await fetch("/processes/contact_process.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ title, email, message })
    });

    const data = await res.json();
    const form = document.getElementById("contactForm");
    const messageContainer = document.createElement("div");
    messageContainer.className = "success";
    messageContainer.innerText = data[0] || "Message envoyé";

    form.prepend(messageContainer);
});