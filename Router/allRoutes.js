import Route from "./Route.js";

//Définir ici vos routes
export const allRoutes = [
    new Route("/", "Accueil", "/pages/home.html"),
    new Route("/covoit", "Accès aux covoiturages", "/pages/covoit.html"),
    new Route("/contact", "Contact", "/pages/contact.html"),
    new Route("/login", "Connexion", "/pages/login.html"),
    new Route("/legalInfos", "Mentions légales", "/pages/legalInfos.html"),
    new Route("/privacyPolicy", "Politique de confidentialité", "/pages/privacyPolicy.html"),
    new Route("/cookieManagement", "Gestion des cookies", "/pages/cookieManagement.html"),
    new Route("/cgu", "CGU", "/pages/cgu.html"),
];

//Le titre s'affiche comme ceci : Route.titre - websitename
export const websiteName = "EcoRide";