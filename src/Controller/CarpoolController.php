<?php

namespace App\Controller;

use App\Repository\CarpoolsRepository;
use App\Service\SessionManager;

class CarpoolController extends Controller
{
    public function search(): void
    {
        $this->render("pages/carpools/carpools_search");
    }

    public function results(): void
    {
        $errors = [];
        $carpoolRepository = new CarpoolsRepository();

        if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['searchCarpool'])) {

            $cityDepart = trim($_GET['departCity']);
            $cityArrival = trim($_GET['arrivalCity']);
            $dateDepart = $_GET['dateDepart'];

            if (!empty($cityDepart) && !empty($cityArrival) && !empty($dateDepart)) {
                $res = $carpoolRepository->getSearchCarpoolCard($cityDepart, $cityArrival, $dateDepart);

                if (!empty($res)) {
                    $this->render("pages/carpools/carpools_results", [
                        "carpools" => $res,
                        "cityDepart" => $cityDepart,
                        "cityArrival" => $cityArrival,
                        "dateDepart" => $dateDepart,
                    ]);
                    return;
                } else {
                    $errors[] = "Aucun covoiturage disponible";
                }
            } else {
                $errors[] = "Veuillez remplir tous les champs";
            }
        }

        $this->render("pages/carpools/carpools_search", [
            "errors" => $errors,
            "cityDepart" => $cityDepart,
            "cityArrival" => $cityArrival,
            "dateDepart" => $dateDepart,
        ]);
    }

    public function details(): void
    {
        $carpoolRepository = new CarpoolsRepository();
        $errors = [];
        $carpool = null;

        if (isset($_GET["id_carpool"])) {
            $carpoolId = (int)$_GET["id_carpool"];
            $carpool = $carpoolRepository->getCarpoolDetails((int) $carpoolId);

            if (!$carpool) {
                $errors[] = "Impossible d'afficher le détail du covoiturage";
            }
        } else {
            $errors[] = "Aucun covoiturage sélectionné";
        }

        $this->render("pages/carpools/carpool_details", [
            "carpool" => $carpool,
            "errors" => $errors
        ]);
    }

    public function history(): void
    {
        $session = new SessionManager();
        if (!$session->isUserConnected()) {
            header("Location: /login");
            exit;
        } else {
            $userId = $session->getUserId();
            $carpoolRepository = new CarpoolsRepository();
            $carpools = $carpoolRepository->getPastCarpoolByUser($userId);

            $this->render("pages/users/hist-carpool/hist_carpool", [
                "carpools" => $carpools
            ]);
        }
    }

    public function future(): void
    {
        $session = new SessionManager();
        if (!$session->isUserConnected()) {
            header("Location: /login");
            exit;
        } else {
            $userId = $session->getUserId();
            $carpoolRepository = new CarpoolsRepository();
            $carpools = $carpoolRepository->getFutureCarpoolByUser($userId);
            $this->render("pages/users/future-carpool/future_carpool", [
                "carpools" => $carpools
            ]);
        }
    }
}
