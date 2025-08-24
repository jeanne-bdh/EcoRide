function participateCarpool(idCarpool) {
    const btnParticipate = document.getElementById('btn-participate');

    btnParticipate.onclick = () => {
        modal.classList.add('hidden');

        fetch('/processes/participate_process.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'id_carpool=' + encodeURIComponent(idCarpool)
        })
            .then(response => {
                if (!response.ok) throw new Error('Erreur lors de la participation');
                return response.text();
            })
            .then(() => {
                location.reload();
            })
            .catch(error => {
                alert('Erreur : ' + error.message);
            });
    };
}