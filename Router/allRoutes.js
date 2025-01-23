import Route from "./Route.js";

//Définir ici vos routes
export const allRoutes = [
    new Route("/", "Accueil", "/pages/home.html"),
    new Route("/covoit", "Accès aux covoiturages", "/pages/covoit.html"),
    new Route("/contact", "Contact", "/pages/contact.html"),
    new Route("/login", "Connexion", "/pages/login.html"),
    new Route("/register", "Inscription", "/pages/register.html"),
    new Route("/legalInfos", "Mentions légales", "/pages/mentions-legales/legalInfos.html"),
    new Route("/privacyPolicy", "Politique de confidentialité", "/pages/mentions-legales/privacyPolicy.html"),
    new Route("/cookieManagement", "Gestion des cookies", "/pages/mentions-legales/cookieManagement.html"),
    new Route("/cgu", "CGU", "/pages/mentions-legales/cgu.html"),
];

//Le titre s'affiche comme ceci : Route.titre - websitename
export const websiteName = "EcoRide";