<section class="container-form" id="container-form-home">
    <form method="GET" id="search-Form">
        <div class="inputForm">
            <label for="inputDepartCity">Départ :</label>
            <input type="text" id="inputDepartCity" name="departCity" placeholder="Ville de départ" required>
        </div>
        <div class="inputForm">
            <label for="inputArrivalCity">Destination :</label>
            <input type="text" id="inputArrivalCity" name="arrivalCity" placeholder="Ville d'arrivée" required>
        </div>
        <div class="inputForm">
            <label for="inputDateHome">Date de départ :</label>
            <input type="date" id="inputDateHome" name="dateDepart" required>
        </div>
        <div class="inputBtn">
            <button type="submit" name="searchCarpoolHome" class="btn-blue btn-green">Rechercher</button>
        </div>
    </form>
</section>