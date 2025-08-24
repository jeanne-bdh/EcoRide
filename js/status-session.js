function statusSession() {
    const userId = this.dataset.userId;
    const action = this.dataset.status === '1' ? 'block' : 'restart';
    const button = this;

    fetch('/processes/status_session_process.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `userId=${userId}&action=${action}`
    })
        .then(response => {
            if (!response.ok) throw new Error('Erreur lors de la requête');
            return response.json();
        })
        .then(result => {

            if (result) {
                if (action === 'block') {
                    button.dataset.status = '2';
                    button.textContent = 'Réactiver';
                    button.classList.remove('btn-red');
                    button.classList.add('btn-blue');
                } else {
                    button.dataset.status = '1';
                    button.textContent = 'Bloquer';
                    button.classList.remove('btn-blue');
                    button.classList.add('btn-red');
                }
            } else {
                alert('Erreur lors de la mise à jour du statut');
            }
        })
        .catch(error => {
            alert('Erreur : ' + error.message);
        });
}