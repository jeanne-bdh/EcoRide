function endCarpool(idEndCarpool) {
    fetch('/processes/end_carpool_process.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'id_carpool=' + encodeURIComponent(idEndCarpool)
    })
        .then(response => {
            if (!response.ok) throw new Error('Erreur lors de la clôture du covoiturage');
            return response.text();
        })
        .then(result => {
            const btnEnd = document.getElementById('btn-end-carpool-' + idEndCarpool);
            const tagStatus = document.getElementById(`${idEndCarpool}`);

            if (result === "Arrivés à destination") {
                btnEnd.textContent = "Terminé";
                btnEnd.disabled = true;

                if (tagStatus) {
                    tagStatus.dataset.status = "Terminé";
                    tagStatus.querySelector("p").textContent = "Terminé";
                }
            }
        })
        .catch(error => {
            alert('Erreur : ' + error.message);
        });
}