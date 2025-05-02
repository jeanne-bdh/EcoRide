const { MongoClient } = require("mongodb");

// URL de connexion à MongoDB (remplace par ta propre URI)
const uri = "mongodb://localhost:27017"; // ou mongodb+srv://<user>:<pass>@cluster0.mongodb.net
const client = new MongoClient(uri);

async function enregistrerMessageContact(data) {
    try {
        await client.connect();
        const db = client.db("mon_site_web");
        const collection = db.collection("messages_contact");

        // Ajout d'un horodatage si non fourni
        if (!data.date_contact) {
            data.date_contact = new Date().toISOString();
        }

        const result = await collection.insertOne(data);
        console.log("Message enregistré avec l'ID :", result.insertedId);
    } catch (err) {
        console.error("Erreur lors de l'enregistrement :", err);
    } finally {
        await client.close();
    }
}

// Exemple d'utilisation
const nouveauMessage = {
    titre: "Demande d'information",
    email: "exemple@domaine.com",
    message: "Bonjour, je voudrais plus d'informations sur vos services."
};

enregistrerMessageContact(nouveauMessage);
