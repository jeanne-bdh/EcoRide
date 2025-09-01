<?php

namespace App\Controller;

use App\Repository\CarpoolsRepository;

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
}
