function statusSession(idUser) {
    fetch('/processes/status_session_process.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'id_users=' + encodeURIComponent(idUser)
    })
        .then(response => {
            if (!response.ok) throw new Error('Erreur lors de la modification du statut');
            return response.text();
        })
        .then(result => {
            const btnStatus = document.getElementById('btn-status-' + idUser);
            const labelStatus = document.getElementById('label-status-' + idUser);

            if (result === "Suspendu") {
                btnStatus.textContent = "Réactiver";
                btnStatus.classList.remove("btn-red");
                btnStatus.classList.add("btn-blue");
                labelStatus.textContent = "Suspendu";
            } else if (result === "Actif") {
                btnStatus.textContent = "Bloquer";
                btnStatus.classList.remove("btn-blue");
                btnStatus.classList.add("btn-red");
                labelStatus.textContent = "Actif";
            }
        })
        .catch(error => {
            alert('Erreur : ' + error.message);
        });
}