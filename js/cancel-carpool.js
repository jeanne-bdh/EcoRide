function cancelCarpool(idCarpool) {
    const modal = document.getElementById('confirmModal');
    const confirmYes = document.getElementById('confirmYes');
    const confirmNo = document.getElementById('confirmNo');

    modal.classList.remove('hidden');

    confirmYes.onclick = () => {
        modal.classList.add('hidden');

        fetch('/processes/cancel_carpool_process.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'id_carpool=' + encodeURIComponent(idCarpool)
        })
            .then(response => {
                if (!response.ok) throw new Error('Erreur lors de l’annulation');
                return response.text();
            })
            .then(() => {
                location.reload();
            })
            .catch(error => {
                alert('Erreur : ' + error.message);
            });
    };
    confirmNo.onclick = () => {
        modal.classList.add('hidden');
    }
}