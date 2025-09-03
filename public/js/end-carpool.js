function endCarpool(idEndCarpool) {
    fetch('/carpools/future', {
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
        .then(() => {
            const buttons = document.querySelectorAll(`#btn-end-carpool-${idEndCarpool}`);
            buttons.forEach(btn => {
                btn.textContent = "Terminé";
                btn.disabled = true;
            });

            const tagStatus = document.getElementById(`${idEndCarpool}`);
            if (tagStatus) {
                tagStatus.dataset.status = "Terminé";
                const p = tagStatus.querySelector("p");
                if (p) p.textContent = "Terminé";
            }
        })
        .catch(error => {
            alert('Erreur : ' + error.message);
        });
}