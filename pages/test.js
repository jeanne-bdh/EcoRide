document.getElementById("ride-form").addEventListener("submit", async function (event) {
    event.preventDefault(); // Empêche le rechargement de la page

    // Récupération des données du formulaire
    const from = document.getElementById("from").value;
    const to = document.getElementById("to").value;
    const date = document.getElementById("date").value;

    // Affiche un message temporaire pendant la recherche
    const resultsDiv = document.getElementById("results");
    resultsDiv.innerHTML = "<p>Recherche en cours...</p>";

    try {
        // Exemple de requête à une API (remplacez par une vraie URL et API Key)
        const response = await fetch(`https://partners.blablacardaily.com/1/third_party/public/search?from=${from}&to=${to}&date=${date}`, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                "Authorization": "rDwC-oLooOn2UbrR7L1bPw" // Clé API à insérer
            }
        });

        if (!response.ok) {
            throw new Error("Erreur lors de la recherche d'itinéraires");
        }

        const data = await response.json();

        // Traitement et affichage des résultats
        if (data.trips && data.trips.length > 0) {
            resultsDiv.innerHTML = "<h2>Résultats :</h2>";
            data.trips.forEach(trip => {
                const tripElement = document.createElement("div");
                tripElement.innerHTML = `
            <p><strong>Départ :</strong> ${trip.departure}</p>
            <p><strong>Destination :</strong> ${trip.destination}</p>
            <p><strong>Prix :</strong> ${trip.price} €</p>
            <p><strong>Conducteur :</strong> ${trip.driver}</p>
            <hr>
          `;
                resultsDiv.appendChild(tripElement);
            });
        } else {
            resultsDiv.innerHTML = "<p>Aucun trajet trouvé.</p>";
        }
    } catch (error) {
        resultsDiv.innerHTML = `<p style="color: red;">Erreur : ${error.message}</p>`;
    }
});
