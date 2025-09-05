function startCarpool(idStartCarpool) {
    fetch('/carpools/start', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'id_carpool=' + encodeURIComponent(idStartCarpool)
    })
        .then(response => {
            if (!response.ok) throw new Error('Erreur lors du démarrage du covoiturage');
            return response.text();
        })
        .then(result => {
            const btnStart = document.getElementById('btn-start-carpool-' + idStartCarpool);
            const tagStatus = document.getElementById(`${idStartCarpool}`);

            if (result === "Démarré") {
                btnStart.textContent = "Arrivés à destination";

                if (tagStatus) {
                    tagStatus.dataset.status = "Démarré";
                    tagStatus.querySelector("p").textContent = "Démarré";
                }
            }
        })
        .catch(error => {
            alert('Erreur : ' + error.message);
        });
}